<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php wp_title('&laquo;', true, 'right'); ?><?php bloginfo('name'); ?></title>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<style type="text/css" media="screen">

<?php
// Checks to see whether it needs a sidebar or not
if ( !empty($withcomments) && !is_single() ) {
?>
	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/kubrickbg-<?php bloginfo('text_direction'); ?>.jpg") repeat-y top; border: none; }
<?php } else { // No sidebar ?>
	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/kubrickbgwide.jpg") repeat-y top; border: none; }
<?php } ?>

</style>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

</head>

<body>


<div id="container">
  <div class="btn_bkhome"><a href="<?php echo get_option('home'); ?>/" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image17','','<?php bloginfo('stylesheet_directory'); ?>/images/btn_bkhome_ov.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/btn_bkhome_off.gif" name="Image17" width="92" height="30" border="0" id="Image17" /></a></div>
  <div class="header"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/top.jpg" width="955" height="146" border="0" usemap="#Map" /><map name="Map" id="Map"><area shape="rect" coords="151,37,396,115" href="<?php echo get_option('home'); ?>/" /></map></div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="71"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/btn_left.gif" width="71" height="60" /></td>
      <td width="103"><a href="<?php echo get_option('home'); ?>/archives/category/news" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','<?php bloginfo('stylesheet_directory'); ?>/images/btn_01_ov.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/btn_01_<?php echo is_category('3') ? 'ov' : 'off'  ?>.gif" name="Image8" width="103" height="60" border="0" id="Image8" /></a></td>
      <td width="128"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','<?php bloginfo('stylesheet_directory'); ?>/images/btn_02_ov.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/btn_02_off.gif" name="Image9" width="128" height="60" border="0" id="Image9" /></a></td>
      <td width="136"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image10','','<?php bloginfo('stylesheet_directory'); ?>/images/btn_03_ov.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/btn_03_off.gif" name="Image10" width="136" height="60" border="0" id="Image10" /></a></td>
      <td width="117"><a href="talk.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image11','','<?php bloginfo('stylesheet_directory'); ?>/images/btn_04_ov.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/btn_04_off.gif" name="Image11" width="117" height="60" border="0" id="Image11" /></a></td>
      <td width="115"><a href="<?php echo get_option('home'); ?>/archives/category/home" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image12','','<?php bloginfo('stylesheet_directory'); ?>/images/btn_05_ov.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/btn_05_<?php echo is_category('4') ? 'ov' : 'off'  ?>.gif" name="Image12" width="115" height="60" border="0" id="Image12" /></a></td>
      <td width="121"><a href="rock.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image13','','<?php bloginfo('stylesheet_directory'); ?>/images/btn_06_ov.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/btn_06_off.gif" name="Image13" width="121" height="60" border="0" id="Image13" /></a></td>
      <td width="104"><a href="work.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image14','','<?php bloginfo('stylesheet_directory'); ?>/images/btn_07_ov.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/btn_07_off.gif" name="Image14" width="104" height="60" border="0" id="Image14" /></a></td>
      <td><img src="<?php bloginfo('stylesheet_directory'); ?>/images/btn_right.gif" width="60" height="60" /></td>
    </tr>
  </table>
