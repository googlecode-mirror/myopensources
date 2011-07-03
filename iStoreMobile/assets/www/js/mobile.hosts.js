var FeedURL = {};
FeedURL.Host = "http://localhost/iStore/feed/";
FeedURL.AppendUrl = "&callback=?";
FeedURL.CategoryBaseUrl = FeedURL.Host + "categories/index.json?";
FeedURL.CategoryApplicationUrl = FeedURL.CategoryBaseUrl + "pid=1" + FeedURL.AppendUrl;
FeedURL.CategoryGameUrl = FeedURL.CategoryBaseUrl + "pid=2" + FeedURL.AppendUrl;
FeedURL.CategoryOtherUrl = FeedURL.CategoryBaseUrl + "pid=3" + FeedURL.AppendUrl;


var Mesg = {};
Mesg.loading = "加载中，请稍后...";