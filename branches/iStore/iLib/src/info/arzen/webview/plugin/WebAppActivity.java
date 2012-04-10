package info.arzen.webview.plugin;

import info.arzen.core.ADebug;
import info.arzen.http.HttpRequestFactory;
import info.arzen.http.LicenseListener;

import java.util.HashMap;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.Uri;
import android.net.http.SslError;
import android.os.Handler;
import android.os.Message;
import android.webkit.GeolocationPermissions;
import android.webkit.JsResult;
import android.webkit.SslErrorHandler;
import android.webkit.WebChromeClient;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public abstract class WebAppActivity extends Activity {
	protected WebView mWebView;
	protected ProgressDialog dialog;
	protected Plugin activityResultCallback = null;
	protected String appid;
	protected String appkey;
	private String invaildLicense = "invaild license!";
	
	private String mCallback = "auth://tauth.qq.com/";
	private String mAuthResult;
	private String mAccessToken;
	private String mExpiresIn;
	public String AUTH_BROADCAST = "com.tencent.auth.BROWSER";
	
	protected boolean runLicenseChecked = false;
	
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
	
	protected void initLicense(String app_id, String app_key) {
		runLicenseChecked = true;
		appid = app_id;
		appkey = app_key;
		
	}
	protected void checkLicense() {
		if ((int)(Math.random()*20) == 1) {
			HttpRequestFactory requestFactory = new HttpRequestFactory();
			LicenseListener listener = new LicenseListener();
			listener.setActivity(WebAppActivity.this);
			String licenseUrl = String.format("%s?app_id=%s&app_key=%s", "http://feed.35cn.info:82/applications/", appid, appkey);
			requestFactory.asyncRequest(licenseUrl, listener);
			
		}
	}
    /**
     * Launch an activity for which you would like a result when it finished. When this activity exits, 
     * your onActivityResult() method will be called.
     *  
     * @param command			The command object
     * @param intent			The intent to start
     * @param requestCode		The request code that is passed to callback to identify the activity
     */
    public void startActivityForResult(Plugin command, Intent intent, int requestCode) {

    	this.activityResultCallback = command;
    	
    	// Start activity
    	super.startActivityForResult(intent, requestCode);
    }
	
	public class MyWebChromeClient extends WebChromeClient {
        private Context ctx;
        
        public MyWebChromeClient(Context ctx) {
        	this.ctx = ctx;
		}
        
        public void onGeolocationPermissionsShowPrompt(String origin, GeolocationPermissions.Callback callback) {
            callback.invoke(origin, true, false);
        }
        
    	@Override
    	public void onProgressChanged(WebView view, int newProgress) {
    		super.onProgressChanged(view, newProgress);
    		if (newProgress == 100) {
    			handler.sendEmptyMessage(0);
    			checkLicense();
    			if (!runLicenseChecked) {
    				noLicense();
    			}
    			
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
	
	public void noLicense() {
		runOnUiThread(new Runnable() {
			
			@Override
			public void run() {
				finish();
			}
		});
		
	}
	
    protected void openPage(String page) {
  	   mWebView.clearHistory();
 	   handler.sendEmptyMessage(1);
       mWebView.loadUrl("file:///android_asset/" + page);
 		
 	}
    
    protected void openUrl(String url) {
   	   	handler.sendEmptyMessage(1);
    	mWebView.loadUrl(url);
	}
	/**
	 * 解析返回结果，提取出Access token
	 * @param	String	url
	 * @author John.Meng<arzen1013@gmail> QQ:3440895
	 * @date 2011-9-1
	 */
	private void parseResult(String url) {
		mAuthResult = url;
		String tmp = url;
		tmp = tmp.replace(mCallback + "?#", "");
		String[] arr = tmp.split("&");
		HashMap<String, String> res = new HashMap<String, String>();
		for (String item : arr) {
			String[] data = item.split("=");
			res.put(data[0], data[1]);
		}
		mAccessToken = res.get("access_token");
		mExpiresIn = res.get("expires_in");
		
	}
	
	private void returnResult() {
//		Intent i = new Intent();  
//		  
//		Bundle b = new Bundle();  
//		b.putString("url", mAuthResult);  
//		i.putExtras(b);  
//		setResult(RESULT_OK, i);
		sendBroadcastResult();
//		finish();
	}
	
	/**
	 * 以广播的形式把返回结果及access token发送，以便调用者接收处理
	 * 
	 * @author John.Meng<arzen1013@gmail> QQ:3440895
	 * @date 2011-9-5
	 */
	private void sendBroadcastResult() {
		Intent intent = new Intent(AUTH_BROADCAST);
		intent.putExtra("raw", mAuthResult);
		intent.putExtra("access_token", mAccessToken);
		intent.putExtra("expires_in", mExpiresIn);
		sendBroadcast(intent);
		
	}
    
    public class MyWebClient extends WebViewClient{
    	private WebAppActivity ctx;
    	
    	public MyWebClient(WebAppActivity ctx) {
    		this.ctx = ctx;
		}
    	
    	@Override
    	public void onReceivedSslError(WebView view, SslErrorHandler handler,
    			SslError error) {
    		handler.proceed();
    		//super.onReceivedSslError(view, handler, error);
    	}
    	
    	@Override
    	public boolean shouldOverrideUrlLoading(WebView view, String url) {
    		
            if (Uri.parse(url).getScheme().equals("auth")) {
                // 拦截回调结果
        	    parseResult(url);
        	    returnResult();
                return false;
            }
    		
        	// If dialing phone (tel:5551212)
            else if (url.startsWith(WebView.SCHEME_TEL)) {
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
        			view.loadUrl(url);
        			return false;
//        			try {
//        				Intent intent = new Intent(Intent.ACTION_VIEW);
//        				intent.setData(Uri.parse(url));
//        				startActivity(intent);
//                	} catch (android.content.ActivityNotFoundException e) {
//                		System.out.println("Error loading url "+url+":"+ e.toString());
//                	}
        		}
        		return true;
        	}

//    		return super.shouldOverrideUrlLoading(view, url);
    	}
    }
    
    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent intent) {
 		ADebug.d("@@@@@@@", "call back at main ");
    	
	   	 Plugin callback = this.activityResultCallback;
	   	 if (callback != null) {
	   		 callback.onActivityResult(requestCode, resultCode, intent);
	   	 }        
    	super.onActivityResult(requestCode, resultCode, intent);
    	
    }
}
