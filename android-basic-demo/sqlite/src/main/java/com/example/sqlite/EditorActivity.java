package com.example.sqlite;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;

public class EditorActivity extends AppCompatActivity implements View.OnClickListener{
TextView tv_user;
Button btn_save,btn_clear,btn_close;
EditText edt_text;
String struser = "data";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_editor);

        btn_save = findViewById(R.id.btn_save);
        btn_clear = findViewById(R.id.btn_clear);
        btn_close = findViewById(R.id.btn_close);
        tv_user = findViewById(R.id.tv_user);
        edt_text = findViewById(R.id.edt_text);

        Intent intent = getIntent();
        struser = intent.getStringExtra("username");
        tv_user.setText("此文档由"+struser+"编辑");


        btn_save.setOnClickListener(this);
        btn_clear.setOnClickListener(this);
        btn_close.setOnClickListener(this);
        FileInputStream fis = null;
        try {
             fis = openFileInput("note.txt");
            byte[] b = new byte[fis.available()];
            fis.read(b);
            edt_text.setText(new String(b));
        } catch (FileNotFoundException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }finally{
            if (fis!=null){
                try {
                    fis.close();
                } catch (IOException e) {
                    e.printStackTrace();
                }
            }
        }

    }



    @Override
    public void onClick(View v) {
        switch(v.getId()){
            case R.id.btn_save:
                String stredt = edt_text.getText().toString();
                FileOutputStream fos=null;
                try {
                    // 打开一个文件流
                     fos = openFileOutput("note.txt",MODE_PRIVATE);
                    byte[] bytes = stredt.getBytes();  //创建二进制数组
                    fos.write(bytes);   //写入文件
                    fos.flush();
                    Toast.makeText(this,"保存成功",Toast.LENGTH_SHORT).show();
                } catch (FileNotFoundException e) {
                    e.printStackTrace();
                } catch (IOException e) {
                    e.printStackTrace();
                }finally{
                    if (fos!=null){
                        try {
                            fos.close();
                        } catch (IOException e) {
                            e.printStackTrace();
                        }
                    }
                }
                break;
            case R.id.btn_clear:
                edt_text.setText("");
                break;
            case R.id.btn_close:
                finish();
                break;

        }
    }
}

