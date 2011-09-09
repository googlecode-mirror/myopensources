$(document).ready(function() {

  refresh();
});

function refresh() {
	  $('#news').empty();
	  // on initialization, make a JSONP call to the HN API
		var cache_data= filecache.get(RequestURL.BestApp);
		if (cache_data != null) {
			alert(cache_data);
			var data = JSON.parse(cache_data);
			var lists = data.rows;
			appendToDiv(lists);
			
		} else {
			  $.getJSON(RequestURL.BestApp, function(data) {
					filecache.set(RequestURL.BestApp, JSON.stringify(data));
					var lists = data.rows;
					appendToDiv(lists);
				  });
	
		}
	};

function appendToDiv(lists) {
    // from each item, make an entry in the list
    $.each(lists, function(index, item) {
      var url = 'item.html?pid=1&cid=' + index;
      var title = '<a href="' + url + '">' + item.name + '</a>';
      var image = '<img src="' + item.icon + '"/>';
      var item = '<li>' + image +  title  + '</li>';
      $('#news').append(item);
    });
	
};