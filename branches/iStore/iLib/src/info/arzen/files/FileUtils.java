package info.arzen.files;

public class FileUtils {
	/**
	 * 获取文件扩展名 Since:2010-11-29
	 * 
	 * @param file
	 * @return
	 */
	public static String getFileExtension(String file) {
		int beginIndex = file.lastIndexOf("/");
		int endIndex = file.lastIndexOf(".");
		if (beginIndex >= 0) {
			if (beginIndex > endIndex) {
				return null;
			} else {
				return file.substring(endIndex + 1);
			}
		} else {
			if (endIndex < 0) {
				return null;
			} else {
				return file.substring(endIndex + 1);
			}
		}
	}

	/**
	 * 获取文件名 ，不包含扩展名
	 * 
	 * @param file
	 * @return
	 */
	public static String getFileName(String file) {
		int beginIndex = file.lastIndexOf("/");
		int endIndex = file.lastIndexOf(".");

		if (beginIndex >= 0) {
			if (beginIndex > endIndex) {
				return file.substring(beginIndex + 1).trim();
			} else {
				return file.substring(beginIndex + 1, endIndex).trim();
			}
		} else {
			if (endIndex < 0) {
				return file.trim();
			} else {
				return file.substring(0, endIndex).trim();
			}
		}
	}

	/**
	 * 获取文件全名，包含扩展名
	 * 
	 * @Since:2010-12-18
	 * @param file
	 * @return
	 */
	public static String getFileFullName(String file) {
		int beginIndex = file.lastIndexOf("/");

		if (beginIndex >= 0) {
			return file.substring(beginIndex + 1).trim();
		} else {
			return null;
		}
	}

}
