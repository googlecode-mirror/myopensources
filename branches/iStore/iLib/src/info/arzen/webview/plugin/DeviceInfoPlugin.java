package info.arzen.webview.plugin;

import org.json.JSONArray;

import android.content.Context;
import android.telephony.TelephonyManager;

public class DeviceInfoPlugin extends Plugin {

	private TelephonyManager tm;
	@Override
	public String execute(String action, JSONArray args, String callbackId) {
		if (tm == null) {
			tm = (TelephonyManager) ctx.getSystemService(Context.TELEPHONY_SERVICE);
		}
		if (action.equals("getTel")) {
			return getTel();
		}else if (action.equals("getImie")) {
			return getImie();
		}
		return null;
	}
	
	public String getTel() {
		String tel = tm.getLine1Number();
		return tel;
	}
	
	public String getImie() {
		return tm.getSimSerialNumber();
	}

}
