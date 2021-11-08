package com.example.service;

import android.app.Service;
import android.content.Intent;
import android.os.Binder;
import android.os.IBinder;

import java.util.ArrayList;
import java.util.List;
import java.util.Random;

public class BinderService2 extends Service {
    public BinderService2() {
    }

    //创建MyBinder 内部类
     public class MyBinder extends Binder{
        public BinderService2 getService(){
            return BinderService2.this;   //返回当前Service类
        }
    }


    @Override
    public IBinder onBind(Intent intent) {
        // TODO: Return the communication channel to the service.
        return new MyBinder(); //返回MyBinder Service 对象
    }

    //自定义方法, 用于生成随机数
    public List getRandomNumber(){
        List resultArr = new ArrayList();
        String strNumber=""; //用于保存生成的随机数
        for (int i=0;i<7;i++){
            int number = new Random().nextInt(33)+1;  //生成指定范围随机数
            if (number<10){
                strNumber="0"+String.valueOf(number);
            }
            resultArr.add(strNumber); //把转换后的字符串添加到List集合中
        }
        return resultArr;
    }

    @Override
    public void onDestroy() {
        super.onDestroy();
    }
}
