$(document).ready(function() {
	refresh()
});

function refresh() {
	  $('#news').empty();
	  var data = JSON.parse(SmsPlugin.getAll());
	  appendToDiv(data);
	};

function appendToDiv(lists) {
  // from each item, make an entry in the list
  $.each(lists, function(index, item) {
	  
    var url = 'detail.html?pid=1&cid=' + item[0];
    var price = '<span class="price">' + item[1] + '元</span>';
    var votes = '<span class="votes votes-0"></span>';
    var author = '<a id="item-auth" >' + item[0] + '</a>';
    var title = '<a id="item-name" href="' + url + '">' + item[2] + '</a>';
    var image = item[0];
    var item = '<li>' + title  + author+ votes+ price+ '</li>';
    $('#news').append(item);
  });
	
};