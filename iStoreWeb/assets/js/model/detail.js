$(document).ready(function() {

  refresh();
  
});

(function(){
	var myScroll;
	function loaded() {
		myScroll = new iScroll('wrapper');
	}

	document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);

	document.addEventListener('DOMContentLoaded', loaded, false);
	
})();


function refresh() {
	  var data = JSON.parse(HttpPlugin.getUrl(RequestURL.AppDetail));
	  $("#name").html(data.name);
	  $("#item-pic").attr("src",data.icon);
	  $("#apk").attr("href",data.download);
	  $("#content").html(data.content + "<img src=\""+data.photo1+"\" width='300'/><img src=\""+data.photo2+"\" width='300' />");
	};
