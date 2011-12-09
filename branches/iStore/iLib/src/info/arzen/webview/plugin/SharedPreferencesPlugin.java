package info.arzen.webview.plugin;

import org.json.JSONArray;

import android.content.SharedPreferences;

public class SharedPreferencesPlugin extends Plugin {

	private SharedPreferences sp=null;
	private SharedPreferences.Editor editor;
	private	String mSPName = "storage";
	@Override
	public String execute(String action, JSONArray args, String callbackId) {
		if (sp == null) {
			sp = ctx.getSharedPreferences(mSPName, ctx.MODE_WORLD_READABLE|ctx.MODE_WORLD_WRITEABLE);
			editor = sp.edit();
		}
		return null;
	}
	
	public void insert(String key, String value) {
		editor.putString(key, value);
		editor.commit();
	}
	
	public void remove(String key) {
		try {
			editor.remove(key);
			editor.commit();
			
		} catch (Exception e) {
			
		}
		
	}
	
	public String select(String key) {
		String res="";
		try {
			res = sp.getString(key, "");
			
		} catch (Exception e) {
			
		}
		return res;
	}
	
	public void clear() {
		editor.clear();
		editor.commit();
	}

}
