package info.arzen.webview.plugin;

import org.json.JSONArray;

public class AppPlugin extends Plugin {

	@Override
	public String execute(String action, JSONArray args, String callbackId) {
    	if (action.equals("exitApp")) {
        	this.exitApp();
        }

		return null;
	}
	
	public void exitApp() {
		((WebAppActivity)this.ctx).finish();
	}
}
