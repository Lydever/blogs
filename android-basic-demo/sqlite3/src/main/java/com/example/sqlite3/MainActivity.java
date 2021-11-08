package com.example.sqlite3;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {
    Button btn_login,btn_clear,btn_register;
    EditText et_username,et_password;
    CheckBox cb_auto;
    Intent intent;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        et_username=findViewById(R.id.et_username);
        et_password=findViewById(R.id.et_password);
        cb_auto=findViewById(R.id.cb_autologin);
        btn_clear=findViewById(R.id.btn_clear);
        btn_clear.setOnClickListener(this);
        btn_login=findViewById(R.id.btn_login);
        btn_login.setOnClickListener(this);
        btn_register = findViewById(R.id.btn_register);
        btn_register.setOnClickListener(this);
        //创建一个SharedPreferences对象sp，确定打开的文件名及打开模式
        SharedPreferences sp=getSharedPreferences("logindata",MODE_PRIVATE);
        //直接通过对象sp的getXXX方法进行数据的读取
        boolean auto=sp.getBoolean("autosave",false);
        String uname=sp.getString("username","");
        String upassword=sp.getString("userpassword","");
        if(auto){
            cb_auto.setChecked(true);
            et_username.setText(uname);
            et_password.setText(upassword);
        }
    }

    @Override
    public void onClick(View view) {
        switch (view.getId()){
            case R.id.btn_clear:
                et_username.setText("");
                et_password.setText("");
                break;
            case R.id.btn_login:
                //创建一个SharedPreferences对象sp，确定打开的文件名及打开模式
                SharedPreferences sp=getSharedPreferences("logindata",MODE_PRIVATE);
                //创建SharedPreferences.Editor的编辑器editor
                SharedPreferences.Editor editor=sp.edit();
                //通过editor编辑器的putXXX方法写数据
                editor.putBoolean("autosave",cb_auto.isChecked());
                editor.putString("username",et_username.getText().toString());
                editor.putString("userpassword",et_password.getText().toString());
                //editor.apply()进行数据的提交
                editor.apply();
                intent=new Intent(this,EditActivity.class);
                intent.putExtra("username",et_username.getText().toString());
                startActivity(intent);
                Toast.makeText(this,"登录成功！",Toast.LENGTH_SHORT).show();
                break;
            case R.id.btn_register:
                intent = new Intent(this,RegisterActivity.class);
                startActivity(intent);
        }

    }
}
