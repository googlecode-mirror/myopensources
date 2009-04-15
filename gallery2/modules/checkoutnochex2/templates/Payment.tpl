{*
 * $Revision:  $
 * Read this before changing templates!  http://codex.gallery2.org/Gallery2:Editing_Templates
 *}
{if $payment.paymentVariables.active}
{if $payment.paymentVariables.orderTotal > 0 && $payment.paymentVariables.orderTotal < $payment.paymentVariables.orderLimit}
 <tr>
    <td align="left" class="checkoutPaymentOptionText">
   {g->text text="Click the Nochex button and we'll collect your address details then automatically send you to the Nochex website to enter your credit or debit card details for payment."}
   {g->text text="Nochex Ltd is certified as a Small Electronic Money Issuer by the Financial Services Authority and regulated as a Money Service Business by HM Revenue and Customs No. 12126734."}
   </td>
    <td align="right" class="checkoutPaymentButtons">
 <form action="{g->url}" method="post">
  {g->hiddenFormVars}
  <input type="hidden" name="{g->formVar var="controller"}" value="checkoutnochex.Details"/>
  <input type="hidden" name="{g->formVar var="form[formName]"}" value="{$form.formName}"/>
  <input type="image"  name="{g->formVar var="form[action][collect]"}" alt="{g->text text="128-bit Secure Payments by Nochex"}"
  	src="https://www.nochex.com/logobase-secure-images/non-secure-nomess-line-sma.gif" width="207" height="67"/>
</form> 
</td>
</tr>
{/if}
{/if}
