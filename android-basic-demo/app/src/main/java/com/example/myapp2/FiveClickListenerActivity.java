package com.example.myapp2;


import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

/*
//1. 内部类形式
public class FiveClickListenerActivity extends AppCompatActivity {
    class MyButtonListener implements View.OnClickListener{
        @Override
        public void onClick(View v){
           // 相关的事件处理
            Toast.makeText(FiveClickListenerActivity.this,"内部类实现单击按钮事件监听",Toast.LENGTH_SHORT).show();
        }
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_five_click_listener);
        Button button =(Button) findViewById(R.id.btn_1);
        MyButtonListener listener = new MyButtonListener();
        button.setOnClickListener(listener);
    }
}
*/




/*
//2. 外部类形式
public class FiveClickListenerActivity extends AppCompatActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_five_click_listener);
       Button button = (Button) findViewById(R.id.btn_1);
       MyButtonListener listener = new MyButtonListener();
       button.setOnClickListener(listener);
    }
}

// 新建一个外部类`MyButtonListener`:

public class MyButtonListener implements View.OnClickListener {
    public void onClick(View v){
       //相关事件处理
    }
}
*/


/*
// 3.匿名内部类形式
public class FiveClickListenerActivity extends AppCompatActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_five_click_listener);
        Button button = (Button) findViewById(R.id.btn_1);
       button.setOnClickListener(new View.OnClickListener() {
           @Override
           public void onClick(View v) {
               Toast.makeText(FiveClickListenerActivity.this,"匿名内部类实现事件监听功能",Toast.LENGTH_SHORT).show();
           }
       });
    }
}
*/


/*
// Activity本身作为事件监听器类
public class FiveClickListenerActivity extends AppCompatActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_five_click_listener);
        Button button = (Button) findViewById(R.id.btn_1);

        //通过Acvitity 创建一个监听对象,this就是这个对象
        //将监听器注册到按钮上
        button.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        Toast.makeText(this,"Activity本身作为事件监听器类实现事件监听功能",Toast.LENGTH_SHORT).show();
    }
}

*/

// 通过绑定标签完成监听
// 在布局文件(`XML`)中添加`onClick`属性,属性值作为方法名进行重写完成监听




public class FiveClickListenerActivity extends AppCompatActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_five_click_listener);

    }

}












