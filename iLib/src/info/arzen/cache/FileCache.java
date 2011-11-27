package info.arzen.cache;

import info.arzen.core.ADebug;
import info.arzen.files.SDCardUtils;
import info.arzen.files.Serializer;

import java.io.BufferedInputStream;
import java.io.BufferedOutputStream;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.Date;

public class FileCache extends AbstractCache {

    private boolean isDiskCacheEnabled;

    protected String diskCacheDirectory;
    protected String diskCacheFolder;
    
	public FileCache(long expire, String folder) {
		super(expire);
		isDiskCacheEnabled = isEnableDiskCache();
		diskCacheFolder = folder;
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
		if (!SDCardUtils.isExists(cache_file)) {
			ADebug.d(TAG, String.format("Not found cache file: %s", cache_file));
			return null;
		}
		//check expire
		File file = new File(cache_file);
    	long lastModified = file.lastModified();
    	Date now = new Date();
    	long ageInMinutes = ((now.getTime() - lastModified) / (1000*60));
    	if ((ageInMinutes >= expirationInMinutes) && expirationInMinutes >0) {
    		ADebug.d(TAG, String.format("DISK cache expiration for file: %s, minutes:%d", cache_file, ageInMinutes));
    		file.delete();
    		return null;
    	}
        long fileSize = file.length();
        BufferedInputStream istream;
		try {
			istream = new BufferedInputStream(new FileInputStream(file));
	        int responseDataLength = (int) fileSize;
	        byte[] responseBody = new byte[responseDataLength];
	        
	        try {
		        istream.read(responseBody, 0, responseDataLength);
				istream.close();
				ADebug.d(TAG, String.format("Get data from cache file: %s", cache_file));
		        return (String) Serializer.unserialize(responseBody);
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
			ostream.write(Serializer.serialize(data));
	        ostream.close();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}


	}

	@Override
	public boolean exists(String file_name) {
		return SDCardUtils.isExists(file_name);
	}
	
    public String getFileNameFromUrl(String url) {
        return Md5Util.md5(url);//getMD5Str(url) url.replaceAll("[.:/,%?&=]", "_").replaceAll("[+]+", "_");
    }
	
}
