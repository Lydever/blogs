package com.example.draw;

import android.content.Context;
import android.graphics.Canvas;
import android.graphics.Paint;
import android.graphics.RectF;
import android.view.View;

public class MyRobot extends View {

    public MyRobot(Context context) {
        super(context);
    }


    @Override
    protected void onDraw(Canvas canvas) {
        super.onDraw(canvas);
        // 绘制机器人

        Paint paint = new Paint();  // 创建一个画笔
        paint.setAntiAlias(true);   // 抗锯齿 使它更加圆滑
        paint.setColor(0xFFA4C739);

        // 绘制机器人的头
        RectF rectF = new RectF(10,10,100,100); //定义外轮廓矩形
        rectF.offset(90,20);
        canvas.drawArc(rectF,-10,-160,false,paint);  //绘制弧

        // 绘制眼睛
        paint.setColor(0xFFFFFFFF); //设置画笔为白色
        canvas.drawCircle(165,53,4,paint); //绘制圆
        canvas.drawCircle(125,53,4,paint);

        //绘制天线
        paint.setColor(0xFFA4C739);  //设置画笔颜色
        paint.setStrokeWidth(2);  // 设置画笔的宽度
        canvas.drawLine(110,15,125,35,paint); //绘制线
        canvas.drawLine(180,15,165,35,paint); //绘制线

        // 绘制身体
        canvas.drawRect(100,75,190,150,paint);  //绘制矩形
        RectF rectF_body = new RectF(100,140,190,160);
        canvas.drawRoundRect(rectF_body,10,10,paint);  //绘制圆角矩形

        // 绘制胳膊
        RectF rectF_arm = new RectF(75,75,95,140);
        canvas.drawRoundRect(rectF_arm,10,10,paint);  //绘制圆角矩形
        rectF_arm.offset(120,0);
        canvas.drawRoundRect(rectF_arm,10,10,paint);  //绘制圆角矩形

        //绘制腿
        RectF rectF_leg = new RectF(115,150,135,200);
        canvas.drawRoundRect(rectF_leg,10,10,paint);  //绘制圆角矩形
        rectF_leg.offset(40,0);
        canvas.drawRoundRect(rectF_leg,10,10,paint);  //绘制圆角矩形

    }
}
