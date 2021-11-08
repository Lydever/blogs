package com.example.service;

import android.app.Service;
import android.content.Intent;
import android.os.Binder;
import android.os.IBinder;
import android.util.Log;

import java.util.List;

public class BinderService extends Service {

    //1. 自定义一个内部类MyBinder类继承Binder,,从而实现IBinder接口
    class MyBinder extends Binder{

        public BinderService getService() {
            return BinderService.this;   //返回当前Service类
        }
    }

    //2. 实例化 一个MyBinder 对象
    private MyBinder  mybinder = new MyBinder();


    public BinderService() {
    }

    @Override
    public IBinder onBind(Intent intent) {
        // TODO: Return the communication channel to the service.
        Log.i("MyService","执行了onBind(),服务绑定成功");
        return mybinder;
    }



    @Override
    public boolean onUnbind(Intent intent) {
        Log.i("MyService","执行了onUnbind(),服务解绑成功");
        return super.onUnbind(intent);
    }

    @Override
    public void onCreate() {
        Log.i("MyService","执行了onCreste(),服务创建成功");
        super.onCreate();
    }

    @Override
    public int onStartCommand(Intent intent, int flags, int startId) {
        Log.i("MyService","执行了onStartCommand(),服务启动成功");
        return super.onStartCommand(intent, flags, startId);
    }

    @Override
    public void onDestroy() {
        Log.i("MyService","执行了onDestroy(),服务被销");
        super.onDestroy();
    }

}