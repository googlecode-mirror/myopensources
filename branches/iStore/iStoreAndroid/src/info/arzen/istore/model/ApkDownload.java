package info.arzen.istore.model;

import info.arzen.download.FileDownloadService;

import java.util.HashMap;

import android.app.Notification;

public class ApkDownload extends FileDownloadService {
	
	private HashMap<String, String> mDownList =  new HashMap<String, String>();

	public void addDownload(String download_url, String save_name) {
		mDownList.put(download_url, save_name);
	}
	
	@Override
	protected Class<?> getIntentForLatestInfo() {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	protected int getNotificationFlag() {
		return Notification.FLAG_AUTO_CANCEL | Notification.DEFAULT_LIGHTS;
	}

	@Override
	protected int getNotificationIcon() {
		// TODO Auto-generated method stub
		return 0;
	}

	@Override
	protected HashMap<String, String> getTargetFiles() {
		return mDownList;
	}

	@Override
	protected void onFinishDownload(int successCount,
			HashMap<String, String> failedFiles) {
		// TODO Auto-generated method stub

	}

}
