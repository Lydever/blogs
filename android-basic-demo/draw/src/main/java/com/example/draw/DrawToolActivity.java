package com.example.draw;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Matrix;
import android.graphics.Paint;
import android.net.Uri;
import android.os.Bundle;
import android.os.Environment;
import android.view.MotionEvent;
import android.view.View;
import android.widget.ImageView;
import android.widget.Toast;

import java.io.File;
import java.io.FileOutputStream;
import java.io.OutputStream;

public class DrawToolActivity extends AppCompatActivity {

    private ImageView iv;
    private Bitmap bitmap;
    private Canvas canvas;
    private Paint paint;
    int startX,startY,endX,endY;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_draw_tool);
        this.iv = (ImageView) this.findViewById(R.id.iv);
        // 创建一张空白图片
        bitmap = Bitmap.createBitmap(480, 640, Bitmap.Config.ARGB_8888);
        // 创建一张画布
        canvas = new Canvas(bitmap);
        // 画布背景为灰色
        canvas.drawColor(Color.GRAY);
        // 创建画笔
        paint = new Paint();
        // 画笔颜色为红色
        paint.setColor(Color.RED);
        // 宽度5个像素
        paint.setStrokeWidth(5);
        // 先将灰色背景画上
        canvas.drawBitmap(bitmap, new Matrix(), paint);
        iv.setImageBitmap(bitmap);

            // 注册触摸监听事件 并重写
        iv.setOnTouchListener(new View.OnTouchListener() {
                @Override
                public boolean onTouch(View v, MotionEvent event) {
                    switch(event.getAction()){
                        case MotionEvent.ACTION_DOWN:
                            // Log.i("MyPaintToolsActivity","ACTION_DOWN");

                            // 获取鼠标按下时的坐标
                            startX = (int) (event.getX()/1.4);
                            startY = (int) (event.getY()/1.4);
                            break;
                        case MotionEvent.ACTION_MOVE:
                            // Log.i("MyPaintToolsActivity","ACTION_MOVE");

                            // 获取鼠标移动后的坐标
                            endX = (int) (event.getX()/1.4);
                            endY = (int) (event.getY()/1.4);

                            //在开始和结束之间画一条直线
                            canvas.drawLine(startX,startY,endX,endY,paint);
                            // 实时更新开始坐标
                            startX = (int) (event.getX()/1.4);
                            startY = (int) (event.getY()/1.4);
                            // 更新ImageView上的画布图片
                            iv.setImageBitmap(bitmap);
                            break;
                        case MotionEvent.ACTION_UP:
                            // Log.i("MyPaintToolsActivity","ACTION_UP");
                            break;
                    }
                    iv.invalidate();
                    return true;
                }
            });
    }

    @SuppressLint("WrongConstant")
    public void save(View view) {
        try {
            File file = new File(Environment.getExternalStorageDirectory(),
                    System.currentTimeMillis() + ".jpg");
            OutputStream stream = new FileOutputStream(file);
            bitmap.compress(Bitmap.CompressFormat.JPEG, 100, stream);
            stream.close();
            // 模拟一个广播，通知系统sdcard被挂载
            Intent intent = new Intent();
            intent.setAction(Intent.ACTION_MEDIA_MOUNTED);
            intent.setData(Uri.fromFile(Environment
                    .getExternalStorageDirectory()));
            sendBroadcast(intent);

            Toast.makeText(this, "保存图片成功", 0).show();
        } catch (Exception e) {
            Toast.makeText(this, "保存图片失败", 0).show();
            e.printStackTrace();
        }
    }

}
