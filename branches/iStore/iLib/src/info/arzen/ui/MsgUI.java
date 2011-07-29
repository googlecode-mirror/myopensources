package info.arzen.ui;

import info.arzen.common.CommonUtils;
import android.content.DialogInterface;
import android.widget.Toast;

public class MsgUI {

	public static void showMsg(String msg) {
		Toast.makeText(CommonUtils.getContext(), msg, Toast.LENGTH_SHORT);
	}
	
	public static void showDailog(String title, String body, DialogInterface.OnClickListener ok_listener, DialogInterface.OnClickListener cancel_listener, String ok_label, String cancel_lable) {
		new android.app.AlertDialog.Builder(CommonUtils.getActivity())
		.setTitle(title)
		.setMessage(body)
		.setPositiveButton(ok_label, ok_listener)
		.setNegativeButton(cancel_lable, cancel_listener).show();
		
	}
}
