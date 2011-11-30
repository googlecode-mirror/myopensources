package info.arzen.webview.plugin;

import info.arzen.core.ADebug;

import java.text.SimpleDateFormat;
import java.util.Date;

import org.json.JSONArray;

import android.content.ContentResolver;
import android.database.Cursor;
import android.net.Uri;

public class SmsPlugin extends Plugin {
	final String SMS_URI_ALL = "content://sms/";
	final String SMS_URI_INBOX = "content://sms/inbox";
	final String SMS_URI_SEND = "content://sms/sent";
	final String SMS_URI_DRAFT = "content://sms/draft";

	@Override
	public String execute(String action, JSONArray args, String callbackId) {
		if (action.equals("getAll")) {
			ADebug.d("John", "sms");
			return getAll();
		}
		return null;
	}

	public String getAll() {
		JSONArray datas = new JSONArray();

		try {
			ADebug.d("John", "start sms");
			ContentResolver cr = ctx.getContentResolver();
			String[] projection = {"_id", "address", "person", "body", "date", "type"};
			Uri uri = Uri.parse(SMS_URI_ALL);
			Cursor cur = cr.query(uri, projection, null, null, "date desc");
			JSONArray item ;
			if (cur.moveToFirst()) {
				String name;
				String phoneNumber;
				String smsbody;
				String date;
				String type;
				int nameColumn = cur.getColumnIndex("person");
				int phoneNumberColumn = cur.getColumnIndex("address");
				int smsbodyColumn = cur.getColumnIndex("body");
				int dateColumn = cur.getColumnIndex("date");
				int typeColumn = cur.getColumnIndex("type");
				do {
					item = new JSONArray();
					name = cur.getString(nameColumn);
					phoneNumber = cur.getString(phoneNumberColumn);
					smsbody = cur.getString(smsbodyColumn);
					SimpleDateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd hh:mm:ss");
					Date d = new Date(Long.parseLong(cur.getString(dateColumn)));
					date = dateFormat.format(d);
					int typeId = cur.getInt(typeColumn);
					if (typeId == 1) {
						type = "接收";
					} else if (typeId == 2) {
						type = "发送";
					} else {
						type = "";
					}
					
					item.put(name);
					item.put(phoneNumber);
					item.put(smsbody);
					item.put(date);
					item.put(type);
					
					datas.put(item);
					
				}while(cur.moveToNext());
				
			}
			ADebug.d("John", "end sms");
		} catch (Exception e) {
			// TODO: handle exception
		}
		return datas.toString();
	}
}
