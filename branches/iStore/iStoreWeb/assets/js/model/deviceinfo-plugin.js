var deviceinfo_plugin="info.arzen.store.plugin.DeviceInfoPlugin";
nativeJS.addPlugin(deviceinfo_plugin);
var DeviceInfoPlugin = function(){
};

DeviceInfoPlugin.getTel = function() {
	return nativeJS.exec(deviceinfo_plugin, "getImie", null, "[]", true)
};

alert(DeviceInfoPlugin.getTel());