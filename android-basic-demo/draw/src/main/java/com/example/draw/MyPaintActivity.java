package com.example.draw;

import androidx.appcompat.app.AppCompatActivity;

import android.graphics.Bitmap;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.os.Bundle;
import android.util.Log;
import android.view.MotionEvent;
import android.view.View;
import android.widget.ImageView;

public class MyPaintActivity extends AppCompatActivity {
ImageView iv;
float startX,startY,endX,endY;
Paint paint;
Canvas canvas;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_my_paint);
        iv = findViewById(R.id.iv);

        // 定义一只画笔
        paint = new Paint();
        paint.setColor(Color.RED);
        paint.setStrokeWidth(5);
        paint.setStyle(Paint.Style.STROKE);

        // 创建一个bitmap存储图片
        Bitmap bitmap = Bitmap.createBitmap(1080,1920,Bitmap.Config.ARGB_8888);     //在画布上画一张图片并实时把把图片添加到画布上
        // 创建一个画布来绘制图片
        canvas = new Canvas(bitmap);
        // 将绘制出来的图片添加到ImageView 控件上
        iv.setImageBitmap(bitmap);

        // 在vi 注册触摸事件监听器
        iv.setOnTouchListener(new View.OnTouchListener() {
            @Override
            public boolean onTouch(View v, MotionEvent event) {
                switch(event.getAction()){
                    case MotionEvent.ACTION_DOWN:
                        startX = event.getX();
                        startY = event.getY();
                        Log.i("onTouch","手指按下");
                        break;
                    case MotionEvent.ACTION_MOVE:
                        startX = event.getX();
                        startY = event.getY();
                        canvas.drawLine(startX,startY,endX,endY,paint);
                        Log.i("onTouch","手指移动");
                        startX = endX;
                        startY = endY;
                        // 更新iv中的图片
                        // iv.invalidateDrawable(bitmap);
                        break;
                    case MotionEvent.ACTION_UP:
                        Log.i("onTouch","手指抬起");
                        break;
                }
                return false;
            }
        });
    }
}
