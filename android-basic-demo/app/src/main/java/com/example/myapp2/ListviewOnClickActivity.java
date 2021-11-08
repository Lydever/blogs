package com.example.myapp2;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class ListviewOnClickActivity extends AppCompatActivity {
ListView lv_list;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_listview_on_click);

        // lv_list :ListView控件,用来展示数据
        lv_list=findViewById(R.id.lv_list);

        //datanames 是一组数据源
        String[] datanames = {"Betty","Tom","Jack","Lucy","Rocy"};
        String[] datafroms = {"来自广州","来自深圳","来自北京","来自杭州","来自天津"};
        int[] dataimgs = {R.drawable.ic_launcher_background,R.drawable.ic_launcher_background,R.drawable.ic_launcher_background,};
        String [] datafroms2 = {"来自广州","来自深圳","来自北京","来自杭州","来自天津"};
        int [] datayears = {2000,2001,2002,2003,2004,2005};
        
        //listAdapter 是一个适配器,用来沟通数据源和控件的
        //第一种适配器:ArrayAdapter 方便使用,但功能弱
        // 1.使用系统默认item布局
        // ArrayAdapter<Srtring> listAdapter=newArrayAdapter<String> (this,android.R.layout.simple_list_item_1,dataname);
        // 2. 使用自定义布局
        ArrayAdapter<String> listAdapter = new ArrayAdapter<>(this,R.layout.activity_listview_on_click,datanames);
        lv_list.setAdapter(listAdapter);

        //第二种适配器 SimpleAdapter :功能强大
       List<Map<String,Object>> listFreinds= new ArrayList<Map<String,Object>>();
        for (int i=0;i<datanames.length;i++){
            Map<String,Object> onedata = new HashMap<String,Object>();
            onedata.put("name",datanames[i]);
            onedata.put("tv_from",datafroms[i]);
            onedata.put("img",dataimgs[i]);

        }
        SimpleAdapter friendsAdapetr = new SimpleAdapter(this,listFreinds,R.layout.listview2,new String[]{"name","tv_from","img"},new int[]{R.id.tv_name,R.id.tv_msg,R.id.im_img});
        lv_list.setAdapter(friendsAdapetr);



    }
}
