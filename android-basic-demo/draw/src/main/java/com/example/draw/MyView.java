package com.example.draw;

import android.content.Context;
import android.graphics.Canvas;
import android.graphics.Paint;
import android.util.AttributeSet;
import android.view.View;

import androidx.annotation.Nullable;

public class MyView extends View {
    private Paint myPaint;

    public MyView(Context context) {
        super(context);

    }

    public MyView(Context context, @Nullable AttributeSet attrs) {
        super(context, attrs);

    }

    public MyView(Context context, @Nullable AttributeSet attrs, int defStyleAttr) {
        super(context, attrs, defStyleAttr);
    }

    private void init(){
        myPaint = new Paint();
        myPaint.setAntiAlias(true); //防止锯齿
        myPaint.setColor(getResources().getColor(R.color.colorPrimary)); //画笔颜色
        myPaint.setStyle(Paint.Style.FILL); //画布风格
        myPaint.setTextSize(36);  //绘制文笔大小
        myPaint.setStrokeWidth(5);  //画笔粗细
    }


    // 重写onDraw() 在这里绘图
    @Override
    protected void onDraw(Canvas canvas) {
        super.onDraw(canvas);
        canvas.drawColor(getResources().getColor(R.color.colorPrimaryDark)); //设置画布背景颜色
        canvas.drawCircle(200,200,100,myPaint);
    }
}
