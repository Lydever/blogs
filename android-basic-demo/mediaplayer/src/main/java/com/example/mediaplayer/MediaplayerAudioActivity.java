package com.example.mediaplayer;

import androidx.appcompat.app.AppCompatActivity;

import android.media.MediaPlayer;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MediaplayerAudioActivity extends AppCompatActivity implements View.OnClickListener {

    private Button btn_play;
    private Button btn_pause;
    private Button btn_stop;
    private MediaPlayer myPlayer = null;
    private boolean isRelease = true;  //判断是否Mediaplayer是否释放的标志

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mediaplayer_audio);

        bindViews();
    }

    private void bindViews(){
        btn_play = findViewById(R.id.btn_play);
        btn_pause = findViewById(R.id.btn_pause);
        btn_stop = findViewById(R.id.btn_stop);
        btn_play.setOnClickListener(this);
        btn_pause.setOnClickListener(this);
        btn_stop.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        switch(v.getId()){
            case R.id.btn_play:
                if (isRelease){
                    myPlayer = MediaPlayer.create(this,R.raw.lywww);
                    isRelease = false;
                }
                myPlayer.start();   //开始播放
                btn_play.setEnabled(false);
                btn_pause.setEnabled(true);
                btn_stop.setEnabled(true);
                break;
            case R.id.btn_pause:
                myPlayer.pause();
                btn_play.setEnabled(true);
                btn_stop.setEnabled(false);
                btn_pause.setEnabled(false);
                break;
            case R.id.btn_stop:
                myPlayer.reset();   //重置MediaPlyer
                myPlayer.release();   // 释放MediaPlayer
                isRelease = true;
                btn_play.setEnabled(true);
                btn_pause.setEnabled(false);
                btn_stop.setEnabled(false);
                break;
        }
    }
}


/*  本地Uri
    Uri myUri = ....; // initialize Uri here
        MediaPlayer mediaPlayer = new MediaPlayer();
        mediaPlayer.setAudioStreamType(AudioManager.STREAM_MUSIC);
        mediaPlayer.setDataSource(getApplicationContext(), myUri);
        mediaPlayer.prepare();
        mediaPlayer.start();*/


/*外部URL：

        String url = "http://........"; // your URL here
        MediaPlayer mediaPlayer = new MediaPlayer();
        mediaPlayer.setAudioStreamType(AudioManager.STREAM_MUSIC);
        mediaPlayer.setDataSource(url);
        mediaPlayer.prepare(); // might take long! (for buffering, etc)
        mediaPlayer.start();
        Note：假如你通过一个URL以流的形式播放在线音频文件，该文件必须可以进行 渐进式下载*/
