package info.arzen.common;

import android.content.Context;

public class CommonUtils {
	private static CommonUtils instance = new CommonUtils();
	private static Context mContext;
	
	private CommonUtils() {}
	
	public static CommonUtils getInstance() {
		return instance;
	}
	
	public static void setContext(Context con) {
		mContext = con;
	}
	
	public static Context getContext() {
		return mContext;
	}
}
