package com.example.adapterbase;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class IntentStartActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_intent_start);
        Button btn_xsopen = (Button)findViewById(R.id.btn_xsopen);
        Button btn_call = (Button)findViewById(R.id.btn_call);
        Button btn_photo = (Button)findViewById(R.id.btn_photo);
        Button btn_ysopen = (Button)findViewById(R.id.btn_ysopen);
        Button btn_msg = (Button)findViewById(R.id.btn_msg);

    }

    public void onClick(View view){
        switch(view.getId()){
            case R.id.btn_xsopen:
                Intent intent = new Intent();
                // 第一种方式: 通过setClass明确跳转目标Activiyty
                intent.setClass(this,ResultIntentActivity.class);
                // 第二种方式: 通过setClassName明确跳转目标Activity,可以完成跨应用程序跳转
                intent.setClassName("package com.example.myapp2","package com.example.myapp2.AdapterGoodsActivity");
                break;
            case R.id.btn_ysopen:
                intent = new Intent();
                intent.setAction("com.cn.LYX");
                intent.addCategory("android.intent.category.DEFAULT");
                startActivity(intent);
                break;
            case R.id.btn_call:
                //用隐式Intent 打电话
                intent=new Intent();
                intent.setAction(Intent.ACTION_CALL);
                intent.setData(Uri.parse("tel:18000000000"));
                startActivity(intent);
                break;
            case R.id.btn_photo:
                //用隐式Intent 打开相机
                intent=new Intent();
                intent.setAction("android.media.action.IMAGE_CAPTURE");
                intent.addCategory("android.intent.cattegory.DEFAULT");
                startActivity(intent);
                break;
            case R.id.btn_msg:
                //用隐式Intent 发送信息
                Uri uri = Uri.parse("msgSendTo:10000");
                intent=new Intent(Intent.ACTION_SENDTO,uri);
                intent.putExtra("msg_content","hello,10000");
                startActivity(intent);
                break;
        }
    }
}
