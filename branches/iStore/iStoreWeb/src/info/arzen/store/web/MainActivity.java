package info.arzen.store.web;

import info.arzen.cache.FileCache;
import info.arzen.ilib.web.WebClient;
import android.app.Activity;
import android.app.ProgressDialog;
import android.graphics.Color;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.view.View;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebView;

public class MainActivity extends Activity {
	
	private WebView mWebView;
	private ProgressDialog dialog;
	
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

	/** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);
        
        navClick();
        
        mWebView = (WebView) findViewById(R.id.middle);
        mWebView.setWebViewClient(new WebClient() );
        mWebView.setBackgroundColor(Color.parseColor("#333333"));
        mWebView.setScrollBarStyle(View.SCROLLBARS_INSIDE_OVERLAY);
        mWebView.addJavascriptInterface(new FileCache(10, "istoreweb"), "filecache");
		mWebView.setWebChromeClient(new MyWebChromeClient());
        
        WebSettings setting = mWebView.getSettings();
        setting.setJavaScriptEnabled(true);
        setting.setPluginsEnabled(false);
        setting.setCacheMode(WebSettings.LOAD_CACHE_ELSE_NETWORK);
        
		dialog = new ProgressDialog(this);
		dialog.setMessage(getResources().getString(R.string.loading));
        openPage("index.html");
    }
    
    private void navClick() {
		findViewById(R.id.best_app).setOnClickListener(new View.OnClickListener() {
			public void onClick(View v) {
				openPage("index.html");
			}
		});
		
		findViewById(R.id.new_app).setOnClickListener(new View.OnClickListener() {
			public void onClick(View v) {
				openPage("detail.html");
			}
		});
		
	}
    
    private void openPage(String page) {
	   handler.sendEmptyMessage(1);
       mWebView.loadUrl("file:///android_asset/" + page);
		
	}
    
    private class MyWebChromeClient extends WebChromeClient {
    	
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
    }
    
}