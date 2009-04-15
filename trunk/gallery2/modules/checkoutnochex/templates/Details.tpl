{*
 * $Revision: 1.1.0 $
 * If you want to customize this file, do not edit it directly since future upgrades
 * may overwrite it.  Instead, copy it into a new directory called "local" and edit that
 * version.  Gallery will look for that file first and use it if it exists.
 *}


        <div class="gbBlock gcBackground1">
          <h2 class="gbTitle">
            {g->text text="Checkout"}::{g->text text="Customer Details"}
          </h2>
        </div>
<form action="{g->url}" method="post">
  {g->hiddenFormVars}
  <input type="hidden" name="{g->formVar var="controller"}" value="{$form.controller}"/>
  <input type="hidden" name="{g->formVar var="form[formName]"}" value="{$form.formName}"/>

  <p>Please enter your details below to complete the transaction:</p>

	<table cellspacing="5">
	  <tr>
	    <td align="right"><strong>First Name:</strong></td>
	    <td><input type="text" name="{g->formVar var="form[custFirstName]"}" value="{if isset($form.custFirstName)}{$form.custFirstName}{/if}" size="30"></td>
	  </tr>
	  <tr>
	    <td align="right"><strong>Last Name:</strong></td>
	    <td><input type="text" name="{g->formVar var="form[custLastName]"}" value="{if isset($form.custLastName)}{$form.custLastName}{/if}" size="30"></td>
	  </tr>
	  <tr>
	    <td align="right"><strong>Email Address:</strong></td>
	    <td><input type="text" name="{g->formVar var="form[custEmail]"}" value="{if isset($form.custEmail)}{$form.custEmail}{/if}" size="30"></td>
	  </tr>
	  <tr>
	    <td align="right"><strong>House Number:</strong></td>
	    <td><input type="text" name="{g->formVar var="form[custAddress1]"}" value="{if isset($form.custAddress1)}{$form.custAddress1}{/if}" size="30"></td>
	  </tr>
	  <tr>
	    <td align="right"><strong>Street Name:</strong></td>
	    <td><input type="text" name="{g->formVar var="form[custAddress2]"}" value="{if isset($form.custAddress2)}{$form.custAddress2}{/if}" size="30"></td>
	  </tr>
	  <tr>
	    <td align="right"><strong>Area:</strong></td>
	    <td><input type="text" name="{g->formVar var="form[custAddress3]"}" value="{if isset($form.custAddress3)}{$form.custAddress3}{/if}" size="30"></td>
	  </tr>
	  <tr>
	    <td align="right"><strong>City:</strong></td>
	    <td><input type="text" name="{g->formVar var="form[custAddress4]"}" value="{if isset($form.custAddress4)}{$form.custAddress4}{/if}" size="30"></td>
	  </tr>
	  <tr>
	    <td align="right"><strong>County:</strong></td>
	    <td><input type="text" name="{g->formVar var="form[custAddress5]"}" value="{if isset($form.custAddress5)}{$form.custAddress5}{/if}" size="30"></td>
	  </tr>
	  <tr>
	    <td align="right"><strong>Postcode:</strong></td>
	    <td><input type="text" name="{g->formVar var="form[custZip]"}" value="{if isset($form.custZip)}{$form.custZip}{/if}" size="20"></td>
	  </tr>
	  <tr>
	    <td align="right"><strong>Country:</strong></td>
	    <td>United Kingdom</td>
	  </tr>
	  <tr>
	    <td><br><br><br><br></td>
	    <td><br><br><br><br></td>
	  </tr>
	  <tr>
	    <td></td>
	    <td>
<input type="submit" name="{g->formVar var="form[action][process]"}" value="Continue" />
	    </td>
	  </tr>
	</table>
  <br>

  <input type="hidden" name="{g->formVar var="form[pay_to_email]"}" value="{if isset($form.pay_to_email)}{$form.pay_to_email}{/if}"><br>
  <input type="hidden" name="{g->formVar var="form[transaction_id]"}" value="{if isset($form.transaction_id)}{$form.transaction_id}{/if}"><br>
  <input type="hidden" name="{g->formVar var="form[return_url]"}" value="{if isset($form.return_url)}{$form.return_url}{/if}"><br>
  <input type="hidden" name="{g->formVar var="form[cancel_url]"}" value="{if isset($form.cancel_url)}{$form.cancel_url}{/if}"><br>
  <input type="hidden" name="{g->formVar var="form[status_url]"}" value="{if isset($form.status_url)}{$form.status_url}{/if}"><br>
  <input type="hidden" name="{g->formVar var="form[amount]"}" value="{if isset($form.amount)}{$form.amount}{/if}"><br>
  <input type="hidden" name="{g->formVar var="form[detail1_description]"}" value="{if isset($form.detail1_description)}{$form.detail1_description}{/if}"><br>
  <input type="hidden" name="{g->formVar var="form[detail1_text]"}" value="{if isset($form.detail1_text)}{$form.detail1_text}{/if}"><br>
  
</form>