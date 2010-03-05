var ns6 = document.getElementById && !document.all;
var ie4 = document.all && navigator.userAgent.indexOf("Opera") == -1;
//var ie4 = document.all ;

var head = "display:''";
if (ie4 || ns6) {
	document.onclick = olymJsCheckcontained;
	var key = "";
}
function olymJsRefreshmenu(main, sub) {
	iscontained = 0;
	cur = document.getElementById(main);
	i = 0;
	while ((ns6 && cur.parentNode) || (ie4 && cur.parentElement)) {
		if (cur.id == "level1" || cur.id == "olymclassFoldinglist") {
			iscontained = (cur.id == "level1") ? 1 : 0;
			break;
		}
		cur = ns6 ? cur.parentNode : cur.parentElement;
	}
	if (iscontained) {
		var foldercontent = ns6 ? cur.nextSibling.nextSibling : cur.nextSibling;
		// Collapse all previously openned submenus
		olymJsCollapse();
		if (key != "") {
			document.getElementById(key).className = "olymclassNavCode2";
			key = "";
		}
		if (foldercontent.style.display == "none") {
			foldercontent.style.display = "";
			if (ie4) {
				cur.firstChild.className = "olymclassNavCode12";
			} else {
				cur.firstChild.nextSibling.className = "olymclassNavCode12";
			}
		} else {
			foldercontent.style.display = "none"
		}
	}
	if (sub) {
		olymJsMenuClick(sub);
	}
}
function olymJsCheckcontained(e) {
	var iscontained = 0;
	cur = ns6 ? e.target : event.srcElement;
	i = 0;
	while ((ns6 && cur.parentNode) || (ie4 && cur.parentElement)) {
		if (cur.id == "level1" || cur.id == "olymclassFoldinglist") {
			iscontained = (cur.id == "level1") ? 1 : 0;
			break;
		}
		cur = ns6 ? cur.parentNode : cur.parentElement;
	}
	if (iscontained) {
		var foldercontent = ns6 ? cur.nextSibling.nextSibling : cur.nextSibling;
		// Collapse all previously openned submenues
		olymJsCollapse();
		if (key != "") {
			document.getElementById(key).className = "olymclassNavCode2";
			key = "";
		}
		if (foldercontent.style.display == "none") {
			foldercontent.style.display = "";
			if (ie4) {
				cur.firstChild.className = "olymclassNavCode12";
			} else {
				cur.firstChild.nextSibling.className = "olymclassNavCode12";
			}
		} else {
			foldercontent.style.display = "none";
		}
	}
}
function olymJsCollapse() {
	var top = document.getElementById('level1');
	while (top) {
		if (top.id == "olymclassFoldinglist") {
			top.style.display = "none";
		}
		if (ie4) {
			if (top.id == "level1" && top.firstChild.className == "olymclassNavCode12") {
				top.firstChild.className = "olymclassNavCode1";
			}
			top = top.nextSibling;
		} else {
	 		if (top.id == "level1") {
				if (top.firstChild.nextSibling.className == "olymclassNavCode12") {
					top.firstChild.nextSibling.className = "olymclassNavCode1";
				}
			}
			top = top.nextSibling;
		}
	}
}
function olymJsMenuClick(name) {
	if (key != "") {
		 document.getElementById(key).className = "olymclassNavCode2";
	}
	document.getElementById(name).className="olymclassLevel2On";
	key = name;
}
function olymJsMover(obj) {
	var parent_obj = ns6 ? obj.parentNode : obj.parentElement;
	var foldercontent = ns6 ? parent_obj.nextSibling.nextSibling : parent_obj.nextSibling;	
	if (foldercontent.style.display == "none") {
		obj.className = "olymclassNavCode1Over";
	}
}
function olymJsMout(obj) {
	var parent_obj=ns6? obj.parentNode : obj.parentElement;
	var foldercontent = ns6 ? parent_obj.nextSibling.nextSibling:parent_obj.nextSibling;
	if (foldercontent.style.display == "none") {
		obj.className = "olymclassNavCode1";
	}
}
function olymJsLevel2Mover(obj) {
	if (obj.id != key) {
		obj.className = "olymclassLevel2Over";
	}
}
function olymJsLevel2Mout(obj) {
	if (obj.id != key) {
		obj.className = "olymclassNavCode2";
	}
}



function changeTrBg(tableName) {

	var tableName = document.getElementById(tableName);
	var dataRows = tableName.getElementsByTagName('tr');
	if(dataRows.length > 1) {
		for (i=0;i<dataRows.length ;i++ )
		{				
			if(i % 2 ==0) {
				dataRows[i].className  = "trOddStyle";
			} else {
				dataRows[i].className  = "trEvenStyle";
			}
		}
	}

}


function printInitHead() {
	document.write("<div class = 'idHeadBg'>");
	document.write("<div class = 'divHeadLogo'>");
	document.write("<img src='images/logo.gif' border='0' alt='logo'></div> ");
	document.write("</div>");
	document.write("<div class = 'divInitHead'>系统初始化</div>");
}
