package com.example.myapp2.Adapter;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;

import com.example.myapp2.R;
import com.example.myapp2.Goods.goods;

import java.util.List;

public class GoodsAdapter extends ArrayAdapter<goods> {

    private int resourceId;

    public GoodsAdapter(Context context,int resource,List<goods>objects){
        super(context,resource,objects);
        resourceId = resource;
    }

    @NonNull
    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        goods  goods = getItem(position);
        View view;
        ViewHolder viewHolder;
        if(convertView == null) {
            view = LayoutInflater.from(getContext()).inflate(resourceId,parent,false);

            viewHolder = new ViewHolder();

            viewHolder.imageView = (ImageView)view.findViewById(R.id.good_item_image);
            viewHolder.name = (TextView)view.findViewById(R.id.goods_item_name);
            viewHolder.category = (TextView)view.findViewById(R.id.goods_item_category);
            viewHolder.price = (TextView)view.findViewById(R.id.goods_item_price);
            viewHolder.comment = (TextView)view.findViewById(R.id.goods_item_commet);

            view.setTag(viewHolder);  //将viewHolder存储在view中
        }else{
            view = convertView;
            viewHolder = (ViewHolder)view.getTag(); //重新获取viewHolder
        }

        viewHolder.imageView.setImageResource(goods.getImageId());
        viewHolder.name.setText(goods.getName());
        viewHolder.category.setText(goods.getCategory());
        viewHolder.price.setText("¥ "+goods.getPrice());
        viewHolder.comment.setText(String.valueOf(goods.getComment()));
        return view;
    }

    // 存放控件
    class ViewHolder{
        ImageView imageView;
        TextView name;
        TextView category;
        TextView price;
        TextView comment;
    }
}
