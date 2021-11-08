package com.example.myapp2.Adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.example.myapp2.R;
import com.example.myapp2.Goods.Fruits;

import java.util.List;

//自定义适配器类
public class FruitsAdapter extends BaseAdapter {
    Context myContext;
    int itemlayout;
    List<Fruits> datafruits;

    public FruitsAdapter(Context myContext, int itemlayout, List<Fruits> datafruits){
        this.myContext = myContext;
        this.itemlayout = itemlayout;
        this.datafruits = datafruits;
    }

    @Override
    //此方法返回值决定ListView控件中展示Item的数目
    public int getCount() {
        return datafruits.size();
    }

    @Override
    //此方法会返还position位置上的数据
    public Object getItem(int position) {
        return datafruits.get(position);
    }

    @Override
    //此方法会返还position
    public long getItemId(int position) {
        return position;
    }

    @Override
    //此方法会返还position位置上的视图（View）
    public View getView(int position, View view, ViewGroup parent){
        View myView=null;
        if (view!=null){
            myView=view;
        }else{
            myView=LayoutInflater.from(myContext).inflate(itemlayout,null);
            ImageView fruits_item_image;
            fruits_item_image=myView.findViewById(R.id.fruits_item_image);
            TextView fruits_item_name,fruits_item_message,fruits_item_color;
            fruits_item_name=myView.findViewById(R.id.fruits_item_name);
            fruits_item_message=myView.findViewById(R.id.fruits_item_message);
            fruits_item_color=myView.findViewById(R.id.fruits_item_color);
            LinearLayout ll_fruits;
            fruits_item_name=myView.findViewById(R.id.ll_fruits);

            Fruits oneFruits=datafruits.get(position);
            fruits_item_name.setText(oneFruits.getName());
            fruits_item_message.setText(oneFruits.getMessage());
            fruits_item_color.setText(oneFruits.getColor());
            fruits_item_image.setImageResource(oneFruits.getImageId());
        }
        return myView;
    }


}
