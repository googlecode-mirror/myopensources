package info.arzen.files;

import java.io.File;

import android.content.Context;
import android.content.Intent;
import android.net.Uri;

public class ApkUtils {
    /**
     * 安装或者更新Android应用程序
     *
     * @param apkFile 本地的apk文件
     */
    public static void installOrUpdateApk(Context ctx, File apkFile) {
        Intent intent = new Intent(Intent.ACTION_VIEW);
        intent.setDataAndType(Uri.fromFile(apkFile), "application/vnd.android.package-archive");

        ctx.startActivity(intent);
    }

    /**
     * 卸载Android应用程序
     *
     * @param packageName 要卸载程序的包名
     */
    public static void uninstallApk(Context ctx, String packageName) {
        Uri packageURI = Uri.parse("package:" + packageName);
        Intent uninstallIntent = new Intent(Intent.ACTION_DELETE, packageURI);
        ctx.startActivity(uninstallIntent);
    }

}
