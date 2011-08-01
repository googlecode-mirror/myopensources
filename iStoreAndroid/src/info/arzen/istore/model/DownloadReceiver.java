package info.arzen.istore.model;

import java.util.ArrayList;
import java.util.Vector;

import info.arzen.core.ADebug;
import info.arzen.istore.common.AConfig;
import info.arzen.istore.main.MainActivity;
import info.arzen.ui.MsgUI;
import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;

public class DownloadReceiver extends BroadcastReceiver {
	
	private static final String TAG="DownloadReceiver";

	@Override
	public void onReceive(Context context, Intent intent) {
        String action = intent.getAction();
        ADebug.d(TAG, "get receiver");
        if (AConfig.DOWNLOAD_UPGRADE.equals(action)) {
			MsgUI.showMsg("upgrade braodcast");
			Bundle exts = intent.getExtras();
        	ArrayList<String> mDoneList =  exts.getStringArrayList("dones");
    		for (final String local_apk : mDoneList) {
    			ADebug.d(TAG, "install apk is " + local_apk);
    			MainActivity.singleton.stopServiceIntent();
    			MainActivity.singleton.runOnUiThread(new Runnable() {
					
					@Override
					public void run() {
						// TODO Auto-generated method stub
		    			MsgUI.showMsg(local_apk);
		    			MainActivity.singleton.installUpgrade(local_apk);
						
					}
				});

    		}
		} else {
			MsgUI.showMsg("unkonw braodcast");
		}
        
	}

}
