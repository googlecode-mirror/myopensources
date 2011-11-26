package info.arzen.store.web;

import info.arzen.store.plugin.PluginManager;
import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Color;
import android.net.Uri;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.view.KeyEvent;
import android.view.View;
import android.webkit.DownloadListener;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.widget.TextView;

import com.flurry.android.FlurryAgent;

public class MainActivity extends Activity {
	
	private WebView mWebView;
	private ProgressDialog dialog;
	private String mFlurryKey = "V4MXNV6JS1MF1MCP89WT";
	
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
        
        ((TextView)findViewById(R.id.header_title)).setText(R.string.app_name);
        
        navClick();
        
        PluginManager nativeJS = new PluginManager();
        nativeJS.setContext(getApplicationContext());
        
        mWebView = (WebView) findViewById(R.id.middle);
//        mWebView.setWebViewClient(new WebClient() );
        mWebView.setBackgroundColor(Color.parseColor("#333333"));
        mWebView.setScrollBarStyle(View.SCROLLBARS_INSIDE_OVERLAY);
        mWebView.addJavascriptInterface(nativeJS, "nativeJS");
		mWebView.setWebChromeClient(new MyWebChromeClient());
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
    
    private void openPage(String page) {
 	   mWebView.clearHistory();
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