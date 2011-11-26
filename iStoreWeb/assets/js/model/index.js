$(document).ready(function() {

  refresh();
});

function refresh() {
	  $('#news').empty();
	  var data = JSON.parse(HttpPlugin.getUrl(RequestURL.BestApp));
	  appendToDiv(data);
	};

function appendToDiv(lists) {
    // from each item, make an entry in the list
    $.each(lists, function(index, item) {
      var url = 'detail.html?pid=1&cid=' + item.id;
      var price = '<span class="price">' + item.price + '元</span>';
      var votes = '<span class="votes votes-0"></span>';
      var author = '<a id="item-auth" >' + item.author + '</a>';
      var title = '<a id="item-name" href="' + url + '">' + item.name + '</a>';
      var image = '<img id="item-pic" src="' + item.icon + '"/>';
      var item = '<li>' + image +  title  + author+ votes+ price+ '</li>';
      $('#news').append(item);
    });
	
};