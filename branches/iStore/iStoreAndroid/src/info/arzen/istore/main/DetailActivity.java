package info.arzen.istore.main;

import greendroid.app.GDActivity;
import greendroid.widget.AsyncImageView;
import info.arzen.core.ADebug;
import info.arzen.http.AsyncHttpRequestRunner;
import info.arzen.istore.common.AConfig;
import info.arzen.istore.model.DetailListener;

import org.json.JSONException;
import org.json.JSONObject;

import android.os.Bundle;
import android.widget.TextView;

public class DetailActivity extends GDActivity {
	
	private static final String TAG="DetailActivity";
	public static DetailActivity singleton;
    private AsyncImageView imageView;
    private TextView textView;
    private TextView authorView;
    private TextView priceView;
	
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setActionBarContentView(R.layout.detail);
		
        singleton = this;
        
        imageView = (AsyncImageView) findViewById(R.id.async_image);
        textView = (TextView) findViewById(R.id.text);
        
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
		} catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
}
