package info.arzen.istore.model;

import java.util.ArrayList;
import java.util.Vector;

import info.arzen.core.ADebug;
import info.arzen.istore.common.AConfig;
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
    		for (String local_apk : mDoneList) {
    			ADebug.d(TAG, "install apk " + local_apk);
//    			MsgUI.showMsg(local_apk);

    		}
		} else {
			MsgUI.showMsg("unkonw braodcast");
		}
        
	}

}
