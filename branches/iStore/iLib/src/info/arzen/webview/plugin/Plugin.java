/*
 * PhoneGap is available under *either* the terms of the modified BSD license *or* the
 * MIT License (2008). See http://opensource.org/licenses/alphabetical for full text.
 * 
 * Copyright (c) 2005-2010, Nitobi Software Inc.
 * Copyright (c) 2010, IBM Corporation
 */
package info.arzen.webview.plugin;

import org.json.JSONArray;

import android.content.Context;
import android.content.Intent;
import android.webkit.WebView;

/**
 * Plugin interface must be implemented by any plugin classes.
 *
 * The execute method is called by the PluginManager.
 */
public abstract class Plugin implements IPlugin {

	public Context ctx;
	/**
	 * Sets the context of the Plugin. This can then be used to do things like
	 * get file paths associated with the Activity.
	 * 
	 * @param ctx The context of the main Activity.
	 */
	public void setContext(Context ctx) {
		this.ctx = ctx;
	}

	/**
	 * Identifies if action to be executed returns a value and should be run synchronously.
	 * 
	 * @param action	The action to execute
	 * @return			T=returns value
	 */
	public boolean isSynch(String action) {
		return false;
	}


    /**
     * Called when the system is about to start resuming a previous activity. 
     */
    public void onPause() {
    }

    /**
     * Called when the activity will start interacting with the user. 
     */
    public void onResume() {
    }
    
    /**
     * The final call you receive before your activity is destroyed. 
     */
    public void onDestroy() {
    }
	
    /**
     * Called when an activity you launched exits, giving you the requestCode you started it with,
     * the resultCode it returned, and any additional data from it. 
     * 
     * @param requestCode		The request code originally supplied to startActivityForResult(), 
     * 							allowing you to identify who this result came from.
     * @param resultCode		The integer result code returned by the child activity through its setResult().
     * @param data				An Intent, which can return result data to the caller (various data can be attached to Intent "extras").
     */
    public void onActivityResult(int requestCode, int resultCode, Intent intent) {
    }
    
	/**
	 * Convenience method to read a parameter from the list of JSON args.
	 * @param args			the args passed to the Plugin
	 * @param position		the position to retrieve the arg from
	 * @param defaultString the default to be used if the arg does not exist
	 * @return String with the retrieved value
	 */
	protected String getArgument(JSONArray args, int position, String defaultString) {
		String arg = defaultString;
		if(args.length() >= position) {
			arg = args.optString(position);
			if (arg == null || "null".equals(arg)) {
				arg = defaultString;
			}
		}
		return arg;
	}

}
