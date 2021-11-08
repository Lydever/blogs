package com.example.draw;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.FrameLayout;
import com.example.draw.MyRobot;
public class RobotActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_android_robot);
        // 获取帧布局管理器
        FrameLayout frameLayout = (FrameLayout) findViewById(R.id.framlayout);
        frameLayout.addView(new MyRobot(this)); //将自定义的view添加到帧布局布局管理器中
    }
}
