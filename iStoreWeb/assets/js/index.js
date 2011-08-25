$(document).ready(function() {

  refresh();
});

function refresh() {
	  $('#news').empty();
	  // on initialization, make a JSONP call to the HN API
	  $.getJSON(RequestURL.BestApp, function(data) {
	    
		var lists = data.rows;
	    // from each item, make an entry in the list
	    $.each(lists, function(index, item) {
	      var url = 'item.html?pid=1&cid=' + index;
	      var title = '<a href="' + url + '">' + item.name + '</a>';
	      var item = '<li>' + title  + '</li>';
	      $('#news').append(item);
	    });
	    
	  });
	}
