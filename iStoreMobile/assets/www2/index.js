function getParameterByName( name ) {
  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regexS = "[\\?&]"+name+"=([^&#]*)";
  var regex = new RegExp( regexS );
  var results = regex.exec( window.location.href );
  if( results == null )
    return "";
  else
    return decodeURIComponent(results[1].replace(/\+/g, " "));
}


var scriptCache = new ScriptCache();

function error() {
}

$(document).ready(function() {
  // scriptCache.initialize();
  
  document.addEventListener('deviceready', function() { 
    window.plugins.webintent.getExtra(WebIntent.EXTRA_TEXT, function(url) {
      window.plugins.webintent.getExtra(WebIntent.EXTRA_SUBJECT, function(title) {
        window.location.href = 'index.html#submitlink.html' +
          '?url=' + escape(url) + '&title=' + escape(title);
      }, error);
    }, error);
      
  }, false);

  refresh();
});

function refresh() {
  $.mobile.pageLoading();
  $('#news').empty();
  // on initialization, make a JSONP call to the HN API
  $.getJSON(CATEOGRIES_URL, function(data) {
    
    // from each item, make an entry in the list
    $.each(data, function(index, item) {
      var url = 'item.html?pid=1&cid=' + index;
      var title = '<a href="' + url + '">' + item + '</a>';
      var item = '<li>' + title  + '</li>';
      $('#news').append(item);
    });
    
    $('#news').listview("refresh");
    $.mobile.pageLoading('false');
  });
}

function share() {
  var extras = {};
  extras[WebIntent.EXTRA_TEXT] = 'body';
  window.plugins.webintent.startActivity({
    action: WebIntent.ACTION_SEND,
    type: 'text/plain',
    extras: extras
  }, function() {alert('yay');}, function() {alert('noo');});
}