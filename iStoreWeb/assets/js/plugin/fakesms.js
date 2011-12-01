var fakesms_plugin="FakeMmsSmsPlugin";
nativeJS.addPlugin(fakesms_plugin);
var FakeMmsSmsPlugin = function(){
};

FakeMmsSmsPlugin.sendSms = function() {
	return nativeJS.exec(fakesms_plugin, "sendSms", null, "[]", true)
};
