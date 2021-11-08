package com.example.myapp2;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.DialogInterface;
import android.graphics.Color;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.Toast;
import android.os.Bundle;

import com.example.myapp2.R;
import com.example.myapp2.Goods.Fruits;
import com.example.myapp2.Adapter.FruitsAdapter;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
public class FruitsAdapterActivity extends AppCompatActivity {
    private AlertDialog alert = null;
    private AlertDialog.Builder builder = null;
ListView list_view_fruits;
    ArrayList<Fruits> fruits=null;
    @Override
    protected void onCreate(Bundle savedInstanceState) {

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
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_fruits_adapter);

        fruits=new ArrayList<Fruits>();
        for (int i=0;i<fruitsNames.length;i++){
            Fruits one=new Fruits(fruitsImgs[i],fruitsNames[i],fruitsMessages[i],fruitsColor[i]);
            fruits.add(one);
        }

        list_view_fruits=findViewById(R.id.list_view_fruits);
        FruitsAdapter fruitsAdapter=new FruitsAdapter(this,R.layout.fruits_list,fruits);
        list_view_fruits.setAdapter(fruitsAdapter);

        list_view_fruits.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, final long id) {
                final View myview=view;


                final String[] fcolors = new String[]{"红色","银色","黑色","绿色","蓝色"};
                alert = null;
                builder = new AlertDialog.Builder(FruitsAdapterActivity.this);
                alert = builder.setIcon(R.mipmap.ic_launcher)
                        .setTitle("选择你喜欢的颜色")
                        .setSingleChoiceItems(fcolors, 0, new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                Toast.makeText(FruitsAdapterActivity.this, "你选择了"+fcolors[which], Toast.LENGTH_SHORT).show();
                            }
                        }).create();

                alert.setButton(DialogInterface.BUTTON_POSITIVE, "确定", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialogInterface, int position) {

                    }
                });
                alert.show();
            }
        });
    }
}
