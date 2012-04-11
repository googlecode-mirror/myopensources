package info.arzen.webview.plugin;

import java.io.BufferedInputStream;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;

import info.arzen.core.ADebug;
import info.arzen.files.SDCardUtils;

import org.json.JSONArray;

import android.webkit.MimeTypeMap;

public class FileUtilsPlugin extends Plugin {

	@Override
	public String execute(String action, JSONArray args, String callbackId) {
		if (action.equals("getQinfo")) {
			return getQinfo();
		}
		return null;
	}
	
	private String getQinfo() {
		String file_path = SDCardUtils.GetPath()+ ".qinfo/qdata";
		if (!SDCardUtils.isExists(file_path)) {
			return null;
		}
		File file = new File(file_path);
        long fileSize = file.length();
        BufferedInputStream istream;
		try {
			istream = new BufferedInputStream(new FileInputStream(file));
	        int responseDataLength = (int) fileSize;
	        byte[] responseBody = new byte[responseDataLength];
	        
	        try {
		        istream.read(responseBody, 0, responseDataLength);
				istream.close();
				String content = responseBody.toString();
				ADebug.d("ccccc", content);
		        return content;
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
	        
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		}
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
