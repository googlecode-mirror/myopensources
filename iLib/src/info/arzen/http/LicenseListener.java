package info.arzen.http;

import info.arzen.core.ADebug;
import info.arzen.exception.CommonException;
import info.arzen.webview.plugin.WebAppActivity;

import org.json.JSONException;
import org.json.JSONObject;

import android.app.Activity;

public class LicenseListener extends BaseRequestListener {
	private Activity activity;
	
	public void setActivity(Activity act) {
		activity = act;
	}
	
	@Override
	public void onComplete(String response, Object state) {
		super.onComplete(response, state);
		try {
			JSONObject obj = ParseResoneJson.parseJson(response);
			boolean res =  obj.getBoolean("state");
			if (!res) {
				((WebAppActivity)activity).noLicense();
				
			}
		} catch (NumberFormatException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (CommonException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}
}
