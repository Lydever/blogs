package com.example.myapp2;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.os.Bundle;
import android.view.Menu;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.os.Bundle;

public class demoHieght extends AppCompatActivity implements OnClickListener {
    private Button btn;
    private EditText heigh;
    private TextView weight;
    private RadioGroup m_RadioGroup;
    private RadioButton m_Radio1;
    private RadioButton m_Radio2;
    private int choice1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_demo_hieght);
        heigh = (EditText) findViewById(R.id.etMsg);
        weight = (TextView) findViewById(R.id.tvHsg);
        btn = (Button) findViewById(R.id.MyBtn);
        btn.setOnClickListener(this);
        m_RadioGroup = (RadioGroup)findViewById(R.id.RadioGroup01);
        m_Radio1=(RadioButton)findViewById(R.id.RadioButton1);
        m_Radio2=(RadioButton)findViewById(R.id.RadioButton2);
        //设置监听事件
        m_RadioGroup.setOnCheckedChangeListener(new RadioGroup.OnCheckedChangeListener() {

            @Override
            public void onCheckedChanged(RadioGroup group, int checkedId) {
                // TODO Auto-generated method stub

                if(checkedId==m_Radio1.getId()){
                    choice1=1;    //选择性别为男
                }
                else{
                    choice1=0;    //选择性别为女
                }
            }
        });

    }


    @Override
    public void onClick(View arg0) {
        // TODO Auto-generated method stub
        String h = heigh.getText().toString();

        if(choice1==1){//计算成年男性的标准体重
            if (!h.equals("")) {
                double height = Double.valueOf(h);
                height = 0.9*(height - 100);
                weight.setText(height + " kg");
            }
        }
        else{
            if (!h.equals("")) {//计算成年女性的标准体重
                double height = Double.valueOf(h);
                height = 0.9*(height - 100)-2.5;
                weight.setText(height + " kg");
            }
        }
    }
}