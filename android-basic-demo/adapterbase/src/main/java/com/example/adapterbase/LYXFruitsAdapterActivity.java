package com.example.adapterbase;

import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.graphics.Color;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.example.adapterbase.FruitsAdapter.FruitsAdapter;
import com.example.adapterbase.Fruits.fruits;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
public class LYXFruitsAdapterActivity extends AppCompatActivity {
ListView list_view_fruits;
ArrayList<fruits> fruitsList;
private Context myContext;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lyxfruits_adapter);
        list_view_fruits = findViewById(R.id.list_view_fruits);
        //数据源
       final String[] fruitsNames = {"苹果","桃子","西瓜","葡萄","菠萝","柿子"};
       Integer[] fruitsImgs={R.mipmap.ic_launcher_round,R.mipmap.ic_launcher_round,R.mipmap.ic_launcher_round,};
       String[] fruitsMessages={"苹果，是水果中的一种，是蔷薇科苹果亚科苹果属植物，其树为落叶乔木。苹果营养价值很高，富含矿物质和维生素，含钙量丰富，有助于代谢掉体内多余盐分，苹果酸可代谢热量，防止下半身肥胖。苹果是人们经常食用的水果之一。",
       "苹果，是水果中的一种，是蔷薇科苹果亚科苹果属植物，其树为落叶乔木。苹果营养价值很高，富含矿物质和维生素，含钙量丰富，有助于代谢掉体内多余盐分，苹果酸可代谢热量，防止下半身肥胖。苹果是人们经常食用的水果之一。",
       "苹果，是水果中的一种，是蔷薇科苹果亚科苹果属植物，其树为落叶乔木。苹果营养价值很高，富含矿物质和维生素，含钙量丰富，有助于代谢掉体内多余盐分，苹果酸可代谢热量，防止下半身肥胖。苹果是人们经常食用的水果之一。",
       "苹果，是水果中的一种，是蔷薇科苹果亚科苹果属植物，其树为落叶乔木。苹果营养价值很高，富含矿物质和维生素，含钙量丰富，有助于代谢掉体内多余盐分，苹果酸可代谢热量，防止下半身肥胖。苹果是人们经常食用的水果之一。",
       "苹果，是水果中的一种，是蔷薇科苹果亚科苹果属植物，其树为落叶乔木。苹果营养价值很高，富含矿物质和维生素，含钙量丰富，有助于代谢掉体内多余盐分，苹果酸可代谢热量，防止下半身肥胖。苹果是人们经常食用的水果之一。",
       "苹果，是水果中的一种，是蔷薇科苹果亚科苹果属植物，其树为落叶乔木。苹果营养价值很高，富含矿物质和维生素，含钙量丰富，有助于代谢掉体内多余盐分，苹果酸可代谢热量，防止下半身肥胖。苹果是人们经常食用的水果之一。"};
       int[] fruitsColor={0,0,0,0,0,0};

        final ArrayList fruits=new ArrayList<fruits>();
        for (int i=0;i<fruitsNames.length;i++){
            fruits one=new fruits(fruitsImgs[i],fruitsNames[i],fruitsMessages[i],fruitsColor[i]);
            fruits.add(one);
        }
        FruitsAdapter fruitsAdapter=new FruitsAdapter(this,R.layout.fruits_list,fruits);
        list_view_fruits.setAdapter(fruitsAdapter);

        list_view_fruits.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            String fcolors[]={"默认","红色","绿色","紫色","黄色"};
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
//                final View fview=view;
//                AlertDialog.Builder alertDialog=new AlertDialog.Builder(myContext);
//                alertDialog.setTitle("你喜欢吃什么颜色的"+fruits.get(position));
//                alertDialog.setSingleChoiceItems(fcolors,0, new DialogInterface.OnClickListener() {
//                    @Override
//                    public void onClick(DialogInterface dialog, int which) {
//                        Toast.makeText(getApplicationContext(), "你选择了"+fruitsNames[which], Toast.LENGTH_SHORT).show();
//                    }
//                }).create();
            }
        });
    }
}
