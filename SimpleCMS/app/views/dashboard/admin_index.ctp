
<frameset rows="72,*,29" cols="*" frameborder="no" border="0" framespacing="0">
  <frame src="<?php echo $html->url("/admin/dashboard/top"); ?>" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset rows="*" cols="163,*" framespacing="0" frameborder="no" border="0">
    <frame src="<?php echo $html->url("/admin/dashboard/left"); ?>" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="leftFrame" />
    <frame src="<?php echo $html->url("/admin/dashboard/main"); ?>" name="mainFrame" id="mainFrame" title="mainFrame" />
  </frameset>
  <frame src="<?php echo $html->url("/admin/dashboard/footer"); ?>" scrolling="No" noresize="noresize" >
</frameset>
<noframes>
<body>
</body>
</noframes>
