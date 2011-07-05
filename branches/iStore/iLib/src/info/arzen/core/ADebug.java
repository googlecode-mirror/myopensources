package info.arzen.core;

import android.content.Context;
import android.util.Log;
import android.widget.Toast;

public class ADebug {
	public static void d(String tag, String msg) {
		if (AConfig.isDebug()) {
			Log.d(tag, msg);
		}
	}
	
	public static void msg(String message, Context con) {
		Toast.makeText(con, message, Toast.LENGTH_SHORT).show();
	}
}
