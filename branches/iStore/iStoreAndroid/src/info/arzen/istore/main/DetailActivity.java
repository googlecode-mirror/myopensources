package info.arzen.istore.main;

import greendroid.app.GDActivity;
import greendroid.widget.AsyncImageView;
import greendroid.widget.PageIndicator;
import info.arzen.core.ADebug;
import info.arzen.http.AsyncHttpRequestRunner;
import info.arzen.istore.adapter.LazyAdapter;
import info.arzen.istore.common.AConfig;
import info.arzen.istore.model.DetailListener;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.content.Intent;
import android.os.Bundle;
import android.os.SystemClock;
import android.view.MotionEvent;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.Gallery;
import android.widget.ImageView;
import android.widget.TextView;

public class DetailActivity extends GDActivity {
	
	private static final String TAG="DetailActivity";
	public static DetailActivity singleton;
    private AsyncImageView imageView;
    private TextView textView;
    private TextView authorView;
    private TextView priceView;
    private TextView contentView;
    private PageIndicator mPageIndicatorOther;
    private Button installBtn;
	private Gallery mPhotos;
	
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setActionBarContentView(R.layout.detail);
		
        singleton = this;
        
        installBtn = (Button) findViewById(R.id.installBtn);
        
        imageView = (AsyncImageView) findViewById(R.id.async_image);
        textView = (TextView) findViewById(R.id.text);
        authorView = (TextView) findViewById(R.id.author);
        contentView = (TextView) findViewById(R.id.content);
        
        mPhotos = (Gallery) findViewById(R.id.photos);
        MotionEvent e1 = MotionEvent.obtain(
        	    SystemClock.uptimeMillis(), 
        	    SystemClock.uptimeMillis(),  
        	    MotionEvent.ACTION_DOWN, 89.333336f, 265.33334f, 0);
    	MotionEvent e2 = MotionEvent.obtain(
        	    SystemClock.uptimeMillis(), 
        	    SystemClock.uptimeMillis(), 
        	    MotionEvent.ACTION_UP, 300.0f, 238.00003f, 0);

    	mPhotos.onFling(e1, e2, 800, 0);

        mPageIndicatorOther = (PageIndicator) findViewById(R.id.page_indicator_other);
        
        Bundle bundle = this.getIntent().getExtras();
        Long item_id = bundle.getLong("id");
        String url = String.format(AConfig.FEED_APP_DETAIL, item_id);
        (new AsyncHttpRequestRunner()).request(url, null, new DetailListener());
        
	}
	
	public void setData(JSONObject obj) {
		try {
			final JSONObject item = obj.getJSONObject("Application");
			String icon = item.getString("icon");
			ADebug.d(TAG, icon);
			imageView.setUrl(icon);
			textView.setText(item.getString("name"));
			authorView.setText(item.getString("author"));
			contentView.setText(item.getString("content"));
			
			JSONArray images = obj.getJSONArray("Image");
			final int page_count = images.length();
			
			mPageIndicatorOther.setDotCount(page_count);
			ADebug.d(TAG, String.format("Images:%d", page_count));
			String[] mStrings=new String[page_count];
			for (int i = 0; i < page_count; i++) {
				mStrings[i] = images.getJSONObject(i).getString("uri");
			}
		    LazyAdapter adapter;
	        adapter=new LazyAdapter(this, mStrings);
			mPhotos.setAdapter(adapter);//new PhotoSwipeAdapter(images)
			if (page_count >= 2) {
				mPhotos.setSelection(2, true);
			}
			
	        mPhotos.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {

				@Override
				public void onItemSelected(AdapterView<?> arg0, View arg1,
						int position, long id) {
					int index = position % page_count;
					setActivePage(index);
					ADebug.d(TAG, String.format("Scroll Image position: %d", index));
					
				}

				@Override
				public void onNothingSelected(AdapterView<?> arg0) {
					
				}
			});
			
	        setActivePage(1);
			//install click
			
			installBtn.setOnClickListener(new Button.OnClickListener() {
				
				@Override
				public void onClick(View v) {
					ApkDownload dl = new ApkDownload();
					String remote_url;
					try {
						remote_url = item.getString("apk_url");
						Intent intent = new Intent(getApplicationContext(), ApkDownload.class);
						intent.putExtra("url", remote_url);
						getApplicationContext().startService(intent);
					} catch (JSONException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
				}
			});
			
		} catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
    private void setActivePage(int page) {
        mPageIndicatorOther.setActiveDot(page);
    }
	
}