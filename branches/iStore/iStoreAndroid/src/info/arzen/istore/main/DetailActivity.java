package info.arzen.istore.main;

import greendroid.app.GDActivity;
import greendroid.widget.AsyncImageView;
import greendroid.widget.PageIndicator;
import info.arzen.core.ADebug;
import info.arzen.http.AsyncHttpRequestRunner;
import info.arzen.istore.common.AConfig;
import info.arzen.istore.model.DetailListener;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.ListView;
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
	private ListView mPhotos;
	
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
        
        mPhotos = (ListView) findViewById(R.id.images);

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
			int page_count = images.length();
			
			mPageIndicatorOther.setDotCount(page_count);
			ADebug.d(TAG, String.format("Images:%d", page_count));
			mPhotos.setAdapter(new PhotoSwipeAdapter(images));
			
			
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
	
    private class PhotoSwipeAdapter extends BaseAdapter {
    	
    	private JSONArray mImages;
        private AsyncImageView mImageView;
    	
    	
    	public PhotoSwipeAdapter(JSONArray images) {
    		mImages = images;
		}

		@Override
		public int getCount() {
			return mImages.length();
		}

		@Override
		public Object getItem(int arg0) {
			return null;
		}

		@Override
		public long getItemId(int arg0) {
			return 0;
		}

		@Override
		public View getView(int position, View convertView, ViewGroup parent) {
			if (mImageView == null) {
	            convertView = getLayoutInflater().inflate(R.layout.list_item, parent, false);
	            mImageView = (AsyncImageView) convertView.findViewById(R.id.async_photo);
				
			}
            try {
				String uri = mImages.getJSONObject(position).getString("uri");
				mImageView.setUrl(uri);
				ADebug.d(TAG, String.format("Image URL: %s", uri));
			} catch (JSONException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
            		
//	    	((AsyncImageView) convertView).set
			return mImageView;
		}
        
    }
}
