 <tr>
    <td align="left" class="checkoutPaymentOptionText">
    	Check out by NoChex
    </td>
    
    <td align="right" class="checkoutPaymentButtons">

	<form action="{g->url}" method="post">
	  {g->hiddenFormVars}
	  <input type="hidden" name="{g->formVar var="controller"}" value="checkoutnochex:Process"/>
	  <input type="hidden" name="{g->formVar var="form[formName]"}" value="{$form.formName}"/>
	  <input type="submit" name="{g->formVar var="form[action][getdetails]"}" value="Pay by NOCHEX" />
	</form>

    </td>
  </tr>

