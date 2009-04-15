{*
 * $Revision: 1.1.0 $
 * If you want to customize this file, do not edit it directly since future upgrades
 * may overwrite it.  Instead, copy it into a new directory called "local" and edit that
 * version.  Gallery will look for that file first and use it if it exists.
 *}


        <div class="gbBlock gcBackground1">
          <h2 class="gbTitle">
            {g->text text="Checkout"}::{g->text text="Review Details"}
          </h2>
        </div>
<form action="https://secure.nochex.com/" method=post>
  <p>Please review the information entered</p>

	<table cellspacing="5">
	  <tr>
	    <td align="right"><strong>First Name:</strong></td>
	    <td>{$form.custFirstName}</td>
	  </tr>
	  <tr>
	    <td align="right"><strong>Last Name:</strong></td>
	    <td>{$form.custLastName}</td>
	  </tr>
	  <tr>
	    <td align="right"><strong>Email:</strong></td>
	    <td>{$form.custEmail}</td>
	  </tr>
	  <tr>
	    <td align="right"><strong>House Number:</strong></td>
	    <td>{$form.custAddress1}</td>
	  </tr>
	  <tr>
	    <td align="right"><strong>Street Name:</strong></td>
	    <td>{$form.custAddress2}</td>
	  </tr>
	  <tr>
	    <td align="right"><strong>Area:</strong></td>
	    <td>{$form.custAddress3}</td>
	  </tr>
	  <tr>
	    <td align="right"><strong>Town:</strong></td>
	    <td>{$form.custAddress4}</td>
	  </tr>
	  <tr>
	    <td align="right"><strong>County:</strong></td>
	    <td>{$form.custAddress5}</td>
	  </tr>
	  <tr>
	    <td align="right"><strong>Postcode:</strong></td>
	    <td>{$form.custZip}</td>
	  </tr>
	  <tr>
	    <td align="right"><strong>Country:</strong></td>
	    <td>{$form.custCountry}</td>
	  </tr>
	</table>
<br>
	<table>
  <input type="hidden" name="order_id" value="{$form.transaction_id}"/>
  <input type="hidden" name="billing_fullname" value="{$form.custFirstName}, {$form.custLastName}"/>
  <input type="hidden" name="lastname" value="{$form.custLastName}"/>
  <input type="hidden" name="billing_address" value="{$form.custAddress1}, {$form.custAddress2}, {$form.custAddress3}"/><br>
  <input type="hidden" name="town" value="{$form.custAddress4}"/>
  <input type="hidden" name="county" value="{$form.custAddress5}"/>
  <input type="hidden" name="billing_postcode" value="{$form.custZip}"/>
  <input type="hidden" name="email_address" value="{$form.custEmail}"/>
  <input type="hidden" name="description" value="{$form.detail1_text}"/>
  <input type="hidden" name="amount" value="{$form.amount}"/>
  <input type="hidden" name="merchant_id" value="{$form.pay_to_email}"/>
  <input type="hidden" name="returnurl" value="{$form.return_url}"/>
  <input type="hidden" name="cancelurl" value="{$form.cancel_url}"/>
  <input type="hidden" name="status_url" value="{$form.status_url}"/>
  <input type="hidden" name="logo" value="{$form.detail1_description}"/>
  <br>
 <input type="submit" name="submit" value="Continue" />
</form>
