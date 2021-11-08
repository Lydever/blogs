package com.example.draw;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Matrix;
import android.graphics.Paint;
import android.graphics.Path;
import android.graphics.Point;
import android.graphics.PorterDuff;
import android.graphics.PorterDuffXfermode;
import android.net.Uri;
import android.os.Bundle;
import android.os.Environment;
import android.util.Log;
import android.view.MotionEvent;
import android.view.View;
import android.widget.Button;
import android.widget.CompoundButton;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.SeekBar;
import android.widget.TextView;
import android.widget.Toast;

import java.io.File;
import java.io.FileOutputStream;
import java.io.OutputStream;

public class MyPaintToolsActivity extends AppCompatActivity{

    Paint paint;
    Canvas canvas;
    ImageView imageview;
    Bitmap bitmap,newbitmap;
    TextView tv_stroke;
    int startX, startY, endX, endY;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_my_paint_tools);
        tv_stroke = findViewById(R.id.tv_stroke);
        LinearLayout ll_layout = findViewById(R.id.ll_layout);
        RadioGroup rg_color = findViewById(R.id.rg_color);

        // 原始Bitmap
       //  originalBitmap = BitmapFactory.decodeResource(getResources(),R.drawable.j).copy(Bitmap.Config.ARGB_8888,true);
        // 循环遍历单选按钮
        for (int i = 0;i<rg_color.getChildCount();i++){
            RadioButton rb = (RadioButton) rg_color.getChildAt(i);
            rb.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {  // 为单选按钮注册选中响应事件
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (buttonView.isChecked()){
                        paint.setColor(buttonView.getTextColors().getDefaultColor());  // 获取单选按钮颜色并将颜色设置
                    }
                }
            });
        }

        imageview = findViewById(R.id.imageview);
        Log.i("MyPaintToolsActivity",imageview.getWidth()+" "+imageview.getHeight());
        Point point = new Point();
        getWindowManager().getDefaultDisplay().getSize(point);
        Log.i("MyPaintToolsActivity",point.x+" "+point.y);

        bitmap = Bitmap.createBitmap(800,1000,Bitmap.Config.ARGB_8888);  // 创建一张空白图片
        canvas = new Canvas(bitmap);    // 创建一张画布,并图片放在画布上面
        canvas.drawColor(Color.argb(100,250,250,250));   // 设置画布背景颜色为白色
        paint = new Paint();
        paint.setStrokeWidth(5);
        paint.setAntiAlias(true);
        paint.setColor(Color.RED);
        canvas.drawBitmap(bitmap,new Matrix(),paint);  //把灰色背景画在画布上
        imageview.setImageBitmap(bitmap);         // 把图片加载到ImageView上

        // 注册触摸监听事件
        imageview.setOnTouchListener(new View.OnTouchListener() {
            @Override
            public boolean onTouch(View v, MotionEvent event) {
                switch(event.getAction()){
                    case MotionEvent.ACTION_DOWN:
                         Log.i("MyPaintToolsActivity","ACTION_DOWN");

                        // 获取鼠标按下时的坐标
                        startX = (int) (event.getX()/1.4);
                        startY = (int) (event.getY()/1.4);
                        break;
                    case MotionEvent.ACTION_MOVE:
                         Log.i("MyPaintToolsActivity","ACTION_MOVE");

                        // 获取鼠标移动后的坐标
                        endX = (int) (event.getX()/1.4);
                        endY = (int) (event.getY()/1.4);

                        //在开始和结束之间画一条直线
                        canvas.drawLine(startX,startY,endX,endY,paint);
                        // 实时更新开始坐标
                        startX = (int) (event.getX()/1.4);
                        startY = (int) (event.getY()/1.4);
                        // 更新ImageView上的画布图片
                        imageview.setImageBitmap(bitmap);
                        break;
                    case MotionEvent.ACTION_UP:
                         Log.i("MyPaintToolsActivity","ACTION_UP");
                        break;
                }
                imageview.invalidate();
                return true;
            }
        });


        // 清除
        Button btn_clear = findViewById(R.id.btn_clear);
        btn_clear.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // 清空画布的方法：
                // canvas.drawColor(0,PorterDuff.Mode.CLEAR);
                canvas.drawColor(Color.TRANSPARENT,PorterDuff.Mode.CLEAR);

                Paint paint =new Paint();
                paint.setXfermode(new PorterDuffXfermode(PorterDuff.Mode.CLEAR));
                canvas.drawPaint(paint);
                paint.setXfermode(new PorterDuffXfermode(PorterDuff.Mode.SRC));
                imageview.invalidate();
            }
        });


        // 保存
        Button btn_save = findViewById(R.id.btn_save);
        btn_save.setOnClickListener(new View.OnClickListener() {
            @SuppressLint("WrongConstant")
            @Override
            public void onClick(View v) {
                try {
                    File file = new File(Environment.getExternalStorageDirectory(), System.currentTimeMillis() + ".jpg");
                    OutputStream stream = new FileOutputStream(file);
                    bitmap.compress(Bitmap.CompressFormat.JPEG, 100, stream);
                    stream.close();
                    Intent intent = new Intent();
                    intent.setAction(Intent.ACTION_MEDIA_MOUNTED);
                    intent.setData(Uri.fromFile(Environment.getExternalStorageDirectory()));
                    sendBroadcast(intent);
                    Toast.makeText(getApplicationContext(), "保存图片成功", 0).show();
                } catch (Exception e) {
                    Toast.makeText(getApplicationContext(), "保存图片失败", 0).show();
                    e.printStackTrace();
                }
            }
        });


        // 擦除
        Button btn_eraser = findViewById(R.id.btn_eraser);
        btn_eraser.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                paint.setColor(Color.rgb(250,250,250));
                paint.setStrokeWidth(30);
            }
        });

        // Progress进度条 ，调节画笔粗细
        SeekBar sb_stroke = findViewById(R.id.sb_stroke);
        sb_stroke.setProgress(5);  //进度条初始大小值为5
        sb_stroke.setMax(30);
        sb_stroke.setOnSeekBarChangeListener(new SeekBar.OnSeekBarChangeListener(){
            @Override
            public void onProgressChanged(SeekBar seekBar, int progress, boolean fromUser) {
                paint.setStrokeWidth(progress);
                tv_stroke.setText("画笔粗度为:"+progress);
            }

            @Override
            public void onStartTrackingTouch(SeekBar seekBar) {

            }

            @Override
            public void onStopTrackingTouch(SeekBar seekBar) {

            }
        });
    }

}

