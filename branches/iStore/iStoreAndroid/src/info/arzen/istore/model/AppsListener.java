package info.arzen.istore.model;

import info.arzen.adapter.ABaseAdapter;
import info.arzen.core.ADebug;
import info.arzen.exception.CommonException;
import info.arzen.http.BaseRequestListener;
import info.arzen.http.ParseResoneJson;
import info.arzen.istore.main.MainActivity;

import org.json.JSONException;
import org.json.JSONObject;

import android.os.Message;

public class AppsListener extends BaseRequestListener {
	
	private static final String TAG="AppsListener";
	private ABaseAdapter mAdapter;
	
	public AppsListener(ABaseAdapter adapter) {
		mAdapter = adapter;
	}
	
	@Override
	public void onComplete(String response, Object state) {
		super.onComplete(response, state);
        try {
            JSONObject obj;
			try {
//				ADebug.d(TAG, response);
				obj = ParseResoneJson.parseJson(response);
	            // try to cache the result

	            // render
				mAdapter.setData(obj);
//	            ADebug.d(TAG, obj.getString("total"));
				Message.obtain(MainActivity.singleton.getHandler(), 100).sendToTarget();
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
