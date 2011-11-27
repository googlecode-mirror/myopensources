function chcekUpdate (){
	var currentVCode = parseInt(UpgradeInfoPlugin.getVersionCode());
	var currentVName = UpgradeInfoPlugin.getVersionName();
	
	var data = JSON.parse(HttpPlugin.getUrl(RequestURL.Upgrade));
	var newVCode = data.versionCode;
	var newVName = data.versionName;
	if (newVCode > currentVCode) {
		var apkUrl = data.appPath;
		var appName = data.appName;
		var alterStr = appName +"最新版本为"+newVName+"\n您当前使用的是"+currentVName+"\n立即升级？";
		if (confirm(alterStr)) {
			window.location=apkUrl;
		}
	}
	
};

function randomRate(max) {
	var vNum
	vNum = Math.random()
	vNum = Math.round(vNum*max)
	if (vNum == 1) {
		return true;
	}
	return false;
}