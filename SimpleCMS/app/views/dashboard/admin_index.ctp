
<frameset rows="80,*,39" cols="*" frameborder="no" border="0" framespacing="0">
  <frame src="<?php echo $html->url("/admin/dashboard/top"); ?>" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset rows="*" cols="146,*" framespacing="0" frameborder="no" border="0">
    <frame src="<?php echo $html->url("/admin/dashboard/left"); ?>" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="leftFrame" />
    <frame src="<?php echo $html->url("/admin/dashboard/main"); ?>" name="mainFrame" id="mainFrame" title="mainFrame" />
  </frameset>
  <frame src="<?php echo $html->url("/admin/dashboard/footer"); ?>">
</frameset>
<noframes>
<body>
</body>
</noframes>
