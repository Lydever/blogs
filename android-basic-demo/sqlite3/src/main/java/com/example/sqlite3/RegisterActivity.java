package com.example.sqlite3;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;

import android.app.DatePickerDialog;
import android.content.ContentValues;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.RadioButton;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.example.sqlite3.Model.User;

import java.io.File;

public class RegisterActivity extends AppCompatActivity implements View.OnClickListener {
    Button btn_birthday,btn_register,btn_login,btn_del;
    Button btn_selalluser,btn_upPsw;
    EditText et_birthday,et_updatabyusername;
    Spinner sp_city;
    EditText et_username,et_password;
    RadioButton rb_female,rb_male;
    TextView tv_usershow;
    User oneuser;
    SQLiteDatabase db;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        File file = new File("/data/data/com.example.sqlite3/database");
        file.mkdir();
        db = SQLiteDatabase.openOrCreateDatabase("/data/data/com.example.sqlite3/database/user.db",null);
        db.execSQL("create table if not exists userInfo(id integer primary key autoincrement,uName text not null,uPass text ,uSex text,city text,bYar int,bMonth integer,bDay integer)");

        init();

    }




    protected void init(){
        oneuser=new User();
        btn_birthday=findViewById(R.id.btn_birthday);
        et_birthday=findViewById(R.id.et_birthday);
        btn_birthday.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                DatePickerDialog.OnDateSetListener dateChangedListener=new DatePickerDialog.OnDateSetListener() {
                    @Override
                    public void onDateSet(DatePicker view, int year, int month, int dayOfMonth) {
                        et_birthday.setText(year+"-"+(month+1)+"-"+dayOfMonth);
                        oneuser.setYear_birth(year);
                        oneuser.setMonth_birth(month+1);
                        oneuser.setDay_birth(dayOfMonth);
                    }
                };
                DatePickerDialog pickerDialog=new DatePickerDialog(RegisterActivity.this, dateChangedListener,2000,0,1);
                pickerDialog.show();
            }
        });
        String[] str_array_city={"广州","深圳","佛山","茂名","汕头","汕尾","湛江","江门"};
        sp_city=findViewById(R.id.sp_city);
        ArrayAdapter<String> cityAdapter= new ArrayAdapter<String>(this,android.R.layout.simple_spinner_item,str_array_city);
        sp_city.setAdapter(cityAdapter);
        btn_register=findViewById(R.id.btn_register);
        btn_register.setOnClickListener(this);
        btn_login=findViewById(R.id.btn_login);
        btn_login.setOnClickListener(this);
        et_username=findViewById(R.id.et_username);
        et_password=findViewById(R.id.et_password);
        rb_female=findViewById(R.id.rb_female);
        rb_male=findViewById(R.id.rb_male);
        btn_selalluser=findViewById(R.id.btn_selalluser);
        btn_selalluser.setOnClickListener(this);
        tv_usershow=findViewById(R.id.tv_usershow);
      // btn_upPsw=findViewById(R.id.btn_upPsw);
        btn_upPsw.setOnClickListener(this);
        btn_del=findViewById(R.id.btn_del);
        btn_del.setOnClickListener(this);
       // et_updatabyusername=findViewById(R.id.et_updatabyusername);
       // btn_upUserByName=findViewById(R.id.btn_upUserByName);
       // btn_upUserByName.setOnClickListener(this);
    }





    @Override
    public void onClick(View v) {
        Intent intent;
        switch (v.getId()){
            case R.id.btn_register:
                oneuser.setUserName(et_username.getText().toString());
                oneuser.setPassword(et_password.getText().toString());
                if (rb_female.isChecked())
                    oneuser.setSex("女");
                else
                    oneuser.setSex("男");
                oneuser.setCity(sp_city.getSelectedItem().toString());
                ContentValues contentValues = new ContentValues();
                contentValues.put("uName",oneuser.getUserName());
                contentValues.put("uPass",oneuser.getPassword());
                contentValues.put("uSex",oneuser.getSex());
                contentValues.put("bYear",oneuser.getYear_birth());
                contentValues.put("bMonth",oneuser.getMonth_birth());
                contentValues.put("bDay",oneuser.getDay_birth());
                contentValues.put("city",oneuser.getCity());
                db.insert("userInfo",null,contentValues);
                Toast.makeText(this,"用户注册成功！",Toast.LENGTH_SHORT).show();
                break;
            case R.id.btn_login:
                intent=new Intent(RegisterActivity.this,MainActivity.class);
                // intent.putExtra("auser",oneuser);
                startActivity(intent);
                break;
            case R.id.btn_del:
                int delCount = db.delete("userInfo","uName=? and uPass=?",new String[]{et_username.getText().toString(),et_password.getText().toString()});
                Toast.makeText(this,"成功删除"+delCount+"条记录",Toast.LENGTH_SHORT).show();
                break;
            case R.id.btn_selalluser:
                Cursor cursor = db.query("userInfo",null,null,null,null,null,null);
                StringBuffer stringBuffer = new StringBuffer();
                if (cursor.moveToFirst()){
                    do {
                        String str = "";
                        str = str + cursor.getString(cursor.getColumnIndex("uName"))+" ";
                        str = str +cursor.getString(cursor.getColumnIndex("uPass"))+" ";
                        str = str + cursor.getString(cursor.getColumnIndex("uSex"))+" ";
                        str = str + cursor.getString(cursor.getColumnIndex("city"));
                        stringBuffer.append(str + "\n");
                    } while(cursor.moveToNext());
                }
                tv_usershow.setText(stringBuffer);
                break;
        }
    }



    @Override
    protected void onDestroy() {
        super.onDestroy();
    }




}
