package com.example.draw;

import android.content.Context;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.graphics.Path;
import android.util.AttributeSet;
import android.view.View;

import androidx.annotation.Nullable;

public class MyPath extends View {

    public MyPath(Context context) {
        super(context);
    }

    public MyPath(Context context, @Nullable AttributeSet attrs) {
        super(context, attrs);
    }

    public MyPath(Context context, @Nullable AttributeSet attrs, int defStyleAttr) {
        super(context, attrs, defStyleAttr);
    }

    @Override
    protected void onDraw(Canvas canvas) {
        super.onDraw(canvas);
        Paint paint = new Paint();
        paint.setColor(Color.RED);
        paint.setStrokeWidth(5);
        paint.setStyle(Paint.Style.STROKE);

        Path path = new Path();
        path.addCircle(200,200,120,Path.Direction.CW);
        canvas.drawPath(path,paint);
        String strtxt="美哉，我少年中国，与天不老，壮哉，我中国少年，与国无疆！";
        paint.setTextSize(36);
        canvas.drawTextOnPath(strtxt,path,0,0,paint);
        paint.setTextSize(30);
        canvas.drawTextOnPath(strtxt,path,50,50,paint);  // 设置偏移

    }
}
