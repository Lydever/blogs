package com.example.myapp2;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.CalendarView;
import android.widget.Toast;

public class CalendarViewActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_calendar_view);
        CalendarView cv = findViewById(R.id.btn_cv);
        cv.setOnDateChangeListener(new CalendarView.OnDateChangeListener() {
            @Override
            public void onSelectedDayChange(@NonNull CalendarView view, int year, int month, int dayOfMonth) {
                //当发生改变时做出提示
                String str="选择的日期是:"+year+"年"+month+"月"+dayOfMonth+"日";
                Toast.makeText(CalendarViewActivity.this, str, Toast.LENGTH_SHORT).show();
            }
        });
    }
}
