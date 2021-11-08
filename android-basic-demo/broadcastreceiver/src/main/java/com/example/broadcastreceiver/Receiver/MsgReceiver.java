package com.example.broadcastreceiver.Receiver;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.telephony.SmsManager;
import android.telephony.SmsMessage;
import android.widget.Toast;

public class MsgReceiver extends BroadcastReceiver {

    @Override
    public void onReceive(Context context, Intent intent) {
        Toast.makeText(context,"lyx的信息~",Toast.LENGTH_SHORT).show();
        Bundle bundle = intent.getExtras();
        if (bundle!=null){
            Object[] obj = (Object[]) bundle.get("Msg");
            if (obj!=null){
                SmsMessage msg = SmsMessage.createFromPdu((byte[]) obj[0]);
                String send = msg.getOriginatingAddress();
                String msgcontect = msg.getMessageBody();
                Toast.makeText(context,"你收到一条信息"+send+"短信内容内容"+msgcontect,Toast.LENGTH_SHORT).show();
            }
        }
    }
}
