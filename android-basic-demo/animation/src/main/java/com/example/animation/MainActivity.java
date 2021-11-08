package com.example.animation;

import androidx.appcompat.app.AppCompatActivity;

import android.graphics.drawable.AnimationDrawable;
import android.os.Bundle;
import android.view.View;
import android.view.animation.Animation;
import android.widget.ImageView;

public class MainActivity extends AppCompatActivity {
boolean flag = true;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        final ImageView iv_frameAnimation = findViewById(R.id.iv_frameAnimation);

        final AnimationDrawable animationDrawable = (AnimationDrawable) iv_frameAnimation.getDrawable();
        animationDrawable.start();

        iv_frameAnimation.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
               if(flag){
                   animationDrawable.start();
                   flag=false;
               }else{
                   animationDrawable.stop();
                   flag=true;

               }
            }
        });


    }
}
