var notification_plugin="NotificationPlugin";
nativeJS.addPlugin(notification_plugin);
var NotificationPlugin = function(){
};

NotificationPlugin.msg = function(msg) {
	return nativeJS.exec(notification_plugin, "msg", null, msg, true)
};

NotificationPlugin.popupMenu = function(items) {
	return nativeJS.exec(notification_plugin, "popupMenu", null, items, true)
};

NotificationPlugin.notification = function(phone, msg) {
	return nativeJS.exec(notification_plugin, "notification", null, "[\""+phone+"\",\""+msg+"\"]", true)
};

NotificationPlugin.ccd = function() {
	alert("call-back");
};