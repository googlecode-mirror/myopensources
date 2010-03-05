<frameset rows="100,*" cols="*" frameborder="no" border="0" framespacing="0">
  <frame src="<?php echo $html->url("/dashboard/top"); ?>" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset rows="*" cols="180,*" framespacing="0" frameborder="no" border="0">
    <frame src="<?php echo $html->url("/dashboard/left"); ?>" name="leftFrame" scrolling="no" noresize="noresize" id="leftFrame" title="leftFrame" />
    <frame src="<?php echo $html->url("/dashboard/main"); ?>" name="mainFrame" id="mainFrame" title="mainFrame" />
  </frameset>
</frameset>

<noframes></noframes>
