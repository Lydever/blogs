package com.example.sqlite;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.Toast;

public class MainEditorActivity extends AppCompatActivity implements View.OnClickListener {
    EditText edt_username;
    EditText edt_password;
    CheckBox checkbox_save;
    Button btn_login;
    Button btn_reset;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_shareperference);

        // 获取布局文件中控件
         edt_username = findViewById(R.id.edt_username);
         edt_password = findViewById(R.id.edt_password);
         checkbox_save = findViewById(R.id.checkbox_save);
         btn_login = findViewById(R.id.btn_login);
         btn_reset = findViewById(R.id.btn_reset);

        // 登录按钮的点击事件监听
        btn_login.setOnClickListener(this);
        // 重置按钮的点击事件监听
        btn_reset.setOnClickListener(this);
        SharedPreferences sp = getSharedPreferences("logindate",MODE_PRIVATE);
        boolean auto = sp.getBoolean("autosave",false);
        String uname = sp.getString("username","");
        String upassword = sp.getString("userpassword","");
        if (auto){
            checkbox_save.setChecked(true);
            edt_username.setText(uname);
            edt_password.setText(upassword);
        }


    }

    @Override
    public void onClick(View v) {
        switch (v.getId()){
            case R.id.btn_login:
                // 创建一个Shareference 对象,确定打开文件名及文件
                SharedPreferences sp = getSharedPreferences("logindate",MODE_PRIVATE);
                // 创建一个Shareference.Editor的编辑器editor
                SharedPreferences.Editor editor = sp.edit();
                // 通过editor编辑器的putXXX方法进行数据的提交
                editor.putBoolean("autosave",checkbox_save.isChecked());
                editor.putString("username",edt_username.getText().toString());
                editor.putString("userpassword",edt_password.getText().toString());
                editor.apply();
                Intent intent = new Intent(this,EditorActivity.class);
                intent.putExtra("text_user",edt_username.getText().toString());
                intent.putExtra("userpassword",edt_password.getText().toString());
                startActivity(intent);
                Toast.makeText(this,"登录成功", Toast.LENGTH_LONG).show();
                break;
            case R.id.btn_reset:
                edt_username.setText("");
                edt_password.setText("");
                break;
        }
    }
}
