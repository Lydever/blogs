package com.example.mediaplayer;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.media.AudioManager;
import android.media.MediaPlayer;
import android.os.Bundle;
import android.view.SurfaceHolder;
import android.view.SurfaceView;
import android.view.View;
import android.widget.Button;

public class MediaPlayerVideoActivity extends AppCompatActivity implements View.OnClickListener,SurfaceHolder.Callback {

    private MediaPlayer myPlayer = null;
    private SurfaceView sfv_show;
    private SurfaceHolder surfaceHolder;
    private Button btn_start;
    private Button btn_pause;
    private Button btn_stop;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_media_plyer_video);

        bindViews();

    }

    private void bindViews(){
        sfv_show = findViewById(R.id.sfv_show);
        btn_start = findViewById(R.id.btn_start);
        btn_pause = findViewById(R.id.btn_pause);
        btn_stop = findViewById(R.id.btn_stop);

        btn_start.setOnClickListener(this);
        btn_pause.setOnClickListener(this);
        btn_stop.setOnClickListener(this);

        // 初始化SurfaceHolder类 ,SurfaceView的控制器
        surfaceHolder = sfv_show.getHolder();
        surfaceHolder.addCallback(this);
        surfaceHolder.setFixedSize(320,220);  //显示的分辨率,不设置为视频默认

    }


    @Override
    public void surfaceCreated(@NonNull SurfaceHolder holder) {
        myPlayer = MediaPlayer.create(MediaPlayerVideoActivity.this,R.raw.my);
        myPlayer.setAudioStreamType(AudioManager.STREAM_MUSIC);
        myPlayer.setDisplay(surfaceHolder);   //将显示视频显示在SurfaceView上
    }

    @Override
    public void surfaceChanged(@NonNull SurfaceHolder holder, int format, int width, int height) {

    }

    @Override
    public void surfaceDestroyed(@NonNull SurfaceHolder holder) {

    }

    @Override
    public void onClick(View v) {
        switch(v.getId()){
            case R.id.btn_start:
                myPlayer.start();
                break;
            case R.id.btn_pause:
                myPlayer.pause();
                break;
            case R.id.btn_stop:
                myPlayer.stop();
                break;
        }
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        if (myPlayer.isPlaying()){
            myPlayer.stop();
        }
        myPlayer.release();
    }
}
