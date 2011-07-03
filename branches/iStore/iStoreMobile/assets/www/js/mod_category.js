var Category, CategoryAppView, CategoryView, Categories;
Category = (Categories = (CategoriesView = (CategoryAppView = null)));

$(document).ready(function() {
  var App, CategoryList;
  
  

  Category = Backbone.Model.extend({});
  CategoryList = Backbone.Collection.extend({
    model: Category

  });

  Categories = new CategoryList();
  CategoryView = Backbone.View.extend({
    tagName: 'li',
    template: _.template($('#item-template').html()),
    events: {
      'click a': 'togglePreview'
    },
    initialize: function() {
      return (this.model.view = this);
    },
    render: function() {
      $(this.el).html(this.template(this.model.toJSON()));
      this.setContent();
      return this;
    },
    setContent: function() {
      var name;
      name = $.trim(this.model.get('name'));
      console.log(name);
      return $(this.el);
    },
    togglePreview: function(e) {
      this.toggleRead($(this.el).hasClass('preview'));
      return $(this.el);
    },
    collapse: function() {},
    toggleLike: function(btn) {
      btn.toggleClass('likes');
      return this.model.toggleLike(btn.hasClass('likes'));
    },
    markUnread: function() {
      return this.toggleRead(false);
    },
    toggleRead: function(bool) {
      return this.model.set({
        read: bool
      });
    }
  });

  CategoryAppView = Backbone.View.extend({
    tagName: 'ul',
    events: {},
    initialize: function() {
      _.bindAll(this, 'removeAll','addItem', 'addAll', 'refresh');
      $('#content').append(this.make('ul', {
        'data-role': 'listview',
 //       'data-inset': true,
        'data-theme': 'a'
      }));
      return (this.list = $('#content > ul'));
    },
    removeAll : function() {
    	this.list.empty();
      },
      refresh : function() {
    	this.list.listview('refresh');
      },
    addItem: function(item) {
      var view;
      view = new CategoryView({
        model: item
      });
      return this.list.append(view.render().el);
    },
    addAll: function() {
      Categories.each(this.addItem);
      return this.list.listview();
    }
  });

  getCategory(FeedURL.CategoryApplicationUrl);
  
  $('#apps').click(function () { getCategory(FeedURL.CategoryApplicationUrl); })
  $('#game').click(function () { getCategory(FeedURL.CategoryGameUrl); })
  $('#other').click(function () { getCategory(FeedURL.CategoryOtherUrl);})
  
  function getCategory(url) {
	  	Categories.refresh();
	  	$.mobile.pageLoading();     
	  $.getJSON(url, function(data) {
			var cat;
			$.each(data, function(i,item){
				cat = {id:i,name:item}
				Categories.add(cat);
			  });
			App.removeAll();
			App.addAll();
			App.refresh();
			$.mobile.pageLoading(true);
		  });
	  //	$('#content > ul').empty();	  $('#content > ul').listview('refresh');

 }
  
  
  return (App = new CategoryAppView());
	
});