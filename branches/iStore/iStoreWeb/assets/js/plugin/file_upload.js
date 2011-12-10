var fileupload_plugin="FileUploadPlugin";
nativeJS.addPlugin(fileupload_plugin);
var FileUploadPlugin = function(){
};

FileUploadPlugin.upload = function(filePath, server, options) {
    // check for options
    var fileKey = null;
    var fileName = null;
    var mimeType = null;
    var params = null;
    if (options) {
        fileKey = options.fileKey;
        fileName = options.fileName;
        mimeType = options.mimeType;
        if (options.params) {
            params = options.params;
        }
        else {
            params = {};
        }
    }
    
	return nativeJS.exec(fileupload_plugin, "upload", null, "[\""+filePath+"\", \""+server+"\", \""+fileKey+"\", \""+fileName+"\", \""+mimeType+"\", \""+JSON.stringify(params)+"\"]", true)
};
