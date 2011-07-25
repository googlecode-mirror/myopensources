package info.arzen.istore.common;

import info.arzen.istore.main.R;
import android.content.Context;


public class FeedHost {
	public static FeedHost instance = new FeedHost();
	public static Context mContext;
	
	private FeedHost() {}
	
	public static FeedHost getInstance() {
		return instance;
	}
	
	public static void setContent(Context context) {
		mContext = context;
	}
	
	public static Context getContext() {
		return mContext;
	}
	
	public static String getHost() {
		return getStringByRID(R.string.feed_host);
	}
	
	public static String getListUrl() {
		return getHost() + getStringByRID(R.string.feed_apk_list);
	}
	
	public static String getListUrl(int pid, int cid, int page, int rows) {
		return String.format(getListUrl() + "pid=%d&cid=%d&page=%d&rows=%d", pid, cid, page, rows);
	}
	
	public static String getDetailUrl(int id) {
		return String.format(getHost() + getStringByRID(R.string.feed_apk_detail), id);
	}
	
	private static String getStringByRID(int rid) {
		return mContext.getResources().getString(rid);
	}
}
