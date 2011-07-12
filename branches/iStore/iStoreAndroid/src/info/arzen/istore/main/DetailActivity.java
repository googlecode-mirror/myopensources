package info.arzen.istore.main;

import greendroid.app.GDActivity;

import org.json.JSONObject;

import android.os.Bundle;

public class DetailActivity extends GDActivity {
	
	private JSONObject mDetailJSON;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setActionBarContentView(R.layout.detail);
        Bundle bundle = this.getIntent().getExtras();
        Long item_id = bundle.getLong("id");
	}
	
	public void sateAndroid() {
		
	}
	
}
