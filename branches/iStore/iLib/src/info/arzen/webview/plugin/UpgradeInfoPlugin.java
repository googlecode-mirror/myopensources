package info.arzen.webview.plugin;

import org.json.JSONArray;

import android.content.pm.PackageInfo;
import android.content.pm.PackageManager.NameNotFoundException;
import android.util.Log;

public class UpgradeInfoPlugin extends Plugin {

	private PackageInfo pi;
	
	@Override
	public String execute(String action, JSONArray args, String callbackId) {
		if (pi == null) {
			try {
				pi = ctx.getPackageManager().getPackageInfo(ctx.getPackageName(), 0);
			} catch (NameNotFoundException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
		
		if (action.equals("getVersionName")) {
			return getVersionName();
		} else if(action.equals("getVersionCode")) {
			return getVersionCode();
		}
		
		return null;
	}
	
	public String getVersionName() {
		return pi.versionName;
	}
	
	public String getVersionCode() {
		return String.valueOf(pi.versionCode);
	}

}
