package com.example.draw;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.LinearLayout;
import android.widget.TextView;
import com.example.draw.MyDraw;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
       LinearLayout myL=(LinearLayout) findViewById(R.id.myL);
        myL.addView(new MyDraw(this));  //将自定义的view添加到线性布局管理器中


        MyPath myPath = new MyPath(this);
        myL.addView(myPath);
    }
}
