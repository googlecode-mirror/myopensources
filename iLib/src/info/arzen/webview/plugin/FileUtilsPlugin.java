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
        try {  
            FileInputStream inputStream = new FileInputStream(file);  
            byte[] b = new byte[inputStream.available()];  
            inputStream.read(b);  
			String content = new String(b);
	        return content;
        } catch (Exception e) {  
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
