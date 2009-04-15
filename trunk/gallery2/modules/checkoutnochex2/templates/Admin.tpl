{*
 * $Revision:  $
 * Read this before changing templates!  http://codex.gallery2.org/Gallery2:Editing_Templates
 *}
 <div class="gbBlock gcBackground1">
  <h2>{g->text text="Checkout Nochex Settings"}</h2>
</div>


{if  isset($status.saved)}
<div class="gbBlock"><h2 class="giSuccess">
    {g->text text="Settings saved successfully"} <br/>
</h2></div>
{/if}
<div class="gbBlock">
        <h3>
	{g->text text="Activate"}
        </h3>
	<p class="giDescription">
	{g->text text="Activate this method of payment?"}
	</p>
	<input type="radio" name="{g->formVar var="form[active]"}" value="1" {if $form.active}checked{/if}>{g->text text="Yes"}<br>
	<input type="radio" name="{g->formVar var="form[active]"}" value="0" {if !$form.active}checked{/if}>{g->text text="No"}<br>
</div>
<div class="gbBlock">
       <h3>
	{g->text text="Nochex Merchant Id"}
      </h3>
      <p class="giDescription">
	{g->text text="This is your Nochex account identifier. If you get this wrong, someone else will get the money!"}
      </p>
      <input type="text" size="50" name="{g->formVar var="form[ncMerchantId]"}" value="{$form.ncMerchantId}">
</div>
<div class="gbBlock">
       <h3>
	{g->text text="Account Type"}
      </h3>
      <p class="giDescription">
	{g->text text="Seller (basic) accounts permit transactions up to &pound;100. Merchant accounts permit transactions up to &pound;1000 as well as additional customisation options."}
	{g->text text="Nochex will not appear as a checkout option if the transaction value exceeds the applicable limit."}
      </p>
      <input type="radio" name="{g->formVar var="form[ncAccountType]"}" value="seller" {if $form.ncAccountType!='merchant'} checked{/if}> Seller<br>
      <input type="radio" name="{g->formVar var="form[ncAccountType]"}" value="merchant" {if $form.ncAccountType=='merchant'} checked{/if}> Merchant<br>
</div>
<div class="gbBlock">
      <h3>
	{g->text text="Nochex Operating Mode"}
       </h3>
       <p class="giDescription">
	{g->text text="Live mode charges actual funds, and credits them to your account. Test mode is for test purposes only, and is only available for Merchant accounts."}
      </p>
      <select name="{g->formVar var="form[ncMode]"}">
        <option value="100"{if $form.ncMode=='100'} selected{/if}>{g->text text="Test"} ({g->text text="no real transactions can occur"})</option>
        <option value="live"{if $form.ncMode=='live'} selected{/if}>{g->text text="Live"}</option>
      </select>
</div>
<div class="gbBlock">
      <h3>
	{g->text text="Order Description"}
       </h3>
       <p class="giDescription">
	{g->text text="A brief phrase describing the order (eg 'photography') to appear on Nochex documents and pages."}
      </p>
      <input type="text" size="50" name="{g->formVar var="form[ncDescription]"}" value="{$form.ncDescription}">
</div>
<div class="gbBlock gcBackground1">
    <input type="submit" class="inputTypeSubmit" name="{g->formVar var="form[action][save]"}"
     value="{g->text text="Save Settings"}"/>
    <input type="submit" class="inputTypeSubmit" name="{g->formVar var="form[action][cancel]"}"
     value="{g->text text="Cancel"}"/>
  </div>

