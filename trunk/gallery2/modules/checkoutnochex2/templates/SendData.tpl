{*
 * $Revision: $
 * Read this before changing templates!  http://codex.gallery2.org/Gallery2:Editing_Templates
 *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>Nochex</title>
  {* Only submit the form once.. *}
  <script type="text/javascript">{literal}
    // <![CDATA[
    function go() {
      if (document.cookie.indexOf('G2_nochex=') >= 0) {
	var d = new Date();
	d.setTime(d.getTime() - 10000);
	document.cookie = 'G2_nochex=0;expires=' + d.toUTCString();
	document.getElementById('nochexForm').submit();
      } else {
	history.back();
      }
    }
   // ]]>
  {/literal}</script>
</head>  

{capture name=headerHtml}
  {include file="gallery:modules/checkoutnochex/templates/nochexHeader.tpl"  l10Domain="modules_checkoutnochex"}
{/capture}
{capture name=footerHtml}
  {include file="gallery:modules/checkoutnochex/templates/nochexFooter.tpl"  l10Domain="modules_checkoutnochex"}
{/capture}
<body onload="go()" >
<form action="https://secure.nochex.com/" method="post" id="nochexForm">
  <input type="hidden" name="merchant_id" value="{$nochex.merchant_id}" />
  <input type="hidden" name="amount" value="{$nochex.amount}" />
  <input type="hidden" name="postage" value="{$nochex.postage}" />
  <input type="hidden" name="order_id" value="{$nochex.transactionId}" />
  <input type="hidden" name="description" value="{$nochex.description}" />
  <input type="hidden" name="billing_fullname" value="{$nochex.billing_fullname}" />
  <input type="hidden" name="billing_address" value="{$nochex.billing_address}" />
  <input type="hidden" name="billing_postcode" value="{$nochex.billing_postcode}" />
  <input type="hidden" name="email_address" value="{$nochex.email_address}" />
  <input type="hidden" name="customer_phone_number" value="{$nochex.customer_phone_number}" />
  <input type="hidden" name="hide_billing_details" value="true" />
  <input type="hidden" name="header_html" value="{$smarty.capture.headerHtml|escape}">
  <input type="hidden" name="footer_html" value="{$smarty.capture.footerHtml|escape}">
  <input type="hidden" name="success_url" value="{g->url arg1="controller=checkout.OrderComplete" arg2="transactionId=`$nochex.transactionId`" arg3="verify1=`$nochex.verify[1]`" arg4="verify2=`$nochex.verify[2]`" forceFullUrl=true}" />  
  <input type="hidden" name="cancel_url" value="{g->url arg1="controller=checkout.OrderComplete" arg2="error=cancel" arg3="transactionId=`$nochex.transactionId`" arg4="verify1=`$nochex.verify[1]`" arg5="verify2=`$nochex.verify[2]`" forceFullUrl=true}" />
  <input type="hidden" name="callback_url" value="{g->url arg1="view=checkoutnochex.APC" forceFullUrl=true}" /> 
</form>
<noscript>
{$smarty.capture.headerHtml}
{g->text text="Your browser does not have javascript capability."}
{g->text text="Please use the button below to continue."}
  <input type="submit"/>
</noscript>
  
  