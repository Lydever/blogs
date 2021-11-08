package com.example.myapp2;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.Toast;

public class CheckBoxActivity extends AppCompatActivity {
    Button btn;
    CheckBox check1,check2,check3,check4,check5,check6;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_check_box);
        btn = findViewById(R.id.btn_confirm);
        check1 = findViewById(R.id.ckeck1);
        check2 = findViewById(R.id.ckeck2);
        check3 = findViewById(R.id.ckeck3);
        check4 = findViewById(R.id.ckeck4);
        check5 = findViewById(R.id.ckeck5);
        check6 = findViewById(R.id.ckeck6);
        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String str = "你的兴趣有:";
                if (check1.isChecked()){
                    str +=check1.getText().toString()+",";
                }
                if (check2.isChecked()){
                    str +=check2.getText().toString()+",";
                }
                if (check3.isChecked()){
                    str +=check3.getText().toString()+",";
                }
                if (check4.isChecked()){
                    str +=check4.getText().toString()+",";
                }
                if (check5.isChecked()){
                    str +=check5.getText().toString()+",";
                }
                if (check6.isChecked()){
                    str +=check6.getText().toString()+",";
                }
                Toast.makeText(CheckBoxActivity.this, str, Toast.LENGTH_SHORT).show();
            }
        });
    }
}
