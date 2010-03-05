<?php
echo $javascript->link( array("jquery", 'formStyle') );
$inline_script = <<<EOD
 $(document).ready(function(){
	$("#selectAll").click(function(){

		 if($("#spanSelectText").html()=="全选") {
		  $(".tableList " + "INPUT[type='checkbox']").attr('checked',true);
			$("#spanSelectText").html("全不选");
		 } else {
		 $(".tableList " + "INPUT[type='checkbox']").attr('checked',false);
		 $("#spanSelectText").html("全选");
		 }


	 })

	$("#invertSelect").click(function(){

		$(".tableList " + "INPUT[type='checkbox']").each(function(){\$(this).attr('checked', !\$(this).attr('checked'));
		})
	});

	changeTrBg('tableList');
});


EOD;
echo $javascript->codeBlock($inline_script);
?>

<form name = "enterpriseForm" method="post" action="">
<div align="center">
<table width="60%" border="0" cellpadding="4" cellspacing="0" >
<tr >
<td>
	<table cellspacing="1" cellpadding="1" class="tableList" id="tableList">
	  <tr >
	    <th>序列号</th>
	    <th>用户名</th>
		 <th>登录方式</th>
	    <th>用户类型</th>
  	  </tr>
  	  <?php foreach ($administrators as $administrator):?>
	  	<tr >
		    <td><input type="checkbox" name ="functionMenuId"  />&nbsp;<?php echo $administrator['id'];?></td>
		    <td ><?php echo $administrator['user_name'];?></td>
			<td><?php echo $administrator['login_type'];?></td>
		    <td ><?php echo $administrator['user_type'];?></td>
		</tr>
	  <?php endforeach; ?>
	 </table>
</td>
</tr>
<tr>
<td class="tablePageBottom">
<input type="checkbox" name="selectAll" id="selectAll"   />
<span id="spanSelectText">全选</span>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="invertSelect" id="invertSelect" />
反选&nbsp;&nbsp;&nbsp;&nbsp
<input type="button" name="delete" value="添 加" class="buttonStyle" onclick="window.location='<?php echo $html->url("/administrator/add"); ?>'" />
<input type="button" name="delete" value="删 除" class="buttonStyle"  />
</td>
</tr>
</table>
</div>
</form>