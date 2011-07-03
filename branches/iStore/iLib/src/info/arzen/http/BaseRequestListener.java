package info.arzen.http;

import info.arzen.core.ADebug;

import java.io.FileNotFoundException;
import java.io.IOException;

public class BaseRequestListener implements IRequestListener {
	private static final String TAG = "BaseRequestListener";
	
	@Override
	public void onComplete(String response, Object state) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void onFileNotFoundException(FileNotFoundException e, Object state) {
		ADebug.d(TAG, "Resource not found:" + e.getMessage());
	}

	@Override
	public void onIOException(IOException e, Object state) {
		ADebug.d(TAG, "Network Error:" + e.getMessage());
		
	}

}
