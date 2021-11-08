package com.example.sqlite;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {
private String ad = "admin",password = "123";  //设置后台账号密码
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        final EditText et_username = findViewById(R.id.et_username);
        final EditText et_password = findViewById(R.id.et_password);
        Button btn_login = findViewById(R.id.btn_login);
        //获取Shareference 对象
        final SharedPreferences sp = getSharedPreferences("ad",MODE_PRIVATE);
        // 实现自动登录功能
        String username = sp.getString("username",null);
        final String password = sp.getString("password",null);
        if (username!=null && password!=null){
            if (username.equals(ad)&& password.equals(password)){
                Intent intent = new Intent(MainActivity.this, ResultMainActivity.class);
                startActivity(intent);   //启动跳转界面
            }
        }else{  // 实现手动登录并存储数据
            btn_login.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    String in_username = et_username.getText().toString(); // 获取输入的账户
                    String in_password = et_password.getText().toString();
                    SharedPreferences.Editor editor = sp.edit(); //获取editor对象
                    if (in_username.equals(ad) &&in_password.equals(password)){
                        editor.putString("username",in_username);  //保存账户
                        editor.putString("password",in_password); //保存密码
                        editor.commit();//提交信息
                        Intent intent = new Intent(MainActivity.this, ResultMainActivity.class);  //intent实现跳转
                        startActivity(intent);
                        Toast.makeText(MainActivity.this,"已保存账号密码",Toast.LENGTH_LONG).show();
                    }else{
                        Toast.makeText(MainActivity.this,"账号或密码错误",Toast.LENGTH_LONG).show();
                    }
                }
            });

        }
    }
}
