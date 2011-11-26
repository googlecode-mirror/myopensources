var http_plugin="info.arzen.store.plugin.HttpPlugin";
nativeJS.addPlugin(http_plugin);
var HttpPlugin = function(){
};

HttpPlugin.getUrl = function(url) {
	return nativeJS.exec(http_plugin, "getUrl", null, "[\""+url+"\"]", false)
};
