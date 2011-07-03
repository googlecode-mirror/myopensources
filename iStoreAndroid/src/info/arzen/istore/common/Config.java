package info.arzen.istore.common;

public class Config {
	public static Config instance  = null;
	public static String FEED_HOST = "http://192.168.1.102/iStore/feed/";
	public static String FEED_APP_LIST = Config.FEED_HOST+"applications/index.json?pid=1&cid=1&page=1&rows=10";
	
	private Config() {}

	public static Config getInstance()
	{
		if (instance == null) {
			instance = new Config();
		}
		return instance;
	}

}
