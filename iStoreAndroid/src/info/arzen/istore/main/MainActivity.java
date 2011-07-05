package info.arzen.istore.main;

import greendroid.app.GDListActivity;
import info.arzen.core.ADebug;
import info.arzen.http.AsyncHttpRequestRunner;
import info.arzen.istore.adapter.APKListAdapter;
import info.arzen.istore.common.AConfig;
import info.arzen.istore.model.AppsListener;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.view.View;
import android.widget.ListView;

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
        (new AsyncHttpRequestRunner()).request(AConfig.FEED_APP_LIST, null, new AppsListener(adapter));
        setListAdapter(adapter);
       
    }
    
    @Override
    protected void onListItemClick(ListView l, View v, int position, long id) {
    	super.onListItemClick(l, v, position, id);
    	ADebug.msg(String.valueOf(adapter.getItemId(position)), this);
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