package com.example.myapp2;

import androidx.appcompat.app.AppCompatActivity;

import android.app.DatePickerDialog;
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.text.method.LinkMovementMethod;
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

public class LYXForecastHieghtActivity2 extends AppCompatActivity implements View.OnClickListener, CompoundButton.OnCheckedChangeListener {
    Button btn_date,btn_forecast,btn_reset;
    TextView tv_about,tv_message,tv_msgContent1,tv_msgContent2,tv_msgContent3;
    RadioGroup rg_gender;
    RadioButton rb_man,rb_wom;
    LinearLayout pagebg;
    CheckBox checkBox,checkBox2,checkBox3,checkBox4;
    EditText edt_birthday,edt_fatherheight,edt_motherheight;
    int choiceSex;
    int childheight;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lyxforecast_hieght2);
        //获取布局中对应的控件的id
        btn_date=findViewById(R.id.btn_date);
        btn_date.setOnClickListener(this);
        pagebg=findViewById(R.id.pagebg);
        tv_message=findViewById(R.id.tv_message);
        tv_msgContent1=findViewById(R.id.tv_msgContent1);
        tv_msgContent2=findViewById(R.id.tv_msgContent2);
        tv_msgContent3=findViewById(R.id.tv_msgContent3);
        edt_fatherheight=findViewById(R.id.edt_fatherHeight);
        edt_motherheight=findViewById(R.id.edt_motherheight);
        edt_birthday=findViewById(R.id.edt_birthday);

        btn_forecast=findViewById(R.id.btn_foreget);
        btn_forecast.setOnClickListener(this);
        btn_reset=findViewById(R.id.btn_reset);
        btn_reset.setOnClickListener(this);

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


        tv_about=findViewById(R.id.tv_about);
        //设置id:tv_about为可点击状态
        tv_about.setMovementMethod(LinkMovementMethod.getInstance());
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
            case R.id.btn_reset:
                edt_fatherheight.setText(" ");
                edt_birthday.setText(" ");
                edt_motherheight.setText(" ");
//               rb_man.setChecked(true);
//               for (int i=0;i<pagebg.getChildCount();i++){
//                   CheckBox cb_child=(CheckBox) pagebg.getChildAt(i);
//                   cb_child.setChecked(false);
//               }
//               rb_man.setChecked(true);
//               rb_wom.setChecked(false);
                break;
            case R.id.btn_foreget:
               String fh=edt_fatherheight.getText().toString();
               String mh=edt_motherheight.getText().toString();
               if(edt_fatherheight.getText().toString().length()<1 || edt_motherheight.getText().toString().length()<1|| edt_birthday.getText().toString().length()<1){
                   Toast.makeText(this,"请输入你父母的身高信息和你的出生日期",Toast.LENGTH_LONG);
               }else{
                   if(choiceSex==1){
                       if (!fh.equals("")) {
                           int fh1=Integer.parseInt(fh);
                           int mh1=Integer.parseInt(mh);
                           childheight = (int)((fh1+mh1)*0.54);
                           if(checkBox.isChecked()){
                               childheight = childheight+2;
                           }
                           if (checkBox2.isChecked()){
                               childheight = childheight+2;
                           }
                           if (checkBox3.isChecked()){
                               childheight = childheight+2;
                           }
                           tv_msgContent1.setText("你父亲的身高为:"+fh1+"cm");
                           tv_msgContent2.setText("你母亲的身高为:"+mh1+"cm");
                           tv_msgContent3.setText("你的身高为:"+childheight+"cm");
                       }
                   }
                   else{
                       if (!mh.equals("")) {
                           int fh1=Integer.parseInt(fh);
                           int mh1=Integer.parseInt(mh);
                           childheight = (int)((fh1*0.923+mh1)/2);
                           if(checkBox.isChecked()){
                               childheight = childheight+2;
                           }
                           if (checkBox2.isChecked()){
                               childheight = childheight+2;
                           }
                           if (checkBox3.isChecked()){
                               childheight = childheight+2;
                           }
                           tv_msgContent1.setText("你父亲的身高为:"+fh1+"cm");
                           tv_msgContent2.setText("你母亲的身高为:"+mh1+"cm");
                           tv_msgContent3.setText("你的身高为:"+childheight+"cm");
                       }
                   }
                   break;
           }


        }
    }

}
