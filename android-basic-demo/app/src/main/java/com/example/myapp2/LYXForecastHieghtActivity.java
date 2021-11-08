package com.example.myapp2;

import androidx.appcompat.app.AppCompatActivity;

import android.app.DatePickerDialog;
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.widget.Toast;

import java.util.Calendar;

public class LYXForecastHieghtActivity extends AppCompatActivity implements View.OnClickListener, CompoundButton.OnCheckedChangeListener {
Button btn_date,btn_Intent,btn_Bundle,btn_Serializable;
RadioGroup rg_gender;
RadioButton rb_man,rb_wom;
LinearLayout pagebg;
TextView atv_forecastMsg,btv_forecastMsg;
CheckBox checkBox,checkBox2,checkBox3,checkBox4;
EditText edt_birthday,edt_fatherheight,edt_motherheight;
int choiceSex;
int childheight;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lyxforecast_hieght);
        //获取布局中对应的控件的id
        btn_date=findViewById(R.id.btn_date);
        btn_date.setOnClickListener(this);
        pagebg=findViewById(R.id.pagebg);
        edt_fatherheight=findViewById(R.id.edt_fatherHeight);
        edt_motherheight=findViewById(R.id.edt_motherheight);
        edt_birthday=findViewById(R.id.edt_birthday);
        atv_forecastMsg=findViewById(R.id.atv_forecastMsg);
        btv_forecastMsg=findViewById(R.id.btv_forecastMsg);

        btn_Intent=findViewById(R.id.btn_Intent);
        btn_Intent.setOnClickListener(this);
        btn_Bundle=findViewById(R.id.btn_Bundle);
        btn_Bundle.setOnClickListener(this);
        btn_Serializable=findViewById(R.id.btn_Serializable);
        btn_Serializable.setOnClickListener(this);


        rg_gender=findViewById(R.id.rg_gender);
        rb_man=findViewById(R.id.rb_man);
        rb_man.setOnCheckedChangeListener(this);
        rb_wom=findViewById(R.id.rb_wom);
        rb_wom.setOnCheckedChangeListener(this);

        checkBox=findViewById(R.id.checkBox);
        checkBox2=findViewById(R.id.checkBox2);
        checkBox3=findViewById(R.id.checkBox3);
        checkBox4=findViewById(R.id.checkBox4);

        //设置性别单选按钮 监听事件
        rg_gender.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(RadioGroup group, int checkedId) {
                if(checkedId==rb_man.getId()){
                    choiceSex=1;    //选择男
                }
                else{
                    choiceSex=0;    //选择女
                }
            }
        });

    }

    //性别选择 点击弹框
    public void onCheckedChanged(CompoundButton compoundButton,boolean isCheck){
        switch(compoundButton.getId()){
            case R.id.rb_man:
                if (isCheck){
                    Toast.makeText(this, "男", Toast.LENGTH_SHORT).show();
                    pagebg.setBackgroundColor(Color.argb(100,228,237,193));
                }
                break;
            case R.id.rb_wom:
                if (isCheck){
                    Toast.makeText(this, "女", Toast.LENGTH_SHORT).show();
                    pagebg.setBackgroundColor(Color.argb(100,193,226,143));
                }
                break;
        }
    }

     // 按钮事件处理
    public void onClick(View view){
       switch(view.getId()){
           case R.id.btn_date:
               DatePickerDialog.OnDateSetListener birthdayListener=new DatePickerDialog.OnDateSetListener() {
                   @Override
                   public void onDateSet(DatePicker view, int year, int month, int dayOfMonth) {
                       month=month+1;
                       edt_birthday.setText(year+"-"+month+"-"+dayOfMonth);
                   }
               };
               Calendar calendar=Calendar.getInstance();
               int byear,bmonth,bday;
               byear=calendar.get(Calendar.YEAR)-20;
               bmonth=calendar.get(Calendar.MONTH);
               bday=calendar.get(Calendar.DAY_OF_MONTH);
               DatePickerDialog datePickerDialog=new DatePickerDialog(this,birthdayListener,byear,bmonth,bday);
               datePickerDialog.show();
               break;
           case R.id.btn_Intent:
               // 创建Intent ,明确源Activity和目标Activity
               Intent intent = new Intent(LYXForecastHieghtActivity.this,ResultLYXheightForecastActivity.class);
               // 获取控件上的数据
               String str_birthday = edt_birthday.getText().toString();
               Boolean isMan = rb_man.isChecked();
               int fh = Integer.parseInt(edt_fatherheight.getText().toString());
               int mh = Integer.parseInt(edt_motherheight.getText().toString());
               Boolean ischeckBox = checkBox.isChecked();
               Boolean ischeckBox2 = checkBox2.isChecked();
               Boolean ischeckBox3 = checkBox3.isChecked();
               Boolean ischeckBox4 = checkBox4.isChecked();
               // 通过putExtra方法 在Intent上绑定数据
               //1. 第一种通过Intent直接传递数据:
               intent.putExtra("birthday",str_birthday);
               intent.putExtra("isMan",isMan);
               intent.putExtra("fh",fh);
               intent.putExtra("mh",mh);
               intent.putExtra("ischeckBox",ischeckBox);
               intent.putExtra("ischeckBox2",ischeckBox2);
               intent.putExtra("ischeckBox3",ischeckBox3);
               intent.putExtra("ischeckBox4",ischeckBox4);
               //最后通过startActivity方法实现Activity的跳转
               startActivity(intent);
               break;
           case R.id.btn_Bundle:
               // 创建Intent ,明确源Activity和目标Activity
               Intent intent2 = new Intent(LYXForecastHieghtActivity.this,ResultLYXheightForecastActivity.class);
               // 获取控件上的数据
               String str_birthday2 = edt_birthday.getText().toString();
               Boolean isMan2 = rb_man.isChecked();
               int fh2 = Integer.parseInt(edt_fatherheight.getText().toString());
               int mh2 = Integer.parseInt(edt_motherheight.getText().toString());
               Boolean ischeckBox11 = checkBox.isChecked();
               Boolean ischeckBox22 = checkBox2.isChecked();
               Boolean ischeckBox23 = checkBox3.isChecked();
               Boolean ischeckBox24 = checkBox4.isChecked();

               //2. 第二种方法: Bundle传递数据,先通过putXXX方法把数据加载在Bundle中，然后再将bundle加载到intent 上
               Bundle bundle = new Bundle();
               bundle.putString("birthday",str_birthday2);
               bundle.putBoolean("isMan2",isMan2);
               bundle.putBoolean("ischeckBox11",ischeckBox11);
               bundle.putBoolean("ischeckBox22",ischeckBox22);
               bundle.putBoolean("ischeckBox23",ischeckBox23);
               bundle.putBoolean("ischeckBox24",ischeckBox24);
               bundle.putInt("fh2",fh2);
               bundle.putInt("mh2",mh2);
               intent2.putExtra("dataBundle",bundle);
               //最后通过startActivity方法实现Activity的跳转
               startActivity(intent2);
               break;
           case R.id.btn_Serializable:
               // 创建Intent ,明确源Activity和目标Activity
               Intent intent4 = new Intent(LYXForecastHieghtActivity.this,ResultLYXheightForecastActivity.class);
               // 获取控件上的数据
               String str_birthday4 = edt_birthday.getText().toString();
               Boolean isMan4 = rb_man.isChecked();
               int fh4 = Integer.parseInt(edt_fatherheight.getText().toString());
               int mh4 = Integer.parseInt(edt_motherheight.getText().toString());
               Boolean ischeckBox41 = checkBox2.isChecked();
               Boolean ischeckBox42 = checkBox3.isChecked();
               Boolean ischeckBox43 = checkBox4.isChecked();
               //第三种方法：传对象；
               FHInfo fhInfo=new FHInfo();
               fhInfo.setBirthday(str_birthday4);
               fhInfo.setMan(isMan4);
               fhInfo.setIscheckBox41(ischeckBox41);
               fhInfo.setIscheckBox42(ischeckBox42);
               fhInfo.setIscheckBox43(ischeckBox43);
               fhInfo.setFh(fh4);
               fhInfo.setMh(mh4);
               //只有序列化的对象才能通过intent进行传递
               intent4.putExtra("myInfo",fhInfo);
               //最后通过startActivity方法实现Activity的跳转
               startActivityForResult(intent4,1);
               break;
       }
    }


    //重写 onActivityResult() 获取并显示从ResultHeightActivity返回的结果
    protected  void onActivityResult(int requestCode,int resultCode,Intent data){
        super.onActivityResult(requestCode,resultCode,data);
        if (resultCode==1 && requestCode==1){

         // 获取从ResultHeightActivity返回的数据
        int childheight = data.getIntExtra("manheight",0);
        int childheight2 = data.getIntExtra("wonheight",0);
        String str_birthday4 = data.getStringExtra("str_birthday4");
        Boolean isMan4 = data.getBooleanExtra("isMan4",false);
        Boolean ischeckBox41 = data.getBooleanExtra("ischeckBox41",false);
        Boolean ischeckBox42 = data.getBooleanExtra("ischeckBox42",false);
        Boolean ischeckBox43 = data.getBooleanExtra("ischeckBox43",false);
        int fh4 = data.getIntExtra("fh4",0);
        int mh4 = data.getIntExtra("mh4",0);

        // 根据男女在ForecastHieghtActivty中的TextView显示不同的身高预测信息
            if (!isMan4.equals("")){
                atv_forecastMsg.setText("你的生日为:"+str_birthday4+"\n你是男生:"+isMan4+"\n你爱运动:"+ischeckBox41+"\n营养好 "+ischeckBox42+"\n爱喝牛奶"+ischeckBox43+"\n 你父亲的身高为:"+fh4+"\n 你母亲的身高为:"+mh4+"" + "\n你的身高预测为:"+childheight+"厘米");
            }else{
                atv_forecastMsg.setText("你的生日为:"+str_birthday4+"\n你是男生:"+isMan4+"\n你爱运动:"+ischeckBox41+"\n营养好 "+ischeckBox42+"\n爱喝牛奶"+ischeckBox43+"\n 你父亲的身高为:"+fh4+"\n 你母亲的身高为:"+mh4+"" + "\n你的身高预测为:"+childheight2+"厘米");
            }

        }
    }


}
