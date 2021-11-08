package com.example.adapterbase;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.DialogInterface;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class AlertDialogActivity extends AppCompatActivity implements View.OnClickListener {
    private Button one;
    private Button two;
    private Button three;
    private Button four;
    private Context myContext;
    private boolean[] checkItems;
    private AlertDialog alert = null;
    private AlertDialog.Builder builder = null;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_alert_dialog);
        myContext = AlertDialogActivity.this;
        bindView();
    }

    private void bindView(){
        one = (Button) findViewById(R.id.one);
        two = (Button) findViewById(R.id.two);
        three = (Button) findViewById(R.id.three);
        four = (Button) findViewById(R.id.four);
        one.setOnClickListener(this);
        two.setOnClickListener(this);
        three.setOnClickListener(this);
        four.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()){
            // 普通对话框
            case R.id.one:
                alert = null;
                builder = new AlertDialog.Builder(myContext);
                alert = builder.setIcon(R.mipmap.ic_launcher)
                        .setTitle("系统提示:")
                        .setMessage("这是一个最普通的AlertDialog,带有三个按钮，分别是取消，中立和确定")
                        .setNegativeButton("取消", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                Toast.makeText(myContext, "你点击了取消按钮~", Toast.LENGTH_SHORT).show();
                            }
                        })
                        .setPositiveButton("确定", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                Toast.makeText(myContext, "你点击了确定按钮~", Toast.LENGTH_SHORT).show();
                            }
                        })
                        .setNegativeButton("中立", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                Toast.makeText(myContext, "你点击了中立按钮~", Toast.LENGTH_SHORT).show();
                            }
                        }).create();  //创建AlertDialog对象
                    alert.show();
                    break;
            case R.id.two:
                final String[] lesson = new String[]{"php","java","javascript","python","Android移动开发","c语言"};
                alert = null;
                builder = new AlertDialog.Builder(myContext);
                alert = builder.setIcon(R.mipmap.ic_launcher)
                        .setTitle("请选择你的专业课")
                        .setItems(lesson, new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                Toast.makeText(myContext, "你选择了"+lesson[which], Toast.LENGTH_SHORT).show();
                            }
                        }).create();
                     alert.show();
                     break;
                     
                //单选列表对话框
            case R.id.three:
                final String[] fruits = new String[]{"苹果","香蕉","葡萄","柿子","柚子","西瓜"};
                alert = null;
                builder = new AlertDialog.Builder(myContext);
                alert = builder.setIcon(R.mipmap.ic_launcher)
                        .setTitle("选择你喜欢的水果,只能选择一个")
                        .setSingleChoiceItems(fruits, 0, new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                Toast.makeText(getApplicationContext(), "你选择了"+fruits[which], Toast.LENGTH_SHORT).show();
                            }
                        }).create();
                alert.show();
                break;
                //多选列表对话框
            case R.id.four:
                final String[] langues = new String[]{"php","java","MySQL","python","javascript"};
                //定义一个用来记录列表状态的boolean数组
                checkItems = new boolean[]{false,false,false,false,false};
                alert = null;
                builder = new AlertDialog.Builder(myContext);
                alert = builder.setIcon(R.mipmap.ic_launcher)
                        .setMultiChoiceItems(langues, checkItems, new DialogInterface.OnMultiChoiceClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which, boolean isChecked) {
                                checkItems[which] = isChecked;
                            }
                        })
                        .setPositiveButton("确定", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                String result = "";
                                for (int i=0;i<checkItems.length;i++){
                                    if (checkItems[i])
                                        result +=langues[i]+" ";
                                }
                                Toast.makeText(getApplicationContext(), "你选择了:"+result, Toast.LENGTH_SHORT).show();
                            }
                        }).create();
                alert.show();
                break;
        }
    }
}
