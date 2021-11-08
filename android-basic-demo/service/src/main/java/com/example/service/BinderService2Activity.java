package com.example.service;

import androidx.appcompat.app.AppCompatActivity;

import android.content.ComponentName;
import android.content.Intent;
import android.content.ServiceConnection;
import android.os.Bundle;
import android.os.IBinder;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import java.util.List;

public class BinderService2Activity extends AppCompatActivity {
    BinderService2 binderService; //声明 BinderService对象

    int[] tvid = {R.id.tv1,R.id.tv2,R.id.tv3,R.id.tv4,R.id.tv5,R.id.tv6,R.id.tv7};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_binder_service2);
        Button btnRandom = findViewById(R.id.btnRandom);
        btnRandom.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                List number = binderService.getRandomNumber();
                for (int i=0;i<number.size();i++){
                    TextView tv = findViewById(tvid[i]); //获取文本组件
                    tv.setText(number.get(i).toString());  // 显示生成的随机号码
                }
            }
        });
    }


    //创建 ServiceConnention 对象,重写onSerivceConntected和SonServiceConnected方法
    private ServiceConnection conn = new ServiceConnection() {
        @Override
        public void onServiceConnected(ComponentName name, IBinder service) {
            binderService =((BinderService2.MyBinder)service).getService();  //获取后Service
        }

        @Override
        public void onServiceDisconnected(ComponentName name) {

        }
    };

    @Override
    protected void onStart() {
        super.onStart();
        Intent intent = new Intent(this,BinderService2.class);
        bindService(intent,conn,BIND_AUTO_CREATE);
    }

    @Override
    protected void onStop() {
        super.onStop();
        unbindService(conn);
    }
}
