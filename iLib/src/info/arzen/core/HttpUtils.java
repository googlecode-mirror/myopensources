package info.arzen.core;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;

import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.conn.scheme.Scheme;
import org.apache.http.conn.scheme.SchemeRegistry;
import org.apache.http.conn.ssl.SSLSocketFactory;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.impl.conn.SingleClientConnManager;
import org.apache.http.params.BasicHttpParams;
import org.apache.http.params.HttpParams;

public class HttpUtils {
	
	public String getUrl(String url)
	/**
	 * get the http entity at a given url
	 */
	{
		String body=null;
		try {
			SchemeRegistry schemeRegistry = new SchemeRegistry();
			schemeRegistry.register(new Scheme("https", 
			            SSLSocketFactory.getSocketFactory(), 443));

			HttpParams params = new BasicHttpParams();

			SingleClientConnManager mgr = new SingleClientConnManager(params, schemeRegistry);

			HttpClient httpclient = new DefaultHttpClient(mgr, params);
			
//			DefaultHttpClient httpclient = new DefaultHttpClient();
			HttpGet httpget = new HttpGet(url);
			HttpResponse response = httpclient.execute(httpget);
			body = read(response.getEntity().getContent());
			
		} catch (Exception e) { e.printStackTrace(); }
		
		
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
