package com.example.myapp2;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.DialogInterface;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.Toast;

import com.example.myapp2.Adapter.GoodsAdapter;
import com.example.myapp2.Goods.goods;

import java.util.ArrayList;
import java.util.List;

public class AdapterGoodsActivity extends AppCompatActivity {
    private List<goods> goodsList = new ArrayList<>();
    private GoodsAdapter adapterListView;
    private ListView listView;
    private Context context;
    private AlertDialog alert = null;
    private AlertDialog.Builder builder = null;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_adapter_goods);

        goodsData();
    }

    private void goodsData(){
        int[] imageId={R.mipmap.h1,R.mipmap.i12,R.mipmap.i6,R.mipmap.i67,R.mipmap.iall,R.mipmap.ib,R.mipmap.igreen,R.mipmap.iphone12};
        String[] gnames={"荣耀Play3 麒麟710F八核全网通","iPhone11 全新旗舰国行正品","iPhone12 5G全网预售","iPhone12 Pro","iPhone12 全新旗舰国行正品","iPhone12 Pro","iPhone12 Pro","iPhone12 Pro"};
        String[] categorys={"数码","数码","数码","数码","科技","数码","鞋包","科技"};
        int[] prices={2999,5999,7999,10999,7999,7999,10999,5999};
        String[] comments={"好评率99%","好评率98%","好评率99%","好评率98%","好评率99%","好评率96%","好评率95%","好评率99%"};

        for (int i=0;i<imageId.length;i++){
            goods goods1 = new goods(imageId[i],gnames[i],categorys[i],prices[i],"评价"+comments[i]);
            goodsList.add(goods1);
        }
        adapterListView = new GoodsAdapter(AdapterGoodsActivity.this,R.layout.goods_list,goodsList);
        listView = (ListView)findViewById(R.id.list_view_goods);
        listView.setAdapter(adapterListView);
        // 设置listView点击事件
        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, final View view, int position, long id) {
                final View myview=view;
                goods goods = goodsList.get(position);
                Toast.makeText(AdapterGoodsActivity.this,"你选择了"+goodsList.get(position).getName(),Toast.LENGTH_SHORT).show();
//                AlertDialog.Builder dialog = new AlertDialog.Builder(AdapterGoodsActivity.this);
//                dialog.setTitle("选择你喜欢的颜色");
//                dialog.setIcon(R.mipmap.i12);
//                dialog.setMessage()
//                alert = null;
//                builder = new AlertDialog.Builder(context);
//                alert = builder.setIcon(R.mipmap.ic_launcher)
//                        .setTitle("选择你喜欢的水果,只能选择一个")
//                        .setSingleChoiceItems(goodsColor, 0, new DialogInterface.OnClickListener() {
//                            @Override
//                            public void onClick(DialogInterface dialog, int which) {
//                                Toast.makeText(AdapterGoodsActivity.this,"你选择了"+goodsColor[which], Toast.LENGTH_SHORT).show();
//                            }
//                        }).create();
//                alert.show();*/




                final String[] fcolors = new String[]{"红色","银色","黑色","绿色","蓝色"};
                alert = null;
                builder = new AlertDialog.Builder(AdapterGoodsActivity.this);
                alert = builder.setIcon(R.mipmap.i12)
                        .setTitle("选择你想购买的颜色")
                        .setSingleChoiceItems(fcolors, 0, new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                Toast.makeText(AdapterGoodsActivity.this, "你选择了"+fcolors[which], Toast.LENGTH_SHORT).show();
                            }
                        }).create();

                         alert.setButton(DialogInterface.BUTTON_POSITIVE, "确定", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialogInterface, int position) {
                       // Toast.makeText(AdapterGoodsActivity.this, "你选择了"+fcolors[position], Toast.LENGTH_SHORT).show();
                       // TextView goods_item_name= view.findViewById(R.id.goods_item_name);

                    }
                });
                alert.show();


//                AlertDialog dialog=new AlertDialog.Builder(AdapterGoodsActivity.this).create();
//                dialog.setTitle("请选择你喜欢的颜色");
//                dialog.setIcon(R.mipmap.ic_launcher_round);
//                dialog.setMessage("你想购买"+goodsList.get(position).getName()+"吗？");
//
//                dialog.setButton(DialogInterface.BUTTON_POSITIVE, "确定", new DialogInterface.OnClickListener() {
//                    @Override
//                    public void onClick(DialogInterface dialogInterface, int position) {
//                        TextView goods_item_name= view.findViewById(R.id.goods_item_name);
//                    }
//                });
//                dialog.show();


            }
        });
    }

}
