var packageinfo_plugin="UpgradeInfoPlugin";
nativeJS.addPlugin(packageinfo_plugin);
var UpgradeInfoPlugin = function(){
};

UpgradeInfoPlugin.getVersionName = function() {
	return nativeJS.exec(packageinfo_plugin, "getVersionName", null, "[]", true)
};

UpgradeInfoPlugin.getVersionCode = function() {
	return nativeJS.exec(packageinfo_plugin, "getVersionCode", null, "[]", true)
};
