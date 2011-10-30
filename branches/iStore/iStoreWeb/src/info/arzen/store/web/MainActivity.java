package info.arzen.store.web;

import info.arzen.cache.FileCache;
import info.arzen.ilib.web.WebClient;
import android.app.Activity;
import android.graphics.Color;
import android.os.Bundle;
import android.view.View;
import android.webkit.WebSettings;
import android.webkit.WebView;

public class MainActivity extends Activity {
	
	private WebView mWebView;
	
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
        
        WebSettings setting = mWebView.getSettings();
        setting.setJavaScriptEnabled(true);
        setting.setPluginsEnabled(false);
        setting.setCacheMode(WebSettings.LOAD_NO_CACHE);
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
        mWebView.loadUrl("file:///android_asset/" + page);
		
	}
}