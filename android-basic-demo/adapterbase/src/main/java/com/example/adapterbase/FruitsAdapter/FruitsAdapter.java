package com.example.adapterbase.FruitsAdapter;
import android.content.Context;
import android.graphics.Color;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.example.adapterbase.R;
import com.example.adapterbase.Fruits.fruits;

import java.util.List;


//自定义水果适配器类
public class FruitsAdapter extends BaseAdapter {
    Context myContext;
    int itemLayout;
    List<fruits> dataFruits;

    public FruitsAdapter(Context myContext,int itemLayout,List<fruits> dataFruits){
        this.myContext = myContext;
        this.itemLayout = itemLayout;
        this.dataFruits = dataFruits;
    }


    @Override
    //此方法返回值决定ListView控件中展示Item的数目
    public int getCount() {
        return dataFruits.size();
    }

    @Override
    //此方法会返还position位置上的数据
    public Object getItem(int position) {

        return dataFruits.get(position);
    }

    @Override
    //此方法会返还position
    public long getItemId(int position) {
        return position;
    }

    @Override
    //此方法会返还position位置上的视图（View）
    public View getView(int position, View convertView, ViewGroup parent) {
        ViewHolder holder = null;
        if(convertView == null){
            convertView = LayoutInflater.from(myContext).inflate(itemLayout,parent,false);
            holder = new ViewHolder();
            holder.fruits_item_image = (ImageView) convertView.findViewById(R.id.fruits_item_image);
            holder.fruits_item_name = (TextView) convertView.findViewById(R.id.fruits_item_name);
            holder.fruits_item_message = (TextView) convertView.findViewById(R.id.fruits_item_message);
            holder.fruits_item_color = (TextView) convertView.findViewById(R.id.fruits_item_color);
            convertView.setTag(holder);   //将Holder存储到convertView中
        }else{
            holder = (ViewHolder) convertView.getTag();
        }
        holder.fruits_item_image.setBackgroundResource(dataFruits.get(position).getImageId());
        holder.fruits_item_name.setText(dataFruits.get(position).getName());
        holder.fruits_item_message.setText(dataFruits.get(position).getMessage());
        holder.fruits_item_color.setText(dataFruits.get(position).getColor());
        return convertView;
    }

    static class ViewHolder{
        ImageView fruits_item_image;
        TextView fruits_item_name;
        TextView fruits_item_message;
        TextView fruits_item_color;
    }

}

