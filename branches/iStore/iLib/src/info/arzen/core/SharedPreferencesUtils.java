package info.arzen.core;

import android.content.Context;
import android.content.SharedPreferences;

public class SharedPreferencesUtils  {

	private SharedPreferences sp=null;
	private SharedPreferences.Editor editor;
	private	String mSPName = "storage";
	
	
	public SharedPreferencesUtils(Context ctx) {
		if (sp == null) {
			sp = ctx.getSharedPreferences(mSPName, ctx.MODE_WORLD_READABLE|ctx.MODE_WORLD_WRITEABLE);
			editor = sp.edit();
		}
		
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
