package info.arzen.istore.main;

import info.arzen.core.ADebug;
import info.arzen.download.FileDownloadService;
import info.arzen.download.FileDownloadService.AsyncDownloadTask;
import info.arzen.files.FileUtils;
import info.arzen.files.SDCardUtils;

import java.util.HashMap;

import android.app.Notification;
import android.content.Intent;
import android.os.Bundle;

public class ApkDownload extends FileDownloadService {
	
	private static final String TAG="ApkDownload";
	private HashMap<String, String> mDownList =  new HashMap<String, String>();
	
	@Override
	public int onStartCommand(Intent intent, int flags, int startId) {
		Bundle extras = intent.getExtras();
		
		String remote_url = "http://download.idreamsky.com:82/StyledHome.apk";//extras.getString("url");
		String sd_folder = "istore";
		SDCardUtils.createFileDirToSDCard(sd_folder);
		String local_url = "/sdcard/"+sd_folder+"/dl_" +System.currentTimeMillis()+".apk";//+FileUtils.getFileFullName(remote_url);
		ADebug.d(TAG, String.format("Download URL:%s, Local URL:%s", remote_url, local_url));
		addDownload(remote_url, local_url);
		
		task = new AsyncDownloadTask();
		task.execute();
		return super.onStartCommand(intent, flags, startId);
	}
	
	private void addDownload(String download_url, String save_name) {
		mDownList.put(download_url, save_name);
	}
	
	@Override
	protected Class<?> getIntentForLatestInfo() {
		return ApkDownload.class;
	}

	@Override
	protected int getNotificationFlag() {
		return Notification.DEFAULT_LIGHTS;
	}

	@Override
	protected int getNotificationIcon() {
		return android.R.drawable.stat_sys_download;
	}

	@Override
	protected HashMap<String, String> getTargetFiles() {
		return mDownList;
	}

	@Override
	protected void onFinishDownload(int successCount,
			HashMap<String, String> failedFiles) {

	}
	
	

}
