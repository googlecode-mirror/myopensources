package info.arzen.istore.main;

import greendroid.app.GDListActivity;
import info.arzen.common.CommonUtils;
import info.arzen.core.ADebug;
import info.arzen.files.ApkUtils;
import info.arzen.http.AsyncHttpRequestRunner;
import info.arzen.istore.adapter.APKListAdapter;
import info.arzen.istore.common.AConfig;
import info.arzen.istore.model.AppsListener;
import info.arzen.istore.model.DownloadReceiver;
import info.arzen.istore.model.UpgradeListener;
import info.arzen.ui.MsgUI;
import info.arzen.upgrade.UpgradeUtils;

import org.json.JSONException;
import org.json.JSONObject;

import android.content.DialogInterface;
import android.content.DialogInterface.OnClickListener;
import android.content.Intent;
import android.content.IntentFilter;
import android.content.pm.PackageInfo;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.view.Gravity;
import android.view.View;
import android.widget.AbsListView;
import android.widget.LinearLayout;
import android.widget.LinearLayout.LayoutParams;
import android.widget.ListView;
import android.widget.ProgressBar;
import android.widget.TextView;

public class MainActivity extends GDListActivity {
	
	private static final String TAG = "MainActivity";
	public static MainActivity singleton;
	private APKListAdapter adapter;
	private int pid=1, cid=4, page=1, rows=5; 
	private ListView mListView;
	private AppsListener listener;
	private AsyncHttpRequestRunner mRequestRunner;
	private View loadingView;
	private DownloadReceiver down_receiver;
	
   /** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        singleton = this;
        
        CommonUtils.setContext(getApplicationContext());
        CommonUtils.setActivity(this);
        
        adapter = new APKListAdapter(this);
        
        
        loadingView = loading();
        
        mListView = getListView();
        mListView.addFooterView(loadingView);
        
        listener  = new AppsListener(adapter);
        mRequestRunner = new AsyncHttpRequestRunner();
        
        //check upgrade
        mRequestRunner.request(AConfig.FEED_UPGRADE, null, new UpgradeListener());
        
        
        mRequestRunner.request(AConfig.getListUrl(pid, cid, page, rows), null, listener);
        setListAdapter(adapter);
        
        mListView.setOnScrollListener(new AbsListView.OnScrollListener() {
			
			@Override
			public void onScrollStateChanged(AbsListView view, int scrollState) {
				
			}
			
			@Override
			public void onScroll(AbsListView view, int firstVisibleItem,  
                    int visibleItemCount, int totalItemCount) {
				int lastItem = firstVisibleItem + visibleItemCount - 1;
				ADebug.d(TAG, String.format("List view scroll to: %d", lastItem));
				
				if (adapter.getCount() < adapter.getTotal()) {
					
					adapter.setTotal(adapter.getCount() + rows);
					if (firstVisibleItem + visibleItemCount == visibleItemCount) {
						page +=1; 
						adapter.notifyDataSetChanged();
						mListView.setSelection(lastItem);
						mRequestRunner.request(AConfig.getListUrl(pid, cid, page, rows), null, listener);
					}
					
				} else {
					mListView.removeFooterView(loadingView);
				}
			}
		});
        
        registerIntentReceivers();
    }
    
   
    @Override
    protected void onListItemClick(ListView l, View v, int position, long id) {
    	super.onListItemClick(l, v, position, id);
    	Long item_id = adapter.getItemId(position);
		Intent intent = new Intent();
		intent.setClass(MainActivity.this, DetailActivity.class);
    	Bundle bundle = new Bundle();
    	bundle.putLong("id", item_id);
    	intent.putExtras(bundle);
		startActivity(intent);
//		MainActivity.this.finish();
    }
    
    private void refreshList() {
    	adapter.notifyDataSetChanged();
    	getListView().invalidate();
	}

	private Handler mHandler = new Handler() {
		@Override
		public void handleMessage(Message message) {
				switch (message.what) {
					
					case 100:
						refreshList();
						break;
					case 200:
						refreshList();
						break;
					
				}
				
		}

	};
	
	public void installUpgrade(String path) {
		ADebug.d(TAG, "install apk in main " + path);
		ADebug.msg(path, getApplicationContext());
		ApkUtils.installOrUpdateApk(getApplicationContext(), path);
	}
	
	public Handler getHandler() {
		return mHandler;
	}
	
	private View loading() {
		LinearLayout loadingLayout;
		LayoutParams FFlayoutParams = new LinearLayout.LayoutParams(  
		        LinearLayout.LayoutParams.FILL_PARENT,  
		        LinearLayout.LayoutParams.FILL_PARENT);  
		LayoutParams mLayoutParams = new LinearLayout.LayoutParams(  
		        LinearLayout.LayoutParams.WRAP_CONTENT,  
		        LinearLayout.LayoutParams.WRAP_CONTENT);  
		// 线性布局  
		LinearLayout layout = new LinearLayout(this);  
		// 设置布局 水平方向  
		layout.setOrientation(LinearLayout.HORIZONTAL);  
		// 进度条  
		ProgressBar progressBar = new ProgressBar(this);  
		// 进度条显示位置  
		progressBar.setPadding(0, 0, 15, 0);  
		// 把进度条加入到layout中  
		layout.addView(progressBar, mLayoutParams);  
		// 文本内容  
		TextView textView = new TextView(this);  
		textView.setText("加载中...");  
		textView.setGravity(Gravity.CENTER_VERTICAL);  
		// 把文本加入到layout中  
		layout.addView(textView, FFlayoutParams);  
		// 设置layout的重力方向，即对齐方式是  
		layout.setGravity(Gravity.CENTER);  
		// 设置ListView的页脚layout  
		loadingLayout = new LinearLayout(this);  
		loadingLayout.addView(layout, mLayoutParams);  
		loadingLayout.setGravity(Gravity.CENTER);
		return loadingLayout;
	}
	
	public void checkUpgrade(JSONObject obj) {
		try {
			String appName = obj.getString("appName");
			String versionName = obj.getString("versionName");
			final String appPath = obj.getString("appPath");
			int versionCode = obj.getInt("versionCode");
			int force = 0;//obj.getInt("force");
			PackageInfo pinfo = UpgradeUtils.getVerInfo();
			
			if (versionCode > pinfo.versionCode) {
				DialogInterface.OnClickListener cancel_listener = null, ok_listener=null;
				
				ok_listener = new OnClickListener() {
					
					@Override
					public void onClick(DialogInterface dialog, int which) {
						Intent intent = new Intent(getApplicationContext(), ApkDownload.class);
						intent.putExtra("url", appPath);
						startService(intent);
//						CommonUtils.quitApplication();
						
					}
				};
				
				if (force == 1) {
					cancel_listener = new OnClickListener() {
						
						@Override
						public void onClick(DialogInterface dialog, int which) {
							CommonUtils.quitApplication();
						}
					};
				} 
				
				String ver_msg = String.format("%s Found new version:%s current Version %s", appName, versionName, pinfo.versionName);
				MsgUI.showDailog("Update", ver_msg, ok_listener, cancel_listener, "OK", "Cancel");
				
			}
			
		} catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
	public void stopServiceIntent() {
		Intent intent = new Intent(getApplicationContext(), ApkDownload.class);
		stopService(intent);

	}

	private void registerIntentReceivers() {
		down_receiver =  new DownloadReceiver();
        IntentFilter downlaodFilter = new IntentFilter();
        downlaodFilter.addAction(AConfig.DOWNLOAD_UPGRADE);
		registerReceiver(down_receiver, downlaodFilter);
	}
	
	private void unregisterIntentReceivers() {
		unregisterReceiver(down_receiver);
		Intent intent = new Intent(getApplicationContext(), ApkDownload.class);
		stopService(intent);
	}
	
	@Override
	protected void onDestroy() {
		super.onDestroy();
		unregisterIntentReceivers();
	}
}