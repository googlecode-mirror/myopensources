package info.arzen.files;

import info.arzen.core.ADebug;

import java.io.File;

import android.os.Environment;

public class SDCardUtils {
	private static final String TAG="SDCardUtils";
	private static android.os.StatFs statfs = new android.os.StatFs(
			android.os.Environment.getExternalStorageDirectory()
					.getAbsolutePath());

	public static String GetPath() {
		return android.os.Environment.getExternalStorageDirectory()
				.getAbsolutePath() + "/";
	}
	
	public static void createFileDirToSDCard(String filePath){
		String new_dir = SDCardUtils.GetPath()+filePath;
		if (!SDCardUtils.isExists(new_dir)) {
			ADebug.d(TAG, String.format("Create dir:%s", new_dir));
			File file = new File(new_dir);
			file.mkdir();
		}
	}
	
	
	public static boolean isExists(String filePath){
		File file = new File(filePath);
		return file.exists();
	}

	/**
	 * 判断SD卡是否可用
	 * 
	 * @author 
	 * @Since:2011-03-31
	 * @return
	 */
	public static boolean isSDCardEnable() {

		return Environment.getExternalStorageState().equals(
				Environment.MEDIA_MOUNTED);
	}

	/**
	 * 获取SDCard总大小
	 * 
	 * @author 
	 * @Since:2011-03-31
	 * @return bit
	 */
	public static long getTotalSize() {
		// 获取SDCard上BLOCK总数
		long nTotalBlocks = statfs.getBlockCount();

		// 获取SDCard上每个block的SIZE
		long nBlocSize = statfs.getBlockSize();

		// 计算SDCard 总容量大小MB
		long nSDTotalSize = nTotalBlocks * nBlocSize;

		return nSDTotalSize;
	}

	/**
	 * 获取可用空间大小
	 * 
	 * @author 
	 * @Since:2011-03-31
	 * @return bit
	 */
	public static long getFreeSize() {

		// 获取SDCard上每个block的SIZE
		long nBlocSize = statfs.getBlockSize();

		// 获取可供程序使用的Block的数量
		long nAvailaBlock = statfs.getAvailableBlocks();

		// 获取剩下的所有Block的数量(包括预留的一般程序无法使用的块)
		// long nFreeBlock = statfs.getFreeBlocks();

		// 计算 SDCard 剩余大小B
		long nSDFreeSize = nAvailaBlock * nBlocSize;
		return nSDFreeSize;
	}

}
