(function() {
  var init = function() {
    // Horrible delay hack due to http://goo.gl/hTB16
    setTimeout(function() {
      var id = getParameterByName('id');
      if (init.isLoaded[id] == true) {
        return;
      }
      $.mobile.pageLoading();
      load(id, function() {
        $.mobile.pageLoading('false');
        init.isLoaded[id] = true;
      });
    }, 50);
  };
  init.isLoaded = {};
  

  var load = function(id, callback) {
    var url = DETAIL_URL.replace('{0}', id);
    var $detail = $('.info');
    $detail.empty();
    $.getJSON(url, function(data) {
    // from each item, make an entry in the list
		console.log(data.Application.name);
	  var icon = '<img src="'+data.Application.icon+'" />';
	  var name = '<h3>'+data.Application.name+'</h3>';
 	  var content = '<p>'+data.Application.content+'</p>';
	  var img1 = '<img src="'+data.Image[0].uri+'" />';
     var item = icon +name + img1+ content;
	  $detail.append(item);
//      $detail.listview("refresh");
      callback();
    });
  };
  
  // whenever this page is loaded, call init
  scriptCache.onPageLoad('item.html', init);
  // call init the first time it's loaded too
  init();
})();