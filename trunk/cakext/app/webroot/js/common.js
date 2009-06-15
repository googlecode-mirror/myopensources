function perPage() {
	return 3;
}

function loadend() {
	setTimeout(function(){
        Ext.get('loading').remove();
        Ext.get('loading-mask').fadeOut({remove:true});
    }, 250);
}
function getIds(grid2) {
	var s = grid2.getSelectionModel().getSelections();
	if (s.length==0) {
		return null;
	}
	var ids = [];
	for (i=0;i<s.length;i++) {
		ids.push(s[i].id);
	}
	ids = ids.join(',');
	return ids;
}
function getId(grid2) {
	var s = grid2.getSelectionModel().getSelected();
	if (s) {
		return s.id;
	}
	return 0;
}