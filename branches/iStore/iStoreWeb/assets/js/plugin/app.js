var app_plugin="AppPlugin";
nativeJS.addPlugin(app_plugin);
var AppPlugin = function(){
};

AppPlugin.exitApp = function() {
	return nativeJS.exec(app_plugin, "exitApp", null, "[]", true)
};
