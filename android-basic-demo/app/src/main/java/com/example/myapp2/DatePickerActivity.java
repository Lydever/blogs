package com.example.myapp2;


import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.Toast;

import java.time.DayOfWeek;
import java.util.Calendar;

public class DatePickerActivity extends AppCompatActivity {
    int year,month,day;  //三个整型变量 ,用于存放年,月,日
    DatePicker datepicker; //创建一个日期选择组件
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_date_picker);
        datepicker=(DatePicker) findViewById(R.id.date);  //获取组件
        Calendar calender = Calendar.getInstance();  //获取一个时间对象

        //获取当前年月日时间
        year=calender.get(Calendar.YEAR);
        month=calender.get(Calendar.MONTH);
        day=calender.get(Calendar.DAY_OF_MONTH);

        //初始化日期选择器 ,并设置监听器
        datepicker.init(year, month, day, new DatePicker.OnDateChangedListener() {
            @Override
            public void onDateChanged(DatePicker view, int year, int monthOfYear, int dayOfMonth) {
                //替换改变后的月日时间
                DatePickerActivity.this.year=year;
                DatePickerActivity.this.month=monthOfYear;
                DatePickerActivity.this.day=dayOfMonth;
            }
        });
        Button btn=findViewById(R.id.btn_confirm);
        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //创建字符串变量将时间格式化
                String str;
                str=DatePickerActivity.this.year+"年"+(DatePickerActivity.this.month+1)+"月"+DatePickerActivity.this.day+"日";
                //输出格式化的时间字符串
                Toast.makeText(DatePickerActivity.this,str,Toast.LENGTH_SHORT).show();
            }
        });
    }
}