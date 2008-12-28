// JavaScript Document
var div = 'advert';
var div5 = 'advertlarge';

function adcallout(url1,url2){ processAd(url1); processLargeAd(url2); }
function processAd(url) { if (window.XMLHttpRequest) { req = new XMLHttpRequest(); req.onreadystatechange = targetDiv; try { req.open("GET", url, true); } catch (e) { alert(e); } req.send(null); } else if (window.ActiveXObject) { req = new ActiveXObject("Microsoft.XMLHTTP"); if (req) { req.onreadystatechange = targetDiv; req.open("GET", url, true); req.send(); } } return false; }
function targetDiv(){ if (req.readyState == 4) { if (req.status == 200) { if( document.getElementById(div)){ document.getElementById(div).innerHTML = req.responseText; }} } }

function processLargeAd(url3) { if (window.XMLHttpRequest) { req1 = new XMLHttpRequest(); req1.onreadystatechange = LargetargetDiv; try { req1.open("GET", url3, true); } catch (e) { alert(e); } req1.send(null); } else if (window.ActiveXObject) { req1 = new ActiveXObject("Microsoft.XMLHTTP"); if (req1) { req1.onreadystatechange = LargetargetDiv; req1.open("GET", url3, true); req1.send(); } } return false; }
function LargetargetDiv(){ if (req1.readyState == 4) { if (req1.status == 200) { if( document.getElementById(div5)){ document.getElementById(div5).innerHTML = req1.responseText; }} } }