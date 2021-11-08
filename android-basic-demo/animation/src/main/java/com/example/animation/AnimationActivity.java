package com.example.animation;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Switch;

public class AnimationActivity extends AppCompatActivity implements View.OnClickListener{
private Button btn_alpha,btn_scale,btn_trans,btn_rotate,btn_set;
private ImageView iv_animation;
private Animation animation = null;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_animation);

         bindViews();
    }

    private void bindViews(){
        btn_alpha = findViewById(R.id.btn_alpha);
        btn_scale = findViewById(R.id.btn_scale);
        btn_trans = findViewById(R.id.btn_trans);
        btn_rotate = findViewById(R.id.btn_rotate);
        btn_set = findViewById(R.id.btn_set);
        iv_animation = findViewById(R.id.iv_animation);

        btn_alpha.setOnClickListener(this);
        btn_scale.setOnClickListener(this);
        btn_trans.setOnClickListener(this);
        btn_rotate.setOnClickListener(this);
        btn_set.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        switch(v.getId()){
            case R.id.btn_alpha:
                animation = AnimationUtils.loadAnimation(this,R.anim.alpha_animation);
                iv_animation.startAnimation(animation);
                break;
            case R.id.btn_scale:
                animation = AnimationUtils.loadAnimation(this,R.anim.scale_anim);
                iv_animation.startAnimation(animation);
                break;
            case R.id.btn_trans:
                animation = AnimationUtils.loadAnimation(this,R.anim.anim_translate);
                iv_animation.startAnimation(animation);
                break;
            case R.id.btn_rotate:
                animation = AnimationUtils.loadAnimation(this,R.anim.anim_rotate);
                iv_animation.startAnimation(animation);
                break;
            case R.id.btn_set:
                animation = AnimationUtils.loadAnimation(this,R.anim.scale_anim);
                iv_animation.startAnimation(animation);
                break;
            default:
                break;
        }
    }
}
