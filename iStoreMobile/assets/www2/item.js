(function() {
  var init = function() {
    // Horrible delay hack due to http://goo.gl/hTB16
    setTimeout(function() {
      var pid = getParameterByName('pid');
      var cid = getParameterByName('cid');
      if (init.isLoaded[pid] == true) {
        return;
      }
	  $('.ui-page-active .comments').empty();
      $.mobile.pageLoading();
      load(pid, cid, function() {
        $.mobile.pageLoading('true');
        init.isLoaded[pid] = true;
      });
    }, 50);
  };
  init.isLoaded = {};
  
  var stripHtml = function(str) {
    var re = /<\S[^><]*>/g;
    // var re = /<\/?(^a|font)[^><]*>/g;
    return str.replace(re, "");
  };
  

  var load = function(pid, cid, callback) {
    var url = LISTING_URL.replace('{0}', pid);
	url = url.replace('{1}', cid);
    var $comments = $('.ui-page-active .comments');
    $.getJSON(url, function(data) {
		console.log(url);
    // from each item, make an entry in the list
    $.each(data.rows, function(index, item) {
		console.log(item.name);
      var url = 'detail.html?id=' + item.id;
	  var img = '<img src="'+item.icon+'" />';
	  var name = '<h3>'+item.name+'</h3>';
	  var content = '<p>'+item.content+'</p>';
      var item = '<li><a href="' + url + '">' + img +name+ content + '</a></li>';
      $comments.append(item);
    });
      
      $comments.listview("refresh");
      callback();
    });
  };
  
  // whenever this page is loaded, call init
  scriptCache.onPageLoad('item.html', init);
  // call init the first time it's loaded too
  init();
})();