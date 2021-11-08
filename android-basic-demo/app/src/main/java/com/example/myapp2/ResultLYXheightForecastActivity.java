package com.example.myapp2;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class ResultLYXheightForecastActivity extends AppCompatActivity {
TextView btv_forecastMsg;
Button btn_result;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_result_lyxheight_forecast);
        btn_result = findViewById(R.id.btn_result);
        btv_forecastMsg = findViewById(R.id.btv_forecastMsg);
        // 在目标Activity中通过 getIntent方法获取源Activity 传过来的Intent
        Intent intent = getIntent();

        // 第一种方式 直接通过Intent 进行数据传递
        // getXXXExtra 方法直接获取控件上相应的数据
       /* String str_birthday = intent.getStringExtra("birthday");
        Boolean isMan = intent.getBooleanExtra("isMan",false);
        Boolean ischeckBox = intent.getBooleanExtra("ischeckBox",false);
        Boolean ischeckBox2 = intent.getBooleanExtra("ischeckBox2",false);
        Boolean ischeckBox3 = intent.getBooleanExtra("ischeckBox3",false);
        Boolean ischeckBox4 = intent.getBooleanExtra("ischeckBox4",false);
        int fh = intent.getIntExtra("fh",0);
        int mh = intent.getIntExtra("mh",0);

        btv_forecastMsg = findViewById(R.id.btv_forecastMsg);
        btv_forecastMsg.setText("你的生日为:"+str_birthday+"\n你是男生:"+isMan+"\n你爱运动:"+ischeckBox+"\n营养好 "+ischeckBox2+"\n爱喝牛奶"+ischeckBox3+"\n爱睡觉 "+ischeckBox4+"\n 你父亲的身高为:"+fh+"\n 你母亲的身高为:"+mh);
*/
        //第二种方式:先从intent上接收Bundle数据,再从Bundle里面解析各个数据
        /*Bundle bundle=intent.getBundleExtra("dataBundle");
        String str_birthday2=bundle.getString("birthday");
        Boolean isMan2 = intent.getBooleanExtra("isMan2",false);
        Boolean ischeckBox11 = intent.getBooleanExtra("ischeckBox11",false);
        Boolean ischeckBox22 = intent.getBooleanExtra("ischeckBox22",false);
        Boolean ischeckBox23 = intent.getBooleanExtra("ischeckBox23",false);
        Boolean ischeckBox24 = intent.getBooleanExtra("ischeckBox24",false);
        int fh2=bundle.getInt("fh2",0);
        int mh2=bundle.getInt("mh2",0);
        btv_forecastMsg = findViewById(R.id.btv_forecastMsg);
        btv_forecastMsg.setText("你的生日为:"+str_birthday2+"\n你是男生:"+isMan2+"\n你爱运动:"+ischeckBox22+"\n营养好 "+ischeckBox11+"\n爱喝牛奶"+ischeckBox23+"\n爱睡觉 "+ischeckBox24+"\n 你父亲的身高为:"+fh2+"\n 你母亲的身高为:"+mh2);
*/

// 第三种 :传对象
        FHInfo myinfo= (FHInfo) intent.getSerializableExtra("myInfo");
        String str_birthday4=myinfo.getBirthday();
        Boolean isMan4=myinfo.isMan();
        Boolean ischeckBox41=myinfo.isIscheckBox41();
        Boolean ischeckBox42=myinfo.isIscheckBox42();
        Boolean ischeckBox43=myinfo.isIscheckBox43();
        int fh4=myinfo.getFh();
        int mh4=myinfo.getMh();
        btv_forecastMsg = findViewById(R.id.btv_forecastMsg);
        btv_forecastMsg.setText("你的生日为:"+str_birthday4+"\n你是男生:"+isMan4+"\n营养好 "+ischeckBox41+"\n爱喝牛奶"+ischeckBox42+"\n爱睡觉 "+ischeckBox43+"\n 你父亲的身高为:"+fh4+"\n 你母亲的身高为:"+mh4);


        btn_result.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                Intent intent = getIntent();
                FHInfo myinfo= (FHInfo) intent.getSerializableExtra("myInfo");
                String str_birthday4=myinfo.getBirthday();
                Boolean isMan4=myinfo.isMan();
                Boolean ischeckBox41=myinfo.isIscheckBox41();
                Boolean ischeckBox42=myinfo.isIscheckBox42();
                Boolean ischeckBox43=myinfo.isIscheckBox43();
                int fh4=myinfo.getFh();
                int mh4=myinfo.getMh();
                int  childheight = (int)((fh4*0.923+mh4)/2);
                int  childheight2 = (int)((fh4+mh4)*0.54);

                Intent intent4 = new Intent();
                intent4.putExtra("str_birthday4",str_birthday4);
                intent4.putExtra("isMan4",isMan4);
                intent4.putExtra("ischeckBox41",ischeckBox41);
                intent4.putExtra("ischeckBox42",ischeckBox42);
                intent4.putExtra("ischeckBox43",ischeckBox43);
                intent4.putExtra("fh4",fh4);
                intent4.putExtra("mh4",mh4);
                intent4.putExtra("manheight",childheight);
                intent4.putExtra("wonheight",childheight2);
                setResult(1,intent4);
                finish();
            }
     });


    }
}
