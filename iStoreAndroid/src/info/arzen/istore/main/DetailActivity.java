package info.arzen.istore.main;

import greendroid.app.GDActivity;
import greendroid.widget.AsyncImageView;
import greendroid.widget.PageIndicator;
import greendroid.widget.PagedAdapter;
import greendroid.widget.PagedView;
import greendroid.widget.PagedView.OnPagedViewChangeListener;
import info.arzen.core.ADebug;
import info.arzen.http.AsyncHttpRequestRunner;
import info.arzen.istore.common.AConfig;
import info.arzen.istore.model.DetailListener;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.os.Bundle;
import android.view.View;
import android.view.ViewGroup;
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
    private PagedView pagedView;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setActionBarContentView(R.layout.detail);
		
        singleton = this;
        
        imageView = (AsyncImageView) findViewById(R.id.async_image);
        textView = (TextView) findViewById(R.id.text);
        authorView = (TextView) findViewById(R.id.author);
        contentView = (TextView) findViewById(R.id.content);

        mPageIndicatorOther = (PageIndicator) findViewById(R.id.page_indicator_other);
        pagedView = (PagedView) findViewById(R.id.paged_view);
        pagedView.setOnPageChangeListener(mOnPagedViewChangedListener);
        
        Bundle bundle = this.getIntent().getExtras();
        Long item_id = bundle.getLong("id");
        String url = String.format(AConfig.FEED_APP_DETAIL, item_id);
        (new AsyncHttpRequestRunner()).request(url, null, new DetailListener());
        
	}
	
	public void setData(JSONObject obj) {
		try {
			JSONObject item = obj.getJSONObject("Application");
			String icon = item.getString("icon");
			ADebug.d(TAG, icon);
			imageView.setUrl(icon);
			textView.setText(item.getString("name"));
			authorView.setText(item.getString("author"));
			contentView.setText(item.getString("content"));
			
			JSONArray images = obj.getJSONArray("Image");
			int page_count = images.length();
	        pagedView.setAdapter(new PhotoSwipeAdapter(images));
			
			mPageIndicatorOther.setDotCount(page_count);
			ADebug.d(TAG, String.format("Images:%d", page_count));
			
		} catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
    private void setActivePage(int page) {
        mPageIndicatorOther.setActiveDot(page);
    }
	
    private OnPagedViewChangeListener mOnPagedViewChangedListener = new OnPagedViewChangeListener() {

        @Override
        public void onStopTracking(PagedView pagedView) {
        }

        @Override
        public void onStartTracking(PagedView pagedView) {
        }

        @Override
        public void onPageChanged(PagedView pagedView, int previousPage, int newPage) {
            setActivePage(newPage);
        }
    };
    
    private class PhotoSwipeAdapter extends PagedAdapter {
        
    	public JSONArray mPhotos;
    	
    	public PhotoSwipeAdapter(JSONArray photos) {
    		mPhotos = photos;
		}
    	
        @Override
        public int getCount() {
            return mPhotos.length();
        }

        @Override
        public Object getItem(int position) {
            return null;
        }

        @Override
        public long getItemId(int position) {
            return 0;
        }

        public View getView(int position, View convertView, ViewGroup parent) {
            if (convertView == null) {
                convertView = getLayoutInflater().inflate(R.layout.paged_view_item, parent, false);
            }

            ((TextView) convertView).setText(Integer.toString(position));

            return convertView;
        }

    }
	
	
}
