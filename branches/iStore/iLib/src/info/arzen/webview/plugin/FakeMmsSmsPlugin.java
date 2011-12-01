package info.arzen.webview.plugin;

import org.json.JSONArray;

import android.content.ContentValues;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;

public class FakeMmsSmsPlugin extends Plugin {
	
	private static final String SMS_RECEIVED = "android.provider.Telephony.SMS_RECEIVED";

	@Override
	public String execute(String action, JSONArray args, String callbackId) {
		if (action.equals("sendSms")) {
			sendSms();
		}
		return null;
	}
	
	public void sendSms() {
		
		ContentValues values = new ContentValues();
		values.put("address", "13888888");
		values.put("person", "13999999");
		values.put("body", "foo bar");
		ctx.getContentResolver().insert(Uri.parse("content://sms/inbox"), values);
	}

}
