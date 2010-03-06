<?php
echo $javascript->link( array("jquery", 'jquery.cookie','jquery.treeview') );
echo $html->css( array('screen','jquery.treeview') );

$inline_script = <<<EOD
	$(document).ready(function(){

			$("#red").treeview({
			animated: "fast",
			collapsed: true,
			unique: true,
			persist: "cookie",
			toggle: function() {
				window.console && console.log("%o was toggled", this);
			}
		});
	$("ul span").hover(function(){
	$(this).addClass("highlight");
	},function(){
	$(this).removeClass("highlight");
	});
	});

EOD;
echo $javascript->codeBlock($inline_script);
?>
  <div class = "leftMenu" >
  <div   onclick="parent.mainFrame.location='<?php echo $html->url("/dashboard/main"); ?>'"><img src="<?php echo $html->url("/images/homeIcon.gif"); ?>"  border="0"   />返回首页</div>
<ul id="red" class="treeview-red">
	<li onclick="parent.mainFrame.location='<?php echo $html->url("/users"); ?>'">
		<span>管理员管理</span>
	</li>
	<li><span>网络配置</span>
		<ul>
			<li onclick="parent.mainFrame.location='wan_ip.html'"><span>WAN网口地址</span></li>
			<li  onclick="parent.mainFrame.location='lan_ip.html'"><span>LAN网口地址</span></li>
		</ul>
	</li>
	<li><span>系统管理</span>
		<ul>
			<li onclick="parent.mainFrame.location='shutdown_restart.html'"><span>停机与重启</span></li>
			<li onclick="parent.mainFrame.location='sys_resource.html'"><span>系统资源</span></li>
		</ul>
	</li>
	<li><span>接入管理</span>
		<ul>
			<li onclick="parent.mainFrame.location='services_manage.html'"><span>服务管理</span></li>
			<li onclick="parent.mainFrame.location='privatekey_manage.html'"><span>密钥管理</span></li>
			<li onclick="parent.mainFrame.location='id_wlist_manage.html'"><span>接入标识管理</span></li>
			<li onclick="parent.mainFrame.location='ip_wlist.html'"><span>接入地址管理</span></li>
			<li  onclick="parent.mainFrame.location='application_manage.html'"><span>接入应用管理</span></li>
			<li  onclick="parent.mainFrame.location='current_user.html'"><span>当前接入用户</span></li>
		</ul>
	</li>
	<li><span>日志管理</span>
		<ul>
			<li   onclick="parent.mainFrame.location='admin_record.html'"><span>管理员日志</span></li>
			<li   onclick="parent.mainFrame.location='user_record.html'"><span>用户日志</span></li>
		</ul>
	</li>
</ul>
</div>