package com.example.myapp2;


import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TimePicker;
import android.widget.Toast;

import java.util.Calendar;

public class TimePickerActivity extends AppCompatActivity {
    int hour,minute;
    TimePicker time;
    Button btn;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_time_picker);
        Calendar cal = Calendar.getInstance();   //创建时间对象
        hour=cal.get(Calendar.HOUR_OF_DAY);
        minute=cal.get(Calendar.MINUTE);
        time=(TimePicker) findViewById(R.id.time);
        btn=(Button) findViewById(R.id.btn_confirm);

        //初始化时间并设置时间监听
        time.setOnTimeChangedListener(new TimePicker.OnTimeChangedListener() {
            @Override
            public void onTimeChanged(TimePicker view, int hourOfDay, int minute) {
                //修改改变后的时间
                TimePickerActivity.this.hour=hourOfDay;
                TimePickerActivity.this.minute=minute;
            }
        });
        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String str;
                str="你选择的时间是:"+TimePickerActivity.this.hour+"时"+TimePickerActivity.this.minute+"分";
                Toast.makeText(TimePickerActivity.this, str, Toast.LENGTH_SHORT).show();
            }
        });
    }
}
