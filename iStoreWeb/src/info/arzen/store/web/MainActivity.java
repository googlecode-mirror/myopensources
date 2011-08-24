package info.arzen.store.web;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
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
        mWebView.setWebViewClient(new StoreClient() );
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