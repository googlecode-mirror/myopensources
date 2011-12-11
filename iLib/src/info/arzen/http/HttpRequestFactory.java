package info.arzen.http;

import info.arzen.core.ADebug;

public class HttpRequestFactory {
	private static final String TAG = "HttpRequestFactory";
	
	public void asyncRequest(String url, IRequestListener listener) {
		ADebug.d(TAG, url);
		(new AsyncHttpRequestRunner()).request(url, null, listener);
	}

}
