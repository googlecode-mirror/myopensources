package info.arzen.webview.plugin;

import java.util.Iterator;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.app.AlertDialog;
import android.content.DialogInterface;
import android.widget.Toast;


public class NotificationPlugin extends Plugin {
	public String[] callbackJS;
	
	@Override
	public String execute(String action, JSONArray args, String callbackId) {
		if (action.equals("msg")) {
			String str = getArgument(args, 0, "");
			msg(str);
		}else if (action.equals("popupMenu")) {
			popupMenu(args);
		}
		return null;
	}
	
	public void msg(String message) {
		Toast.makeText(ctx.getApplicationContext(), message, Toast.LENGTH_SHORT).show();
	}
	
	public void callJs(String str) {
		ctx.mWebView.loadUrl("javascript:" +str);
	}
	
	public void popupMenu(final JSONArray args) {
		final WebAppActivity ctx = this.ctx;
		
		Runnable runnable = new Runnable() {
			public void run() {
				
				AlertDialog.Builder dlg = new AlertDialog.Builder(ctx);
				String[] items = new String[2];
				callbackJS = new String[2];
				try {
					JSONObject params = (JSONObject) args.opt(0);
				    Iterator iter = params.keys();
				    int i=0;
				    while(iter.hasNext()){
				        String key = (String)iter.next();
				        String value = params.getString(key);
				        items[i] = key;
				        callbackJS[i] = value;
						i++;
				    }
				} catch (JSONException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
//				String[] items = {"Red", "Green", "Blue"}; 
				dlg.setItems(items, new DialogInterface.OnClickListener() {
					
					@Override
					public void onClick(DialogInterface dialog, int which) {
						String js =callbackJS[which];
						callJs(js);
						dialog.dismiss();
						
					}
				});
				dlg.setCancelable(true);

				dlg.create();
				dlg.show();
				
//				String[] items = new String[2];
//				try {
//					JSONObject params = (JSONObject) args.opt(0);
//				    Iterator iter = params.keys();
//				    int i=0;
//				    while(iter.hasNext()){
//				        String key = (String)iter.next();
//				        String value = params.getString(key);
//						items[i] =key;
//						i++;
//				    }
//				} catch (JSONException e1) {
//					// TODO Auto-generated catch block
//					e1.printStackTrace();
//				}
//		
//				new AlertDialog.Builder(ctx.getApplicationContext()).setItems(items, null).create().show();
				
			};
		};
		this.ctx.runOnUiThread(runnable);
		
	}

}
