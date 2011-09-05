var FileCache = function(){
};

FileCache.set = function (key, data){
	filecache.set(key, data);
};

FileCache.get = function (key){
	return filecache.set(key);
};
