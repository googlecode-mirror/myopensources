package info.arzen.istore.main;

import info.arzen.core.ADebug;
import android.os.Bundle;
import greendroid.app.GDActivity;

public class DetailActivity extends GDActivity {
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setActionBarContentView(R.layout.detail);
        Bundle bundle = this.getIntent().getExtras();
        Long item_id = bundle.getLong("id");
	}
}
