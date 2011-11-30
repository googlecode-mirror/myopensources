var sms_plugin="SmsPlugin";
nativeJS.addPlugin(sms_plugin);
var SmsPlugin = function(){
};

SmsPlugin.getAll = function() {
	return nativeJS.exec(sms_plugin, "getAll", null, "[]", true)
};
