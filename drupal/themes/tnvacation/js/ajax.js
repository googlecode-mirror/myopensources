// JavaScript Document
/* <![CDATA[ */
var http = getHTTPObject();
var default_url = "/callback/";
var xmlDoc;

var right_now=new Date();
var the_year=right_now.getFullYear();;
var the_month=(right_now.getMonth() + 1);

function getHTTPObject() {
	var xmlhttp;
	try {
		xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');
	} catch (e) {
		try {
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		} catch (E) {
			xmlhttp = false;
		}
	}
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		try {
			xmlhttp = new XMLHttpRequest();
		} catch (e) {
			xmlhttp = false;
		}
	}
	return xmlhttp;
}

function replyQuery(direction){
	if(direction=='forward') 
		the_month++;
	if(direction == 'backward')
		the_month--;
		
	if(the_month > 12){
		the_month = 1;
		the_year++;
	}
	
	if(the_month < 1){
		the_month = 12;
		the_year--;
	}	
	
	var url = default_url + "?month=" + the_month + "&year=" + the_year;
	url = url + "&sid=" + Math.random();
	
	if((http.readyState == 0) || (http.readyState == 4)){			
		http.open("GET", url, true);
		http.onreadystatechange = handleHttpCalendarResponse;
		http.send(null);
	}
}

function handleHttpCalendarResponse() {
	if (http.readyState == 4) {		
		if ((http.status == 200)||(http.status == 0)) { 					
			document.getElementById("calendarWrap").innerHTML = http.responseText;
		}
	}
}


/* ]]> */// JavaScript Document