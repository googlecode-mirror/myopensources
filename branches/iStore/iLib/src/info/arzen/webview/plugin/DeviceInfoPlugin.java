package info.arzen.webview.plugin;

import java.util.TimeZone;

import org.json.JSONArray;

import android.content.Context;
import android.provider.Settings;
import android.telephony.TelephonyManager;

public class DeviceInfoPlugin extends Plugin {

	private TelephonyManager tm;
	@Override
	public String execute(String action, JSONArray args, String callbackId) {
		if (tm == null) {
			tm = (TelephonyManager) ctx.getSystemService(Context.TELEPHONY_SERVICE);
		}
		if (action.equals("getTel")) {
			return getTel();
		}else if (action.equals("getImie")) {
			return getImie();
		}
		return null;
	}
	
	public String getTel() {
		String tel = tm.getLine1Number();
		return tel;
	}
	
	public String getImie() {
		return tm.getSimSerialNumber();
	}
	
    //--------------------------------------------------------------------------
    // LOCAL METHODS
    //--------------------------------------------------------------------------
		
	
	/**
	 * Get the device's Universally Unique Identifier (UUID).
	 * 
	 * @return
	 */
	public String getUuid()	{		
		String uuid = Settings.Secure.getString(this.ctx.getContentResolver(), android.provider.Settings.Secure.ANDROID_ID);
		return uuid;
	}


	public String getLine1Number(){
	  TelephonyManager operator = (TelephonyManager)this.ctx.getSystemService(Context.TELEPHONY_SERVICE);
	  return operator.getLine1Number();
	}
	
	public String getDeviceId(){
	  TelephonyManager operator = (TelephonyManager)this.ctx.getSystemService(Context.TELEPHONY_SERVICE);
	  return operator.getDeviceId();
	}
	
	public String getSimSerialNumber(){
	  TelephonyManager operator = (TelephonyManager)this.ctx.getSystemService(Context.TELEPHONY_SERVICE);
	  return operator.getSimSerialNumber();
  }
  
	public String getSubscriberId(){
	  TelephonyManager operator = (TelephonyManager)this.ctx.getSystemService(Context.TELEPHONY_SERVICE);
	  return operator.getSubscriberId();
	}
	
	public String getModel()
	{
		String model = android.os.Build.MODEL;
		return model;
	}
	public String getProductName()
	{
		String productname = android.os.Build.PRODUCT;
		return productname;
	}
	
	/**
	 * Get the OS version.
	 * 
	 * @return
	 */
	public String getOSVersion() {
		String osversion = android.os.Build.VERSION.RELEASE;
		return osversion;
	}
	
	public String getSDKVersion()
	{
		String sdkversion = android.os.Build.VERSION.SDK;
		return sdkversion;
	}
	
    
    public String getTimeZoneID() {
       TimeZone tz = TimeZone.getDefault();
        return(tz.getID());
    } 

}
