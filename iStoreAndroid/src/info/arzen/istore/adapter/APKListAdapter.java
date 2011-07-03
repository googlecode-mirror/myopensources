package info.arzen.istore.adapter;

import greendroid.image.ImageProcessor;
import greendroid.widget.AsyncImageView;
import info.arzen.adapter.ABaseAdapter;
import info.arzen.istore.main.R;

import org.json.JSONException;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

public class APKListAdapter extends ABaseAdapter {

    private LayoutInflater mInflater;
    private ImageProcessor mImageProcessor;
    
    static class ViewHolder {
        public AsyncImageView imageView;
        public TextView textView;
        public StringBuilder textBuilder = new StringBuilder();
    }

	public APKListAdapter(Context context) {
		super(context);
		mInflater = LayoutInflater.from(context);
	}
	
	@Override
	public View getView(int position, View convertView, ViewGroup parent) {
		
        ViewHolder holder;

        if (convertView == null) {
            convertView = mInflater.inflate(R.layout.image_item_view, parent, false);
            holder = new ViewHolder();
            holder.imageView = (AsyncImageView) convertView.findViewById(R.id.async_image);
            holder.imageView.setImageProcessor(mImageProcessor);
            holder.textView = (TextView) convertView.findViewById(R.id.text);
            convertView.setTag(holder);
        } else {
            holder = (ViewHolder) convertView.getTag();
        }
        try {
			holder.imageView.setUrl(mData.getJSONObject(position).getString("icon"));
			holder.textView.setText(mData.getJSONObject(position).getString("name"));
		} catch (JSONException e1) {
			e1.printStackTrace();
		}
        
		return convertView;
	}
}
