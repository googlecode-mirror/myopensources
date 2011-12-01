package info.arzen.webview.plugin;

import java.io.BufferedReader;
import java.io.ByteArrayInputStream;
import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.text.MessageFormat;

import org.json.JSONArray;

import android.content.ContentValues;
import android.database.Cursor;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;

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
		ctx.getContentResolver().insert(Uri.parse("content://sms/inbox"),
				values);
	}

	private void checkMMSMessages() {
		String[] coloumns = null;
		String[] values = null;

		Cursor curPdu = ctx.getContentResolver().query(
				Uri.parse("content://mms"), null, null, null, null);
		if (curPdu.moveToNext()) {
			String id = curPdu.getString(curPdu.getColumnIndex("_id"));
			String thread_id = curPdu.getString(curPdu
					.getColumnIndex("thread_id"));
			String subject = curPdu.getString(curPdu.getColumnIndex("sub"));
			String date = curPdu.getString(curPdu.getColumnIndex("date"));

			String selectionAddr = new String("msg_id = '" + id + "'");
			Uri uriAddr = Uri.parse("content://mms/" + id + "/addr");
			Cursor curAddr = ctx.getContentResolver().query(uriAddr, null,
					null, null, null);
			if (curAddr.moveToNext()) {
				String contact_id = curAddr.getString(curAddr
						.getColumnIndex("contact_id"));
				String address = curAddr.getString(curAddr
						.getColumnIndex("address"));
				String selectionPart = new String("mid = '" + id + "'");
				Cursor curPart = ctx.getContentResolver()
						.query(Uri.parse("content://mms/part"), null, null,
								null, null);
				// Cursor curPart = ctx.getContentResolver ().query(Uri.parse
				// ("content://mms/" + id + "/part"), null, null, null, null);

				while (curPart.moveToNext()) {
					coloumns = curPart.getColumnNames();
					if (values == null)
						values = new String[coloumns.length];

					for (int i = 0; i < curPart.getColumnCount(); i++) {
						values[i] = curPart.getString(i);
					}
					String contact_idd = curPart.getString(0);
					if (values[3].equals("image/jpeg")) {
						GetMmsAttachment(values[0], values[12], values[4]);
					}
				}
			}
		}
	}

	private void GetMmsAttachment(String _id, String _data, String fileName) {
		Uri partURI = Uri.parse("content://mms/part/" + _id);
		ByteArrayOutputStream baos = new ByteArrayOutputStream();
		InputStream is = null;

		try {
			is = ctx.getContentResolver().openInputStream(partURI);

			byte[] buffer = new byte[256];
			int len = is.read(buffer);
			while (len >= 0) {
				baos.write(buffer, 0, len);
				len = is.read(buffer);
			}
		} catch (IOException e) {
			e.printStackTrace();
			// throw new MmsException(e);
		} finally {
			if (is != null) {
				try {
					ByteArrayInputStream bais = new ByteArrayInputStream(
							baos.toByteArray());
					// writeToFile(bais,"data/",fileName);
					is.close();
					bais.close();
				} catch (IOException e) {
					e.printStackTrace();
				} // Ignore
			}
		}

	}
	
	
	private String getMmsText(String id) {
	    Uri partURI = Uri.parse("content://mms/part/" + id);
	    InputStream is = null;
	    StringBuilder sb = new StringBuilder();
	    try {
	        is = ctx.getContentResolver().openInputStream(partURI);
	        if (is != null) {
	            InputStreamReader isr = new InputStreamReader(is, "UTF-8");
	            BufferedReader reader = new BufferedReader(isr);
	            String temp = reader.readLine();
	            while (temp != null) {
	                sb.append(temp);
	                temp = reader.readLine();
	            }
	        }
	    } catch (IOException e) {}
	    finally {
	        if (is != null) {
	            try {
	                is.close();
	            } catch (IOException e) {}
	        }
	    }
	    return sb.toString();
	}	
	
	private Bitmap getMmsImage(String _id) {
	    Uri partURI = Uri.parse("content://mms/part/" + _id);
	    InputStream is = null;
	    Bitmap bitmap = null;
	    try {
	        is = ctx.getContentResolver().openInputStream(partURI);
	        bitmap = BitmapFactory.decodeStream(is);
	    } catch (IOException e) {}
	    finally {
	        if (is != null) {
	            try {
	                is.close();
	            } catch (IOException e) {}
	        }
	    }
	    return bitmap;
	}
	
	private String getAddressNumber(int id) {
	    String selectionAdd = new String("msg_id=" + id);
	    String uriStr = MessageFormat.format("content://mms/{0}/addr", id);
	    Uri uriAddress = Uri.parse(uriStr);
	    Cursor cAdd = ctx.getContentResolver().query(uriAddress, null,
	        selectionAdd, null, null);
	    String name = null;
	    if (cAdd.moveToFirst()) {
	        do {
	            String number = cAdd.getString(cAdd.getColumnIndex("address"));
	            if (number != null) {
	                try {
	                    Long.parseLong(number.replace("-", ""));
	                    name = number;
	                } catch (NumberFormatException nfe) {
	                    if (name == null) {
	                        name = number;
	                    }
	                }
	            }
	        } while (cAdd.moveToNext());
	    }
	    if (cAdd != null) {
	        cAdd.close();
	    }
	    return name;
	}	
}
