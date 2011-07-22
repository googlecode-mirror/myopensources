package info.arzen.cache;

import info.arzen.core.ADebug;
import info.arzen.files.SDCardUtils;

import java.io.BufferedInputStream;
import java.io.BufferedOutputStream;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.Date;

public class FileCache extends AbstractCache {

    private boolean isDiskCacheEnabled;

    protected String diskCacheDirectory;
    
	public FileCache(long expire, String folder) {
		super(expire);
		isDiskCacheEnabled = isEnableDiskCache();
		if (isDiskCacheEnabled) {
			diskCacheDirectory = SDCardUtils.GetPath() + folder + "/" ;
			SDCardUtils.createFileDirToSDCard(folder);
		}
	}
	
	private String getCacheFileName(String key) {
		return diskCacheDirectory + getFileNameFromUrl(key);
	}
	
	public boolean isEnableDiskCache() {
		return SDCardUtils.isSDCardEnable();
	}

	@Override
	public String get(String key) {
		String cache_file = getCacheFileName(key);
		ADebug.d(TAG, String.format("Get cache file: %s", cache_file));
		if (!exists(cache_file)) {
			ADebug.d(TAG, String.format("Not found cache file: %s", cache_file));
			return null;
		}
		//check expire
		File file = new File(cache_file);
    	long lastModified = file.lastModified();
    	Date now = new Date();
    	long ageInMinutes = ((now.getTime() - lastModified) / (1000*60));
    	if (ageInMinutes >= expirationInMinutes) {
    		ADebug.d(TAG, String.format("DISK cache expiration for file: %s", cache_file));
    		file.delete();
    		return null;
    	}
        long fileSize = file.length();
        BufferedInputStream istream;
		try {
			istream = new BufferedInputStream(new FileInputStream(file));
	        int responseDataLength = (int) fileSize - 1;
	        byte[] responseBody = new byte[responseDataLength];
	        
	        try {
		        istream.read(responseBody, 0, responseDataLength);
				istream.close();
				ADebug.d(TAG, String.format("Get data from cache file: %s", cache_file));
		        return new String(responseBody);
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
	        
		} catch (FileNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		ADebug.d(TAG, String.format("Empty cache file: %s", cache_file));
		
		return null;
	}

	@Override
	public void set(String key, String data) {
		String cache_file = getCacheFileName(key);
		ADebug.d(TAG, String.format("Cache File: %s", cache_file));
		File file = new File(cache_file);
		if (!file.exists()) {
			try {
				file.createNewFile();
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}

        try {
            BufferedOutputStream ostream = new BufferedOutputStream(new FileOutputStream(file));
			ostream.write(data.getBytes());
	        ostream.close();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}


	}

	@Override
	public boolean exists(String cache_file) {
		File file = new File(cache_file);
		boolean res = file.exists();
		ADebug.d(TAG, String.format("Check cache File: %s Result:%b ", cache_file, res));
		return res;
	}
	
    public String getFileNameFromUrl(String url) {
        return url.replaceAll("[.:/,%?&=]", "+").replaceAll("[+]+", "+");
    }
	

}
