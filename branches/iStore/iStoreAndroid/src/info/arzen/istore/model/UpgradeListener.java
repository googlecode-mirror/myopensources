package info.arzen.istore.model;

import org.json.JSONException;
import org.json.JSONObject;

import info.arzen.exception.CommonException;
import info.arzen.http.BaseRequestListener;
import info.arzen.http.ParseResoneJson;
import info.arzen.istore.main.MainActivity;

public class UpgradeListener extends BaseRequestListener {
	
	private static final String TAG="UpgradeListener";
	
	@Override
	public void onComplete(String response, Object state) {
		super.onComplete(response, state);
		
		try {
			final JSONObject obj = ParseResoneJson.parseJson(response);
			
			MainActivity.singleton.runOnUiThread(new Runnable() {
				
				@Override
				public void run() {
					MainActivity.singleton.checkUpgrade(obj);
					
				}
			});
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