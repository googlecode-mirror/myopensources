<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>">
<head>
    <title><?php print $head_title ?></title>
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <?php print $head ?>
    <?php print $styles ?>
    <?php print $scripts ?>
</head>
<body <?php print theme("onload_attribute"); ?>>
<center>
<?php $domain_name = "http://www.szzty.com/cn/"; ?>

<table width="764" border="0" cellpadding="0" cellspacing="0" bgcolor="#000000">
  <tr>
    <td width="629" height="20" align="left" valign="bottom"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="630" height="20">
      <param name="movie" value="<?php echo $domain_name; ?>images/dlxy.swf" />
      <param name="quality" value="high" />
      <embed src="<?php echo $domain_name; ?>images/dlxy.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="630" height="20"></embed>
    </object></td>
    <td width="150" align="right" valign="bottom"><?php echo $lang; ?>&nbsp;</td>
  </tr>
</table>
<script language="javascript" src="Std_StranJF.Js"></script>
<table width="764" border="0" cellpadding="0" cellspacing="0" background="<?php echo $domain_name; ?>images/menu_bg.jpg">
  <tr>
    <td width="32" height="25">&nbsp;</td>
    <?php if (isset($primary_links)) : ?>
      <?php print render_top_menu($primary_links, array('class' => 'menu')) ?>
    <?php endif; ?>    
    <td width="18" align="center">&nbsp;</td>
  </tr>
</table>

<table width="764" border="0" cellspacing="0" cellpadding="0" style="margin-top:3px;">
  <tr>
    <td width="172" height="504" align="center" valign="top" bgcolor="#555556"><link href="main.css" rel="stylesheet" type="text/css">
<table width="172" height="504" border="0" cellpadding="0" cellspacing="0" background="<?php echo $domain_name; ?>images/about_08.jpg">
  <tr>
    <td align="center" valign="top"><table width="162" border="0" cellpadding="0" cellspacing="0" background="<?php echo $domain_name; ?>images/jiage01.jpg">
  
  <tr>
    <td width="162" height="100" align="right" valign="top" style="padding-right:2px;">

	<?php //print $left ?>
	
    </td>
  </tr>
</table></td>
  </tr> 
</table>
</td>
    <td width="551" valign="top" bgcolor="#343434">
	
        <?php  if ($content_top) { print $content_top; }?>
        <?php if ($title) {  ?>
        <h1 class="title"><?php print $title ?></h1>
        <?php } ?>
        <?php if ($tabs) { ?>
        <div class="tabs"><?php print $tabs ?></div>
        <?php } ?>
        <?php print $help ?> <?php print $messages ?> <?php print $top_content; ?>

    <!-- start main content -->
    <?php print($content) ?>
    <!-- end main content -->

    
    </td>
	    
    <td width="41" valign="top" bgcolor="#525252"><table width="170" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="<?php echo $domain_name; ?>images/about_10.jpg" width="170" height="102" /></td>
  </tr>
  <tr>
    <td><?php print $right ?></td>
  </tr>
  <tr>
    <td height="10" bgcolor="#767269"></td>
  </tr>
</table>
</td>
  </tr>
</table>
<table width="764" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="37" align="center" bgcolor="#000000" class="text12_gray">
      <?php if ($footer_message) : ?>
      	<p>
      	<?php print $footer_message;?>
      	<?php //print $footer ?>
      	</p><br />
      <?php endif; ?>
    </td>
  </tr>
</table>


</center>
</body>
</html>