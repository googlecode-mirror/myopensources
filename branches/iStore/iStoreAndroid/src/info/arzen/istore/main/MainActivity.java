package info.arzen.istore.main;

import greendroid.app.GDListActivity;
import info.arzen.http.AsyncHttpRequestRunner;
import info.arzen.istore.adapter.APKListAdapter;
import info.arzen.istore.common.Config;
import info.arzen.istore.model.AppsListener;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;

public class MainActivity extends GDListActivity {
	
	private static final String TAG = "MainActivity";
	public static MainActivity singleton;
	private APKListAdapter adapter;
	
   /** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        singleton = this;
        
        adapter = new APKListAdapter(this);
        (new AsyncHttpRequestRunner()).request(Config.FEED_APP_LIST, null, new AppsListener(adapter));
        setListAdapter(adapter);
       
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
					
				}
				
		}

	};
	public Handler getHandler() {
		return mHandler;
	}
    
}