package info.arzen.istore.common;

public class AConfig {
	public static AConfig instance  = null;
	public static String FEED_HOST = "http://www.35cn.info:82/";
	public static String FEED_APP_LIST = AConfig.FEED_HOST+"applications/index.json?pid=1&cid=4&page=1&rows=10";
	public static String FEED_APP_DETAIL = AConfig.FEED_HOST+"applications/view/%d.json";
	
	private AConfig() {}

	public static AConfig getInstance()
	{
		if (instance == null) {
			instance = new AConfig();
		}
		return instance;
	}

}
