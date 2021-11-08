package com.example.myapp2;


import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.os.SystemClock;
import android.view.View;
import android.widget.Button;
import android.widget.Chronometer;
import android.widget.Toast;

public class ChronometerActivity extends AppCompatActivity {
    Chronometer chr;
    Button btnStart,btnStop,btnReset;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_chronometer);

        chr = (Chronometer) findViewById(R.id.chr);
        btnReset = (Button) findViewById(R.id.btnReset);
        btnStart = (Button) findViewById(R.id.btnStart);
        btnStop = (Button) findViewById(R.id.btnStop);

        //设置计时监听
        chr.setOnChronometerTickListener(new Chronometer.OnChronometerTickListener() {
            @Override
            public void onChronometerTick(Chronometer chronometer) {
                String str = chr.getText().toString();     //获取文本
                if(str.equals("00:10")){     //比较文本
                    Toast.makeText(ChronometerActivity.this, str, Toast.LENGTH_SHORT).show();  //复合文本框内容提示输出
                    chr.stop();     //输出完信息后停止计时
                }
            }
        });

        btnStart.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //单击开始开单开始计时
                chr.start();
            }
        });

        btnStop.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //单击停止停止计时
                chr.stop();
            }
        });

        btnReset.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //重置计时器
                chr.setBase(SystemClock.elapsedRealtime());
            }
        });
    }
}
