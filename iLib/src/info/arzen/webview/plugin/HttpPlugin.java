package info.arzen.webview.plugin;

import info.arzen.cache.FileCache;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.UnsupportedEncodingException;
import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class HttpPlugin extends Plugin {

    private static String folder = ".istore_cache";
	private FileCache cache;
	
	@Override
	public String execute(String action, JSONArray args, String callbackId) {
		
		if (cache == null) {
			cache = new FileCache(0, folder);
		}
		
		if (action.equals("getUrl")) {
			String url = getArgument(args, 0, "");
			return getUrl(url);
		}else if (action.equals("postUrl")) {
			return postUrl(args);
		}
		return null;
	}

	public String getUrl(String url)
	/**
	 * get the http entity at a given url
	 */
	{
		String body=null;
		String cache_key = url;
		try {
			DefaultHttpClient httpclient = new DefaultHttpClient();
			HttpGet httpget = new HttpGet(url);
			HttpResponse response = httpclient.execute(httpget);
			body = read(response.getEntity().getContent());
	        if (body != null) {
	            cache.set(cache_key, body);
			}
			
		} catch (Exception e) { e.printStackTrace(); }
		
        if (body == null) {
        	body = cache.get(cache_key);
		}
		
		return body;
	}
	
	public String postUrl(JSONArray args) {
		
		String body=null;

		try {
			String url = getArgument(args, 0, "");
			List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
			try {
				JSONObject params = (JSONObject) args.opt(1);
			    Iterator iter = params.keys();
			    while(iter.hasNext()){
			        String key = (String)iter.next();
			        String value = params.getString(key);
					nameValuePairs.add(new BasicNameValuePair(key, value));
			    }
			} catch (JSONException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}

			HttpClient httpclient = new DefaultHttpClient();
			HttpPost httppost = new HttpPost(url);
			httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));
			try {
				HttpResponse response = httpclient.execute(httppost);
				body = read(response.getEntity().getContent());

			} catch (ClientProtocolException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}

		} catch (UnsupportedEncodingException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return body;
		
	}
	
    
    private String read(InputStream in) throws IOException {
        StringBuilder sb = new StringBuilder();
        BufferedReader r = new BufferedReader(new InputStreamReader(in), 1000);
        for (String line = r.readLine(); line != null; line = r.readLine()) {
            sb.append(line);
        }
        in.close();
        return sb.toString();
    }
	
}
