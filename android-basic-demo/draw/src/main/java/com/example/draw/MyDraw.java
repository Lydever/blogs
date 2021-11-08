package com.example.draw;

import android.content.Context;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.graphics.Rect;
import android.util.AttributeSet;
import android.view.View;

import androidx.annotation.Nullable;

//1. 创建一个继承View的类
public class MyDraw extends View {
    public MyDraw(Context context) {
        super(context);
    }


    public MyDraw(Context context, @Nullable AttributeSet attrs) {
        super(context, attrs);
    }


  //  2. 重写onDraw方法
    protected void onDraw(Canvas canvas) {
        super.onDraw(canvas);
        //3. 准备一支画笔
        Paint myPen = new Paint();
        myPen.setARGB(200, 180, 20, 200);
        myPen.setStrokeWidth(5);
        myPen.setStyle(Paint.Style.STROKE);
        myPen.setAntiAlias(true); //防止锯齿
        //4. 使用onDraw方法中的canvas画布
        canvas.drawLine(20, 20, 200, 20, myPen);    // 绘制直线
        canvas.drawLine(20, 20, 20, 200, myPen);
        canvas.drawLine(200, 20, 200, 200, myPen);
        canvas.drawLine(20, 200, 200, 200, myPen);
        canvas.drawLine(20, 20, 200, 200, myPen);
        myPen.setColor(Color.BLUE);

        float[] points = {320, 20, 500, 20, 500, 20, 500, 200, 500, 200, 320, 200, 320, 200, 320, 20};
        canvas.drawLines(points, myPen);
        canvas.drawPoint(410, 110, myPen);

        myPen.setColor(Color.RED);
        canvas.drawRect(20, 220, 300, 400, myPen);   //绘画正方形
        Rect r = new Rect(320, 220, 500, 400);
        canvas.drawRect(r, myPen);
        r.offset(30, 30);  // 图像平移
        myPen.setColor(Color.YELLOW);
        canvas.drawRect(r, myPen);
        r.offset(30, 30);  // 图像平移
        myPen.setColor(Color.GREEN);
        canvas.drawRect(r, myPen);
        r.offset(200, 30);
        canvas.drawRoundRect(600, 220, 780,400,20,20, myPen);  //圆角矩形


        myPen.setStyle(Paint.Style.FILL);
        // 画弧
        canvas.drawArc(600,220,780,400,0,120,true,myPen);
        canvas.drawText("李子李",100,100,myPen);

    }


}
