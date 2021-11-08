package com.example.broadcastreceiver;

import androidx.appcompat.app.AppCompatActivity;

import android.content.IntentFilter;
import android.os.Bundle;

import com.example.broadcastreceiver.Receiver.MyDReceiver;

public class MainActivity extends AppCompatActivity {
MyDReceiver myReceiver;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        // java代码中动态注册广播接收者
        myReceiver = new MyDReceiver();
        // 创建一个一图过滤器,来明确广播接收器能接收到放入广播频道
        IntentFilter itFilter = new IntentFilter();
        itFilter.addAction("android.net.conn.CONNECTIVITY_CHANGE");
        // registerReceiver() 方法注册广播接收者
        registerReceiver(myReceiver,itFilter);
    }


    //取消掉广播接收者
    @Override
    protected void onDestroy() {
        super.onDestroy();
        unregisterReceiver(myReceiver);
    }
}
