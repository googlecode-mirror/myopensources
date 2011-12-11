$(document).ready(function() {

  refresh();
  
});
/*
(function(){
	  var myScroll;
	  
	  // Not using $(document).ready because it was firing too soon.
	  // This technique is used for safely loading iScroll-4
	  // Details : http://cubiq.org/iscroll-4 (section "ON LOAD")
	  // Credits : https://groups.google.com/forum/#!topic/iscroll/pp8K7Q-2Hkg
	  function loaded() {
	    setTimeout(function () {
	      // As iScroll needs a little delay to load properly,
	      // the Backbone app loading is also delayed so everything stays in sync
	      setTimeout(function(){
	        myScroll = new iScroll('wrapper');
	      }, 1500); 
	    }, 1500);
	  }
	  window.addEventListener('load', loaded, false);
	
})();
*/

function refresh() {
	  var data = JSON.parse(HttpPlugin.getUrl(RequestURL.AppDetail));
	  $("#name").html(data.name);
	  $("#item-pic").attr("src",data.icon);
	  $("#apk").attr("href",data.download);
	  $("#content").html(data.content + "<img src=\""+data.photo1+"\" width='300'/><img src=\""+data.photo2+"\" width='300' />");
	};
