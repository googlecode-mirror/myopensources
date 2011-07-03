package info.arzen.core;

public class AConfig {
	private static boolean isDEBUG = true;
	public static AConfig instance = new AConfig();
	
	private AConfig() {}
	
	public static AConfig getInstance() {
		if (AConfig.instance == null) {
			AConfig.instance = new AConfig();
		}
		return AConfig.instance;
	}
	
	public static void setDebug(boolean isDebug) {
		AConfig.isDEBUG = isDebug;
	}
	
	public static boolean isDebug() {
		return AConfig.isDEBUG;
	}

}
