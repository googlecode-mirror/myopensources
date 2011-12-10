var capture_plugin="CapturePlugin";
nativeJS.addPlugin(capture_plugin);
var CapturePlugin = function(){
};

CapturePlugin.captureImage = function(successCallback) {
	return nativeJS.exec(capture_plugin, "captureImage", successCallback, "[]", true)
};

CapturePlugin.captureAudio = function() {
	return nativeJS.exec(capture_plugin, "captureAudio", null, "[]", true)
};

CapturePlugin.captureVideo = function() {
	return nativeJS.exec(capture_plugin, "captureVideo", null, "[]", true)
};

CapturePlugin.selectImage = function(successCallback) {
	return nativeJS.exec(capture_plugin, "selectImage", successCallback, "[]", true)
};
