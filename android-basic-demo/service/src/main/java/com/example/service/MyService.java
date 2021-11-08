package com.example.service;

import android.app.Service;
import android.content.Intent;
import android.os.IBinder;
import android.util.Log;

import androidx.annotation.Nullable;

public class MyService extends Service {
    boolean isStop = true;
    @Nullable
    @Override
    public IBinder onBind(Intent intent) {
        return null;
    }
    @Override
    public void onCreate() {
        Log.i("MyService","执行了onCreste(),服务创建成功");
        super.onCreate();
    }

    @Override
    public int onStartCommand(Intent intent, int flags, int startId) {
        Log.i("MyService","执行了onStartCommand(),服务启动成功");
        isStop = false;
        Runnable runnable = new Runnable(){
            @Override
            public void run() {
                int i = 0;
                while(i<100){
                    i++;
                    Log.i("一个下载电影的进程","工作了"+i+"秒");
                    try{
                        Thread.sleep(1000);
                    }catch(InterruptedException e){
                        e.printStackTrace();
                    }
                }
            }
        };
        Thread thread = new Thread(runnable);
        thread.start();
        return super.onStartCommand(intent, flags, startId);
    }

    @Override
    public void onDestroy() {
        Log.i("MyService","执行了onDestroy(),服务被销");
        super.onDestroy();
    }

}
