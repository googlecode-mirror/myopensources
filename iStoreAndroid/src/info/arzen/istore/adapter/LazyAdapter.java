package info.arzen.istore.adapter;

import info.arzen.files.ImageLoader;
import info.arzen.istore.main.R;
import android.app.Activity;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;

public class LazyAdapter extends BaseAdapter {
    
    private Activity activity;
    private String[] data;
    private static LayoutInflater inflater=null;
    public ImageLoader imageLoader; 
    
    public LazyAdapter(Activity a, String[] d) {
        activity = a;
        data=d;
        inflater = (LayoutInflater)activity.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        imageLoader=new ImageLoader(activity.getApplicationContext());
    }

    public int getCount() {
        return data.length;
    }

    public Object getItem(int position) {
        return position;
    }

    public long getItemId(int position) {
        return position;
    }
    
    public static class ViewHolder{
        public ImageView image;
    }

    public View getView(int position, View convertView, ViewGroup parent) {
        View vi=convertView;
        ViewHolder holder;
        if(convertView==null){
            vi = inflater.inflate(R.layout.gallery_image, null);
            holder=new ViewHolder();
            holder.image=(ImageView)vi.findViewById(R.id.async_photo);
            vi.setTag(holder);
        }
        else
            holder=(ViewHolder)vi.getTag();
        
        holder.image.setTag(data[position]);
        imageLoader.DisplayImage(data[position], activity, holder.image);
        return vi;
    }
}