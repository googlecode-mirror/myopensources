package info.arzen.store.plugin;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import org.apache.http.HttpResponse;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONArray;

public class HttpPlugin extends Plugin {


	@Override
	public String execute(String action, JSONArray args, String callbackId) {
		
		if (action.equals("getUrl")) {
			String url = getArgument(args, 0, "");
			return getUrl(url);
		}
		return null;
	}

	public String getUrl(String url)
	/**
	 * get the http entity at a given url
	 */
	{
		String body=null;
		try {
			DefaultHttpClient httpclient = new DefaultHttpClient();
			HttpGet httpget = new HttpGet(url);
			HttpResponse response = httpclient.execute(httpget);
			body = read(response.getEntity().getContent());
		} catch (Exception e) { e.printStackTrace(); return null; }
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
