package com.example.myapp2;

import androidx.appcompat.app.AppCompatActivity;

import android.app.DatePickerDialog;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;

import java.util.Calendar;

public class HeightForecastActivity extends AppCompatActivity implements View.OnClickListener{
Button btn_birthday;
EditText edt_birthday;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_height_forecast);
        btn_birthday=findViewById(R.id.btn_birthday);
        btn_birthday.setOnClickListener(this);
        edt_birthday=findViewById(R.id.edt_birthday);
    }

   public void onClick(View view){
       DatePickerDialog.OnDateSetListener birdayListener=new DatePickerDialog.OnDateSetListener() {
           @Override
           public void onDateSet(DatePicker view, int year, int month, int dayOfMonth) {
               month=month+1;
               edt_birthday.setText(year+"-"+month+"-"+dayOfMonth);
           }
       };
       Calendar calendar= Calendar.getInstance();
       int dyear,dmonth,dday;
       dyear=calendar.get(Calendar.YEAR)-20;
       dmonth=calendar.get(Calendar.MONTH);
       dday=calendar.get(Calendar.DAY_OF_MONTH);
       DatePickerDialog datePickerDialog=new DatePickerDialog(this,birdayListener,dyear,dmonth,dday);
       datePickerDialog.show();

   }

}
