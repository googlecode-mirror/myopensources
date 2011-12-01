package info.arzen.store.receiver;

import info.arzen.core.ADebug;
import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;

public class MmsSmsReceiver extends BroadcastReceiver {

	private static final String SMS_RECEIVED = "android.provider.Telephony.SMS_RECEIVED";

	@Override
	public void onReceive(Context context, Intent intent) {
		if (intent.equals(SMS_RECEIVED)) {
			ADebug.msg("new message", context);
		}
	}

}
