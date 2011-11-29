package info.arzen.webview.plugin;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.Uri;
import android.os.Handler;
import android.os.Message;
import android.webkit.JsResult;
import android.webkit.WebChromeClient;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public abstract class WebAppActivity extends Activity {
	protected WebView mWebView;
	protected ProgressDialog dialog;
	
	private Handler handler = new Handler(){
		@Override
		public void handleMessage(Message msg) {
			super.handleMessage(msg);
			switch (msg.what) {
				case 0:
					dialog.dismiss();
					break;
	
				default:
					dialog.show();
					break;
			}
		}
	};
	
	public class MyWebChromeClient extends WebChromeClient {
        private Context ctx;
        
        public MyWebChromeClient(Context ctx) {
        	this.ctx = ctx;
		}
        
    	@Override
    	public void onProgressChanged(WebView view, int newProgress) {
    		super.onProgressChanged(view, newProgress);
    		if (newProgress == 100) {
    			handler.sendEmptyMessage(0);
			}
    	}
    	
    	@Override
    	public void onReceivedTitle(WebView view, String title) {
    		super.onReceivedTitle(view, title);
//    		setWinTitle(title);
    	}
    	
    	@Override
    	public boolean onJsAlert(WebView view, String url, String message,
    			final JsResult result) {
            AlertDialog.Builder dlg = new AlertDialog.Builder(this.ctx);
            dlg.setMessage(message);
            dlg.setCancelable(false);
            dlg.setPositiveButton(android.R.string.ok,
            	new AlertDialog.OnClickListener() {
                	public void onClick(DialogInterface dialog, int which) {
                		result.confirm();
                	}
            	});
            dlg.create();
            dlg.show();
            return true;
    	}
    	
    	@Override
    	public boolean onJsConfirm(WebView view, String url, String message,
    			final JsResult result) {
            AlertDialog.Builder dlg = new AlertDialog.Builder(this.ctx);
            dlg.setMessage(message);
            dlg.setCancelable(false);
            dlg.setPositiveButton(android.R.string.ok, 
            	new DialogInterface.OnClickListener() {
                	public void onClick(DialogInterface dialog, int which) {
                		result.confirm();
                    }
                });
            dlg.setNegativeButton(android.R.string.cancel, 
            	new DialogInterface.OnClickListener() {
                	public void onClick(DialogInterface dialog, int which) {
                		result.cancel();
                    }
                });
            dlg.create();
            dlg.show();
            return true;
    	}
    	
    	
    }
	
    protected void openPage(String page) {
  	   mWebView.clearHistory();
 	   handler.sendEmptyMessage(1);
        mWebView.loadUrl("file:///android_asset/" + page);
 		
 	}
    
    public class MyWebClient extends WebViewClient{
    	private WebAppActivity ctx;
    	
    	public MyWebClient(WebAppActivity ctx) {
    		this.ctx = ctx;
		}
    	
    	@Override
    	public boolean shouldOverrideUrlLoading(WebView view, String url) {
        	// If dialing phone (tel:5551212)
        	if (url.startsWith(WebView.SCHEME_TEL)) {
        		try {
        			Intent intent = new Intent(Intent.ACTION_DIAL);
        			intent.setData(Uri.parse(url));
        			startActivity(intent);
        		} catch (android.content.ActivityNotFoundException e) {
        			System.out.println("Error dialing "+url+": "+ e.toString());
        		}
        		return true;
        	}
        	
        	// If displaying map (geo:0,0?q=address)
        	else if (url.startsWith("geo:")) {
           		try {
        			Intent intent = new Intent(Intent.ACTION_VIEW);
        			intent.setData(Uri.parse(url));
        			startActivity(intent);
        		} catch (android.content.ActivityNotFoundException e) {
        			System.out.println("Error showing map "+url+": "+ e.toString());
        		}
        		return true;        		
        	}
			
        	// If sending email (mailto:abc@corp.com)
        	else if (url.startsWith(WebView.SCHEME_MAILTO)) {
           		try {
        			Intent intent = new Intent(Intent.ACTION_VIEW);
        			intent.setData(Uri.parse(url));
        			startActivity(intent);
        		} catch (android.content.ActivityNotFoundException e) {
        			System.out.println("Error sending email "+url+": "+ e.toString());
        		}
        		return true;        		
        	}
        	
        	// If sms:5551212?body=This is the message
        	else if (url.startsWith("sms:")) {
        		try {
        			Intent intent = new Intent(Intent.ACTION_VIEW);

        			// Get address
        			String address = null;
        			int parmIndex = url.indexOf('?');
        			if (parmIndex == -1) {
        				address = url.substring(4);
        			}
        			else {
        				address = url.substring(4, parmIndex);

        				// If body, then set sms body
        				Uri uri = Uri.parse(url);
        				String query = uri.getQuery();
        				if (query != null) {
        					if (query.startsWith("body=")) {
        						intent.putExtra("sms_body", query.substring(5));
        					}
        				}
        			}
        			intent.setData(Uri.parse("sms:"+address));
        			intent.putExtra("address", address);
        			intent.setType("vnd.android-dir/mms-sms");
        			startActivity(intent);
        		} catch (android.content.ActivityNotFoundException e) {
        			System.out.println("Error sending sms "+url+":"+ e.toString());
        		}
        		return true;
        	}

        	// All else
        	else {

        		int i = url.lastIndexOf('/');
        		String newBaseUrl = url;
        		if (i > 0) {
        			newBaseUrl = url.substring(0, i);
        		}

        		// If our app or file:, then load into our webview
        		// NOTE: This replaces our app with new URL.  When BACK is pressed,
        		//       our app is reloaded and restarted.  All state is lost.
        		if (url.startsWith("file://")) {
        			this.ctx.mWebView.loadUrl(url);
        		}
  		
        		// If not our application, let default viewer handle
        		else {
        			try {
        				Intent intent = new Intent(Intent.ACTION_VIEW);
        				intent.setData(Uri.parse(url));
        				startActivity(intent);
                	} catch (android.content.ActivityNotFoundException e) {
                		System.out.println("Error loading url "+url+":"+ e.toString());
                	}
        		}
        		return true;
        	}

//    		return super.shouldOverrideUrlLoading(view, url);
    	}
    }

}
