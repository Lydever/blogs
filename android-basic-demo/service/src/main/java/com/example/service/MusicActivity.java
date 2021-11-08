package com.example.service;

import androidx.appcompat.app.AppCompatActivity;

import android.content.ComponentName;
import android.content.Intent;
import android.content.ServiceConnection;
import android.os.Bundle;
import android.os.IBinder;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class MusicActivity extends AppCompatActivity implements View.OnClickListener {
    private Button btn_startService, btn_stopMusic, btn_startMusic;
    private Button btn_stopService;
    private Button btn_bindService;
    private Button btn_unbindService;
    private BinderService.MyBinder mybinder;


    ServiceConnection conn = new ServiceConnection() {
        @Override
        public void onServiceConnected(ComponentName name, IBinder service) {
            Log.i("MainActivity","执行了onServiceConnected(),当前Acitivity与服务连接成功");
            mybinder = (BinderService.MyBinder) service;

        }

        @Override
        public void onServiceDisconnected(ComponentName name) {
            Log.i("MainActivity","执行了onServiceDisconnected(),当前Acitivity与服务断开连接");
        }
    };

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_music);
        btn_startMusic = (Button)findViewById(R.id.btn_startMusic);
        btn_stopMusic = (Button)findViewById(R.id.btn_stopMusic);
        btn_startMusic.setOnClickListener(this);
        btn_stopMusic.setOnClickListener(this);
    }

    public void onClick(View v){
        switch (v.getId()){
            case R.id.btn_startMusic:
                Intent musicIntent = new Intent(this,MusicService.class);
                startService(musicIntent);
                break;
            case R.id.btn_stopMusic:
                Intent musicIntent2 = new Intent(this,MusicService.class);
                stopService(musicIntent2);
                break;
            default:
                break;
        }
    }

    @Override
    protected void onStart() {
        startService(new Intent(MusicActivity.this,MusicService.class));
        super.onStart();
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        unbindService(conn);
    }
}
