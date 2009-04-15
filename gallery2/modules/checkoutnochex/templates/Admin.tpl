{*
 * $Revision: 1.1.2 $
 * If you want to customize this file, do not edit it directly since future upgrades
 * may overwrite it.  Instead, copy it into a new directory called "local" and edit that
 * version.  Gallery will look for that file first and use it if it exists.
 *}
<div id="gsAdminContents">
  <div class="gbTopFlag">
    <div class="gbTitle">
      <h1 class="giTitle">
	{g->text text="Settings For CheckoutNoChex Module"}
      </h1>
    </div>
  </div>
 <br>

  <div class="gbAdmin">
    <div class="gbDataEntry">
    {g->text text="You must be registered as a seller or merchant at <a href=http://www.moneybookers.com>NoChex.com</a> to use this module"}<br><br><br><br>
      <h3 class="giTitle">
        {g->text text="Link to logo for NoChex Customisation"}<br>
      </h3>
      <input type="text" name="{g->formVar var="form[gendesc]"}" value="{$form.gendesc}" size="50"><br><br>
      <h3 class="giTitle">
        {g->text text="Generic Details of Items Sold"}<br>
      </h3>
        {g->text text="Mandatory. Default will be used if unspecified"}<br>
      <input type="text" name="{g->formVar var="form[gendet]"}" value="{$form.gendet}" size="50"><br><br>
      <h3 class="giTitle">
	{g->text text="Registered Email Address at NoChex"}
      </h3>
        {g->text text="Mandatory. Default will be used if unspecified"}<br>
      <input type="text" name="{g->formVar var="form[nochexname]"}" value="{$form.nochexname}" size="50">
      <br><br>
    </div>
  </div>
  <div class="gbAdmin">
    <div class="gbDataEntry">
      <h3 class="giTitle">
        {g->text text="Email Address To Send Gallery Auto Confirmation From"}
      </h3>
        {g->text text="This address will appear on emails sent from the gallery"}<br>
        {g->text text="This mail is in addition to that from NoChex"}<br>
      <input type="text" name="{g->formVar var="form[fromAddress]"}" value="{$form.fromAddress}" size="50">
      <br><br>
      <h3 class="giTitle">
        {g->text text="Subject Line For Gallery Auto Confirmation Emails"}
      </h3>
        {g->text text="Choose a subject for auto emails"}<br>
      <input type="text" name="{g->formVar var="form[subject]"}" value="{$form.subject}" size="50">
      <br><br><br>
      <h3 class="giTitle">
        {g->text text="Specify Recipients And Information To Include In Gallery Order Notifications"}<br>
      </h3>
        {g->text text="Use the template address customer@gallery to send mail to the customer's address."}<br>
        {g->text text="Due to the way emails are generated, it may be advisable not to send an Auto Email to the customer's address."}<br>
        {g->text text="I recommended having one sent to you without the fullsize link & forward this to the customer after transaction confirmation by NoChex."}<br>
        {g->text text="A better solution will be investigated for Version 2.0 or 3.0 of this module which is currently at Version 0.x & about to move to 1.0."}<br><br>
      <table cellspacing="5">
        <tr>
	  <th>Email Address</th>
	  <th>Customer and Delivery information</th>
	  <th>Thumbnails</th>
	  <th>Links to original images</th>
	</tr>
        {section name=x loop=$form.toAddress}
	  <tr>
	    <td><input type="text" name="{g->formVar var="form[toAddress][`$smarty.section.x.index`]"}" value="{$form.toAddress[x]}" size="50"></td>
	    <td align="center"><input type="checkbox" name="{g->formVar var="form[showCustomer][`$smarty.section.x.index`]"}"{if $form.showCustomer[x]} checked{/if}></td>
	    <td align="center"><input type="checkbox" name="{g->formVar var="form[showThumbs][`$smarty.section.x.index`]"}"{if $form.showThumbs[x]} checked{/if}></td>
	    <td align="center"><input type="checkbox" name="{g->formVar var="form[showLinks][`$smarty.section.x.index`]"}"{if $form.showLinks[x]} checked{/if}></td>
	  </tr>
	{/section}
      </table>
    </div>
  </div>

  <br><br>
  
  <div class="gbButtons">
    <input type="submit" name="{g->formVar var="form[action][save]"}"
     value="{g->text text="Save Settings"}"/>
    <input type="submit" name="{g->formVar var="form[action][cancel]"}"
     value="{g->text text="Cancel"}"/>
  </div>

  {if !empty($status)}
    {if isset($status.saved)}
    <div id="gsStatus">
    <div class="giStatus">
      {g->text text="Settings Saved"}
    </div>
    </div>
    {/if}
  {/if}

</div>

