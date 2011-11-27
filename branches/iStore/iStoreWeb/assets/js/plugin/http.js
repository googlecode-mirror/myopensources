var http_plugin="HttpPlugin";
nativeJS.addPlugin(http_plugin);
var HttpPlugin = function(){
};

HttpPlugin.getUrl = function(url) {
	return nativeJS.exec(http_plugin, "getUrl", null, "[\""+url+"\"]", false)
};

HttpPlugin.postUrl = function(url, args) {
	return nativeJS.exec(http_plugin, "postUrl", null, "[\""+url+"\", "+args+"]", false)
};