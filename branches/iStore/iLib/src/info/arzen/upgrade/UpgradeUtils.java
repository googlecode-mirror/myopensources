package info.arzen.upgrade;

import info.arzen.common.CommonUtils;
import android.content.pm.PackageInfo;
import android.content.pm.PackageManager.NameNotFoundException;

public class UpgradeUtils {
	
	public static PackageInfo getVerInfo() {
		try {
			return CommonUtils.getContext().getPackageManager().getPackageInfo(CommonUtils.getContext().getPackageName(), 0);
		} catch (NameNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return null;
	}
}
