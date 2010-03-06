<?php echo $html->doctype('xhtml-strict') ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php echo $html->charset(); ?>

	<title><?php echo $title_for_layout; ?></title>
	<meta name="description" content="" />
    <?php
echo $javascript->link( array(
				"jquery",
				'formStyle',
				'gtsmm/secmail_init',
				'gtsmm/secmail.myibc.safelogin.logic',
				'gtsmm/secmail.safelogin.format',
				'gtsmm/secmail_initsecmail.safeloginMemCenter.values',
				'gtsmm/secmail.util',

				) );
echo $html->css( array('cssStyle','secmail.myibc.safelogin') );

$inline_script = <<<EOD
function loginModeSwitch(parm)
{
	if(parm==0)
	{
		document.getElementById('divEmailLoginMode').style.display='';
		document.getElementById('divKeyLoginMode').style.display='none';
		document.getElementById('divLoginTabMenu1').className='divLoginModeSwitchOn';
		document.getElementById('divLoginTabMenu2').className='divLoginModeSwitchOut';
	}
	else
	{
	    callGTSMM();
		document.getElementById('divEmailLoginMode').style.display='none';
		document.getElementById('divKeyLoginMode').style.display='';
		document.getElementById('divLoginTabMenu1').className='divLoginModeSwitchOut';
		document.getElementById('divLoginTabMenu2').className='divLoginModeSwitchOn';
		initForm();
		if(document.getElementById('KeyPassWord'))
		{
			/////
		}
	}
}

function initForm()
{
	if(GTIsActiveXReady()){
		GTListenUSBKey();
	}else{
	    //alert('IE没有安装控件!');
	    if(typeof alertTXT != 'undefined'){
	       if(Sys.firefox){
	          document.getElementById('divIEAlertText').textContent = alertTXT;
	       }else{
	          document.getElementById('divIEAlertText').innerText = alertTXT;
	       }
	    }
	    document.getElementById('divIEAlert').style.display='';
	    document.getElementById('divKeyLoginSubmitButton').style.display = 'none';
	    document.getElementById('InsertKeyImageDiv').style.display = 'none';
	}
}
EOD;
echo $javascript->codeBlock($inline_script);
    ?>
</head>
<body onload="CreateKeyLoginWindows();" >
	  	<?php echo $content_for_layout ?>


</body>
</html>