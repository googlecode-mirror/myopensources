package info.arzen.istore.common;

public class AConfig {
	public static AConfig instance  = null;
	public static String FEED_HOST = "http://www.35cn.info:82/";//"http://192.168.2.9/iStore/feed/";//
	public static String FEED_APP_LIST = AConfig.FEED_HOST+"applications/index.json?pid=%d&cid=%d&page=%d&rows=%d";
	public static String FEED_APP_DETAIL = AConfig.FEED_HOST+"applications/view/%d.json";
	public static String FEED_UPGRADE = AConfig.FEED_HOST+"upgrades/index.json";
	
	private AConfig() {}

	public static AConfig getInstance()
	{
		if (instance == null) {
			instance = new AConfig();
		}
		return instance;
	}
	
	public static String getListUrl(int pid, int cid, int page, int rows) {
		return String.format(AConfig.FEED_APP_LIST, pid, cid, page, rows);
	}

}
