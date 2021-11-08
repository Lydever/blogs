package com.example.myapp2;


import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Toast;

public class HXJZG_Onclick_Activity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_hxjzg__onclick_);
    }

    public void btn_fqClick(View v){
        Toast.makeText(HXJZG_Onclick_Activity.this,"富强",Toast.LENGTH_SHORT).show();
    }
    public void btn_mzClick(View v){
        Toast.makeText(HXJZG_Onclick_Activity.this,"民主",Toast.LENGTH_SHORT).show();
    }
    public void btn_wmClick(View v){
        Toast.makeText(HXJZG_Onclick_Activity.this,"文明",Toast.LENGTH_SHORT).show();
    }
    public void btn_hxClick(View v){
        Toast.makeText(HXJZG_Onclick_Activity.this,"和谐",Toast.LENGTH_SHORT).show();
    }
    public void btn_zyClick(View v){
        Toast.makeText(HXJZG_Onclick_Activity.this,"自由",Toast.LENGTH_SHORT).show();
    }
    public void btn_pdClick(View v){
        Toast.makeText(HXJZG_Onclick_Activity.this,"平等",Toast.LENGTH_SHORT).show();
    }
    public void btn_gzClick(View v){
        Toast.makeText(HXJZG_Onclick_Activity.this,"公正",Toast.LENGTH_SHORT).show();
    }
    public void btn_fzClick(View v){
        Toast.makeText(HXJZG_Onclick_Activity.this,"法治",Toast.LENGTH_SHORT).show();
    }
    public void btn_agClick(View v){
        Toast.makeText(HXJZG_Onclick_Activity.this,"爱国",Toast.LENGTH_SHORT).show();
    }
    public void btn_jyClick(View v){
        Toast.makeText(HXJZG_Onclick_Activity.this,"敬业",Toast.LENGTH_SHORT).show();
    }
    public void btn_cxClick(View v){
        Toast.makeText(HXJZG_Onclick_Activity.this,"诚信",Toast.LENGTH_SHORT).show();
    }
    public void btn_ysClick(View v){
        Toast.makeText(HXJZG_Onclick_Activity.this,"友善",Toast.LENGTH_SHORT).show();
    }

}
