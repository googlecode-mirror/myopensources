$(document).ready(function() {
		$('#sug_form').attr("action", RequestURL.Suggest);
		$('#sug_form').submit(function (e) {
			var content = $("#contents");
			if(content.val() == ""){
				alert('请输入建议内容');
				content.focus();
				return false;
			}
			var data = JSON.parse(HttpPlugin.postUrl(RequestURL.Suggest, "{contents:\""+encodeURIComponent(content.val())+"\"}"));
			if(data.status == "ok"){
				alert("你的建议已提交成功\n感谢您的宝贵意见");
				window.history.back(-1);
			}

			return false;
		});
		
	});

