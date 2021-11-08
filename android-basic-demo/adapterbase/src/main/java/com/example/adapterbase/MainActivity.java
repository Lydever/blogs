package com.example.adapterbase;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;

public class MainActivity extends AppCompatActivity {


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

//        //lv_friends是一个Listview控件，这个控件用于展示数据的
//        lv_friends=findViewById(R.id.lv_friends);
//
//        //datanames是一组数据，就是数据源
//        String[] datanames={"Betty","Tom","Merry","Jack","Lucy","KYY","Alic","Davi","Junly"};
//        int[] datatxs={R.mipmap.ic_launcher,R.mipmap.ic_launcher,R.mipmap.ic_launcher,R.mipmap.ic_launcher,R.mipmap.ic_launcher,R.mipmap.ic_launcher,R.mipmap.ic_launcher,};
//        String[] datasex={"女","男","女","男","女","女","女","男","女"};
//        String[] datacity={"广州","深圳","汕头","佛山","广州","广州","深圳","汕头","佛山"};
//        int[] datayear={2000,1978,2001,1999,2002,2003,1999,2002,2003};
//
//        //listFriends是数据源，是list<User>
//        listFriends=new ArrayList<User>();
//        for(int i=0;i<datanames.length;i++){
//            User onefriend=new User(datanames[i],datasex[i],datacity[i],datayear[i],datatxs[i]);
//            listFriends.add(onefriend);
//        }
//        FriendAdpter myAdapter=new FriendAdpter(this,R.layout.frienditem2,listFriends);
//        lv_friends.setAdapter(myAdapter);
//        //在控件lv_friends设置点击Item的事件监听器
//        lv_friends.setOnItemClickListener(new AdapterView.OnItemClickListener() {
//            @Override
//            public void onItemClick(AdapterView<?> adapterView, final View view, int i, long l) {
//                View myview=view;
//                Toast.makeText(MainActivity.this,"你点击了"+listFriends.get(i).getUserName(),Toast.LENGTH_SHORT).show();
//                AlertDialog dialog=new AlertDialog.Builder(MainActivity.this).create();
//                dialog.setTitle("18软件2班的提示");
//                dialog.setIcon(R.mipmap.ic_launcher_round);
//                dialog.setMessage("你想把"+listFriends.get(i).getUserName()+"设置成关注好友吗？");
//
//                dialog.setButton(DialogInterface.BUTTON_POSITIVE, "确定", new DialogInterface.OnClickListener() {
//                    @Override
//                    public void onClick(DialogInterface dialogInterface, int i) {
//                        TextView tv_name= view.findViewById(R.id.tv_name);
//                        tv_name.setTextColor(Color.BLACK);
//                    }
//                });
//                dialog.show();
//            }
//        });
//
//





    }
}
