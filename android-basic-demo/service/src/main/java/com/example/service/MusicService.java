package com.example.service;

import android.app.Service;
import android.content.Intent;
import android.media.MediaPlayer;
import android.os.IBinder;

public class MusicService extends Service {
    static boolean isPlay;  //记录播放状态
    MediaPlayer player;  // MiediaPlayer 对象

    public MusicService() {
    }

    @Override
    public IBinder onBind(Intent intent) {
        // TODO: Return the communication channel to the service.
        throw new UnsupportedOperationException("Not yet implemented");
    }

    @Override
    public void onCreate() {
        // 创建 MediaPlyer 对象 并加载要播放的音频文件
        player = MediaPlayer.create(this,R.raw.lywww);
        super.onCreate();
    }

    @Override
    public int onStartCommand(Intent intent, int flags, int startId) {
        player.start(); //播放音乐
        isPlay = player.isPlaying(); //设置当前状态为正在播放音乐
        return super.onStartCommand(intent, flags, startId);
    }

    @Override
    public void onDestroy() {
        player.stop();  //停止音乐
        isPlay = player.isPlaying(); //设置当前状态为停止音乐
        player.release();  //释放资源
        super.onDestroy();
    }
}
