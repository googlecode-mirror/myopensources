package info.arzen.adapter;

import info.arzen.core.ADebug;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.content.Context;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

public abstract class ABaseAdapter extends BaseAdapter {

	private static final String TAG="ABaseAdapter";
	protected Context mContext;
	protected JSONObject mJObject = null;
	protected JSONArray mData = null;
	
    public ABaseAdapter(Context context) {
		mContext = context;
	}
	
	public void setData(JSONObject obj) {
		mJObject = obj;
		try {
			mData = mJObject.getJSONArray("rows");
		} catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
	@Override
	public int getCount() {
		if (mData != null) {
			return mData.length();
		} 
		return 0;
	}

	@Override
	public Object getItem(int position) {
		try {
			if (mJObject != null) {
				return mData.get(position);
			} else {
				return null;
			}
			
		} catch (JSONException e) {
			e.printStackTrace();
			return null;
		}
	}

	@Override
	public long getItemId(int position) {
		try {
			if (mData != null) {
				return mData.getJSONObject(position).getLong("id");
			}else{
				return 0;
			}
			
		} catch (JSONException e) {
			e.printStackTrace();
			return 0;
		}
	}

	@Override
	public abstract View getView(int position, View convertView, ViewGroup parent);

}
