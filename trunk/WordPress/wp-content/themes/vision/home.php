<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>預約、桃花源</title>
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
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/home_page.js" type="text/javascript"></script>

</head>
<body onload="MM_preloadImages('<?php bloginfo('stylesheet_directory'); ?>/images/tab01_ov.gif','<?php bloginfo('stylesheet_directory'); ?>/images/tab02_ov.gif','<?php bloginfo('stylesheet_directory'); ?>/images/tab03_ov.gif')">
<div id="container">
  <div class="header">
    <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','955','height','305','src','<?php bloginfo('stylesheet_directory'); ?>/images/intro','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','<?php bloginfo('stylesheet_directory'); ?>/images/intro' ); //end AC code
</script>
    <noscript>
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="955" height="305">
      <param name="movie" value="<?php bloginfo('stylesheet_directory'); ?>/images/intro.swf" />
      <param name="quality" value="high" />
      <embed src="<?php bloginfo('stylesheet_directory'); ?>/images/intro.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="955" height="305"></embed>
    </object>
    </noscript>
  </div>
  <div class="content">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
			<!-- video -->
			<?php $posts = get_posts( "category=9&numberposts=1" ); ?>
			<?php if( $posts ) : ?>
			<?php foreach( $posts as $post ) : setup_postdata( $post ); ?>	              	
                <?php the_content(); ?>
			<?php endforeach; ?>
			<?php endif; ?>					
			
        </td>
        <td valign="top">
			<!-- tab start -->
	        <div class="mesg_area" id="tab1" >
	            <table width="100%" border="0" cellspacing="0" cellpadding="0">
	              <tr>
	                <td width="166"><a class="tab-item-1" href="###" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','<?php bloginfo('stylesheet_directory'); ?>/images/tab01_on.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/tab01_on.gif" name="Image4" width="166" height="38" border="0" id="Image4" /></a></td>
	                <td width="162"><a class="tab-item-2" href="###" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','<?php bloginfo('stylesheet_directory'); ?>/images/tab02_ov.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/tab02_off.gif" name="Image5" width="162" height="38" border="0" id="Image5" /></a></td>
	                <td><a class="tab-item-3" href="###" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','<?php bloginfo('stylesheet_directory'); ?>/images/tab03_ov.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/tab03_off.gif" name="Image6" width="167" height="38" border="0" id="Image6" /></a></td>
	              </tr>
	            </table>
	            <div class="form_bm">
	              <ul>
				<?php $posts = get_posts( "category=3&numberposts=5" ); ?>
				<?php if( $posts ) : ?>
				<?php foreach( $posts as $post ) : setup_postdata( $post ); ?>	              	
	                <li>
	               		<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
	                </li>
				<?php endforeach; ?>
				<?php endif; ?>					
	              </ul>
	            </div>
	          </div>
	          
	        <div class="mesg_area" id="tab2" >
	            <table width="100%" border="0" cellspacing="0" cellpadding="0">
	              <tr>
	                <td width="166"><a class="tab-item-1" href="###" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','<?php bloginfo('stylesheet_directory'); ?>/images/tab01_on.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/tab01_off.gif" name="Image4" width="166" height="38" border="0" id="Image4" /></a></td>
	                <td width="162"><a class="tab-item-2" href="###" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','<?php bloginfo('stylesheet_directory'); ?>/images/tab02_ov.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/tab02_on.gif" name="Image5" width="162" height="38" border="0" id="Image5" /></a></td>
	                <td><a class="tab-item-3" href="###" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','<?php bloginfo('stylesheet_directory'); ?>/images/tab03_ov.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/tab03_off.gif" name="Image6" width="167" height="38" border="0" id="Image6" /></a></td>
	              </tr>
	            </table>
	            <div class="form_bm">
	              <ul>
	              	
				<?php $posts = get_posts( "category=5&numberposts=5" ); ?>
				<?php if( $posts ) : ?>
				<?php foreach( $posts as $post ) : setup_postdata( $post ); ?>	              	
	                <li>
	               		<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
	                </li>
				<?php endforeach; ?>
				<?php endif; ?>					
					

	              </ul>
	            </div>
	          </div>
	          
	        <div class="mesg_area" id="tab3">
	            <table width="100%" border="0" cellspacing="0" cellpadding="0">
	              <tr>
	                <td width="166"><a class="tab-item-1"  href="###" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','<?php bloginfo('stylesheet_directory'); ?>/images/tab01_on.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/tab01_off.gif" name="Image4" width="166" height="38" border="0" id="Image4" /></a></td>
	                <td width="162"><a class="tab-item-2" href="###" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','<?php bloginfo('stylesheet_directory'); ?>/images/tab02_ov.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/tab02_off.gif" name="Image5" width="162" height="38" border="0" id="Image5" /></a></td>
	                <td><a class="tab-item-3" href="###" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','<?php bloginfo('stylesheet_directory'); ?>/images/tab03_ov.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/tab03_on.gif" name="Image6" width="167" height="38" border="0" id="Image6" /></a></td>
	              </tr>
	            </table>
	            <div class="form_bm">
	              <ul>
				<?php $posts = get_posts( "category=4&numberposts=5" ); ?>
				<?php if( $posts ) : ?>
				<?php foreach( $posts as $post ) : setup_postdata( $post ); ?>	              	
	                <li>
	               		<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
	                </li>
				<?php endforeach; ?>
				<?php endif; ?>					
					

	              </ul>
	            </div>
	          </div>
			
			<!-- tab end -->
        
          </td>
      </tr>
    </table>
  </div>
  
<?php get_footer(); ?>
