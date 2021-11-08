package com.example.broadcastreceiver.Receiver;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.util.Log;

public class Myreceiver extends BroadcastReceiver {
    private static final String TAG = "MyReceiver";
    public Myreceiver(){
        Log.i(TAG,"MyReceiver:");
    }

    @Override
    public void onReceive(Context context, Intent intent) {
        Log.d(TAG,"onReceiver: ");
    }
}
