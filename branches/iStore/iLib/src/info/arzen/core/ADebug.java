package info.arzen.core;

import android.util.Log;

public class ADebug {
	public static void d(String tag, String msg) {
		if (AConfig.isDebug()) {
			Log.d(tag, msg);
		}
	}
}
