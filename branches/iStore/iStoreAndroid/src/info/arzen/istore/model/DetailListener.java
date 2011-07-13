package info.arzen.istore.model;

import info.arzen.core.ADebug;
import info.arzen.exception.CommonException;
import info.arzen.http.BaseRequestListener;
import info.arzen.http.ParseResoneJson;
import info.arzen.istore.main.DetailActivity;

import org.json.JSONException;
import org.json.JSONObject;

public class DetailListener extends BaseRequestListener {
	
	private static final String TAG="DetailListener";
	
	@Override
	public void onComplete(String response, Object state) {
		super.onComplete(response, state);
        try {
			try {
//				ADebug.d(TAG, response);
				final JSONObject obj = ParseResoneJson.parseJson(response);
	            // try to cache the result

//	            ADebug.d(TAG, obj.getString("total"));
				DetailActivity.singleton.runOnUiThread(new Runnable() {
					
					@Override
					public void run() {
						DetailActivity.singleton.setData(obj);
						
					}
				});
//	            obj.getJSONArray("row");
			} catch (NumberFormatException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} catch (CommonException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
            
        } catch (JSONException e) {
            ADebug.d("stream", "JSON Error:" + e.getMessage());
        }
	}
}
