package info.arzen.webview.plugin;

import org.json.JSONArray;

import android.webkit.MimeTypeMap;

public class FileUtilsPlugin extends Plugin {

	@Override
	public String execute(String action, JSONArray args, String callbackId) {
		// TODO Auto-generated method stub
		return null;
	}
	
	
    /**
     * Looks up the mime type of a given file name.
     * 
     * @param filename
     * @return a mime type
     */
	public static String getMimeType(String filename) {
		MimeTypeMap map = MimeTypeMap.getSingleton();
		return map.getMimeTypeFromExtension(map.getFileExtensionFromUrl(filename));
	}

}
