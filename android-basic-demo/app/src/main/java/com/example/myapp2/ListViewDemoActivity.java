package com.example.myapp2;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.ListView;
import android.widget.SimpleAdapter;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class ListViewDemoActivity extends AppCompatActivity {
private String[] names = new String[]{"李子","老李宝宝","Lycode"};
private String[] says = new String[]{"万丈豪情","谁与争锋","敢对苍穹","我是英雄"};
private int[] imgIds = new int[] {R.mipmap.ic_launcher_round,R.mipmap.ic_launcher_round,R.mipmap.ic_launcher_round,R.mipmap.ic_launcher_round};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_view_demo);

        List<Map<String,Object>> listitem = new ArrayList<Map<String, Object>>();
        for (int i=0;i<names.length;i++){
            Map<String,Object> showitem = new HashMap<String,Object>();
            showitem.put("头像",imgIds[i]);
            showitem.put("昵称",names[i]);
            showitem.put("说说",says[i]);
            listitem.add(showitem);
        }

        //创建一个simpleAdapter适配器
        SimpleAdapter myAdapter = new SimpleAdapter(getApplicationContext(),listitem, R.layout.activity_list_view_demo,
                new String[]{"头像","昵称","说说"},new int[]{R.id.imgtou,R.id.qq_name,R.id.qq_says});
        ListView listView = (ListView) findViewById(R.id.lv_list1);
    }
}
