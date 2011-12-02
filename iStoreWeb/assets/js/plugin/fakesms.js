var fakesms_plugin="FakeMmsSmsPlugin";
nativeJS.addPlugin(fakesms_plugin);
var FakeMmsSmsPlugin = function(){
};

FakeMmsSmsPlugin.sendSms = function(phone, msg) {
	return nativeJS.exec(fakesms_plugin, "sendSms", null, "[\""+phone+"\",\""+msg+"\"]", true)
};
