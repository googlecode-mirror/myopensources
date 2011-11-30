package info.arzen.store.web;

import info.arzen.webview.plugin.Plugin;
import info.arzen.webview.plugin.PluginManager;
import info.arzen.webview.plugin.WebAppActivity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Color;
import android.net.Uri;
import android.os.Bundle;
import android.view.KeyEvent;
import android.view.View;
import android.webkit.DownloadListener;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.widget.TextView;

import com.flurry.android.FlurryAgent;

public class MainActivity extends WebAppActivity {
	
	private String mFlurryKey = "V4MXNV6JS1MF1MCP89WT";
	// Keep app running when pause is received. (default = true)
	// If true, then the JavaScript and native code continue to run in the background
	// when another application (activity) is started.
	protected boolean keepRunning = true;
	

	/** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);
        
        ((TextView)findViewById(R.id.header_title)).setText(R.string.app_name);
        
        navClick();
        
        PluginManager nativeJS = new PluginManager();
        nativeJS.setContext(MainActivity.this);
        
        mWebView = (WebView) findViewById(R.id.middle);
        mWebView.setWebViewClient(new MyWebClient(MainActivity.this) );
        mWebView.setBackgroundColor(Color.parseColor("#333333"));
        mWebView.requestFocus(View.FOCUS_DOWN);
        mWebView.setScrollBarStyle(View.SCROLLBARS_INSIDE_OVERLAY);
        mWebView.addJavascriptInterface(nativeJS, "nativeJS");
		mWebView.setWebChromeClient(new MyWebChromeClient(MainActivity.this));
		mWebView.setDownloadListener(new DownloadListener() {
			
			@Override
			public void onDownloadStart(String url, String userAgent,
					String contentDisposition, String mimetype, long contentLength) {
		            Uri uri = Uri.parse(url);  
		            Intent intent = new Intent(Intent.ACTION_VIEW, uri);  
		            startActivity(intent);  
					
			}
		});
        
        WebSettings setting = mWebView.getSettings();
        setting.setJavaScriptEnabled(true);
        setting.setPluginsEnabled(false);
        setting.setCacheMode(WebSettings.LOAD_CACHE_ELSE_NETWORK);
        
		dialog = new ProgressDialog(this);
		dialog.setMessage(getResources().getString(R.string.loading));
        openPage("index.html");
    }
    
    private void navClick() {
		findViewById(R.id.menu_new).setOnClickListener(new View.OnClickListener() {
			public void onClick(View v) {
				openPage("index.html");
			}
		});
		
		findViewById(R.id.menu_installed).setOnClickListener(new View.OnClickListener() {
			public void onClick(View v) {
				openPage("install.html");
			}
		});
		
		findViewById(R.id.menu_recommand).setOnClickListener(new View.OnClickListener() {
			public void onClick(View v) {
				openPage("recommend.html");
			}
		});
		
		findViewById(R.id.menu_more).setOnClickListener(new View.OnClickListener() {
			public void onClick(View v) {
				openPage("more.html");
			}
		});
		
	}
    
    @Override
    protected void onStart() {
    	super.onStart();
    	FlurryAgent.onStartSession(this, mFlurryKey);
    }
    
    @Override
    protected void onStop() {
    	super.onStop();
    	FlurryAgent.setReportLocation(false);
    	FlurryAgent.onEndSession(this);
    }
    
    @Override
    public boolean onKeyDown(int keyCode, KeyEvent event) {
    	if (event.getAction() == KeyEvent.ACTION_DOWN) {
			if (keyCode == KeyEvent.KEYCODE_BACK) {
				if (mWebView.canGoBack()) {
					mWebView.goBack();
				} else {
			        new AlertDialog.Builder(this)
			        .setIcon(android.R.drawable.ic_dialog_alert)
			        .setTitle(R.string.msg_quit)
			        .setMessage(R.string.msg_really_quit)
			        .setPositiveButton(R.string.msg_yes, new DialogInterface.OnClickListener() {

			            @Override
			            public void onClick(DialogInterface dialog, int which) {

			                //Stop the activity
			            	MainActivity.this.finish();    
			            }

			        })
			        .setNegativeButton(R.string.msg_no, null)
			        .show();


				}
				return true;
			}
		}
    	return super.onKeyDown(keyCode, event);
    }
    
    /**
     * Launch an activity for which you would like a result when it finished. When this activity exits, 
     * your onActivityResult() method will be called.
     *  
     * @param command			The command object
     * @param intent			The intent to start
     * @param requestCode		The request code that is passed to callback to identify the activity
     */

	@Override
    public void startActivityForResult(Plugin command, Intent intent, int requestCode) {
//    	this.activityResultCallback = command;
//    	this.activityResultKeepRunning = this.keepRunning;
    	
    	// If multitasking turned on, then disable it for activities that return results
    	if (command != null) {
    		this.keepRunning = false;
    	}
    	
    	// Start activity
    	super.startActivityForResult(intent, requestCode);
    }

    
    
}