package info.arzen.http;

import info.arzen.cache.FileCache;
import info.arzen.core.ADebug;

import java.io.BufferedOutputStream;
import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;

import android.os.Bundle;

public class ClientHttpRequest {
	
	private static final String TAG="HttpRequest";
    private static ResponseData cachedData;
    private static boolean cached = true;
    private static String folder = "istore_cache";
   
   /**
     * Generate the multi-part post body providing the parameters and boundary
     * string
     * 
     * @param parameters the parameters need to be posted
     * @param boundary the random string as boundary
     * @return a string of the post body
     */
    public static String encodePostBody(Bundle parameters, String boundary) {
        if (parameters == null) return "";
        StringBuilder sb = new StringBuilder();

        for (String key : parameters.keySet()) {
            if (parameters.getByteArray(key) != null) {
                continue;
            }

            sb.append("Content-Disposition: form-data; name=\"" + key +
                    "\"\r\n\r\n" + parameters.getString(key));
            sb.append("\r\n" + "--" + boundary + "\r\n");
        }

        return sb.toString();
    }
	
    public static String encodeUrl(Bundle parameters) {
        if (parameters == null) {
            return "";
        }

        StringBuilder sb = new StringBuilder();
        boolean first = true;
        for (String key : parameters.keySet()) {
            if (first) first = false; else sb.append("&");
            sb.append(URLEncoder.encode(key) + "=" +
                      URLEncoder.encode(parameters.getString(key)));
        }
        return sb.toString();
    }
	
    /**
     * Connect to an HTTP URL and return the response as a string.
     *
     * Note that the HTTP method override is used on non-GET requests. (i.e.
     * requests are made as "POST" with method specified in the body).
     *
     * @param url - the resource to open: must be a welformed URL
     * @param method - the HTTP method to use ("GET", "POST", etc.)
     * @param params - the query parameter for the URL (e.g. access_token=foo)
     * @return the URL contents as a String
     * @throws MalformedURLException - if the URL format is invalid
     * @throws IOException - if a network problem occurs
     */
    public static String openUrl(String url, String method, Bundle params)
          throws IOException {
        String response = "";
        String cache_key = url;
    	FileCache cache = new FileCache(360, folder);
    	
    	if ( (response = cache.get(cache_key)) !=null) {
			return response;
		}
    	
        // random string as boundary for multi-part http post
        String strBoundary = "3i2ndDfv2rTHiSisAbouNdArYfORhtTPEefj3q2f";
        String endLine = "\r\n";

        OutputStream os;

        if (method.equals("GET")) {
            url = url + "?" + encodeUrl(params);
        }
        ADebug.d(TAG, method + " URL: " + url);
        HttpURLConnection conn =
            (HttpURLConnection) new URL(url).openConnection();
        conn.setRequestProperty("User-Agent", System.getProperties().
                getProperty("http.agent") + " ArzenAndroidSDK");
        if (!method.equals("GET")) {
            Bundle dataparams = new Bundle();
            for (String key : params.keySet()) {
                if (params.getByteArray(key) != null) {
                        dataparams.putByteArray(key, params.getByteArray(key));
                }
            }

            // use method override
            if (!params.containsKey("method")) {
                params.putString("method", method);
            }

           conn.setRequestMethod("POST");
            conn.setRequestProperty(
                    "Content-Type",
                    "multipart/form-data;boundary="+strBoundary);
            conn.setDoOutput(true);
            conn.setDoInput(true);
            conn.setRequestProperty("Connection", "Keep-Alive");
            conn.connect();
            os = new BufferedOutputStream(conn.getOutputStream());

            os.write(("--" + strBoundary +endLine).getBytes());
            os.write((encodePostBody(params, strBoundary)).getBytes());
            os.write((endLine + "--" + strBoundary + endLine).getBytes());

            if (!dataparams.isEmpty()) {

                for (String key: dataparams.keySet()){
                    os.write(("Content-Disposition: form-data; filename=\"" + key + "\"" + endLine).getBytes());
                    os.write(("Content-Type: content/unknown" + endLine + endLine).getBytes());
                    os.write(dataparams.getByteArray(key));
                    os.write((endLine + "--" + strBoundary + endLine).getBytes());

                }
            }
            os.flush();
        }

        try {
            response = read(conn.getInputStream());
        } catch (FileNotFoundException e) {
            // Error Stream contains JSON that we can parse to a FB error
            response = read(conn.getErrorStream());
        }
        cache.set(cache_key, response);
        return response;
    }
    
    private static String read(InputStream in) throws IOException {
        StringBuilder sb = new StringBuilder();
        BufferedReader r = new BufferedReader(new InputStreamReader(in), 1000);
        for (String line = r.readLine(); line != null; line = r.readLine()) {
            sb.append(line);
        }
        in.close();
        return sb.toString();
    }
    
	/**
	 * get file's size at given url (using http header)
	 * 
	 * @param url
	 * @return -1 when failed
	 */
	public static int getFileSizeAtURL(URL url)
	{
		int filesize = -1;
		try
		{
	    	HttpURLConnection http = (HttpURLConnection)url.openConnection();
	    	filesize = http.getContentLength();
	    	http.disconnect();
		}
		catch(Exception e)
		{
			ADebug.d(TAG, e.toString());
		}
    	return filesize;
	}
    

}
