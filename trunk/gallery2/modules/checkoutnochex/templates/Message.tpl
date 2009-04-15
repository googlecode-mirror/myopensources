--{$boundary}
Content-Type: text/plain; charset=utf-8
Content-Transfer-Encoding: 8bit

{if $showCustomer}
      {g->text text="Customer"}: {$custFirstName} {$custLastName}
         {g->text text="Email"}: <{$custEmail}>
  {g->text text="House Number"}: {$custAddress1}
   {g->text text="Street Name"}: {$custAddress2}
          {g->text text="Area"}: {$custAddress3}
          {g->text text="City"}: {$custAddress4}
         {g->text text="State"}: {$custAddress5}
      {g->text text="Postcode"}: {$custZip}
       {g->text text="Country"}: {$custCountry}

{/if}

{foreach from=$items item=item}
=========================
{if $showLinks}
<{g->url arg1="view=core.ShowItem" arg2="itemId=`$item.id`" forceFullUrl=true}>
{/if}
   {g->text text="Title"}: {$item.title|markup}
     {g->text text="Ref"}: {$item.pathComponent}
 {g->text text="Summary"}: {$item.summary|markup}
{section name=x loop=$product}
{if isset($item.quant[x]) }
     {g->text text="Qty"}: {$item.quant[x]} {g->text text="of"} {$product[x]} [{$csymbol}{if isset($item.itemPrices[x])}{$item.itemPrices[x]}{else}{$tpl.price[x]}{/if} {g->text text="each"}]
{/if}
{/section}
{if $item.paper != ""}
   {g->text text="Paper"}: {$item.paper}
{/if}
{g->text text="Subtotal"}: {$csymbol}{$item.subtotal}]
{/foreach}
=========================

{g->text text="Postage and Packing"}: {$csymbol}{$postage}
              {g->text text="Total"}: {$csymbol}{$total}

--{$boundary}
Content-Type: text/html; charset=utf-8
Content-Transfer-Encoding: 8bit

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Order information</title>
  </head>
  
<body>
<p>The following order has been selected for processing by NoChex</p>
<p>This email is for record purposes only and does not represent a confirmation of completion of the transaction</p>


<table cellspacing="5">
  <tr>
    <td align="right"><strong>{g->text text="Transaction ID"}:</strong></td>
    <td>{$transactionId}</td>
  </tr>
{if $showCustomer}
  <tr>
    <td align="right"><strong>{g->text text="Name"}:</strong></td>
    <td>{$custFirstName} {$custLastName}</td>
  </tr>
  <tr>
    <td align="right"><strong>{g->text text="Email"}:</strong></td>
    <td>{$custEmail}</td>
  </tr>
  <tr>
    <td align="right"><strong>{g->text text="Address"}:</strong></td>
    <td>{$custAddress1}, {$custAddress2}</td>
  </tr>
  <tr>
    <td></td>
    <td>{$custAddress3}, {$custAddress4}</td>
  </tr>
  <tr>
    <td align="right"><strong>{g->text text="Province"}:</strong></td>
    <td>{$custAddress5}</td>
  </tr>
  <tr>
    <td align="right"><strong>{g->text text="Postcode"}:</strong></td>
    <td>{$custZip}</td>
  </tr>
  <tr>
    <td align="right"><strong>{g->text text="Country"}:</strong></td>
    <td>{$custCountry}</td>
  </tr>
{/if}
</table>


<table cellspacing="5">
  <tr>
    <th>{g->text text="Photo"}</th>
    <th>{g->text text="Info"}</th>
    <th>{g->text text="Product"} | {g->text text="Price"} | {g->text text="Quantity"}</th>
    {if $paper[0] != ""}
      <th>{g->text text="Paper"}</th>
    {/if}
    <th>{g->text text="Subtotal"}</th>
  </tr>
  <tr>
    {foreach from=$items item=item}
      <tr>
        {if $showThumbs}
          <td>
  	    {if $showLinks}
	      <a href="{g->url arg1="view=core.ShowItem" arg2="itemId=`$item.id`"} forceFullUrl=true">
	    {/if}
            {if isset($thumbnails[$item.id])}
              {g->image item=$items[$item.id] image=$thumbnails[$item.id] maxSize=150 forceFullUrl=true}
            {else}
              {g->text text="No thumbnail"}
            {/if}
  	    {if $showLinks}
	      </a>
	    {/if}
          </td>
	{else}
	  <td>
	    {if $showLinks}
	      <a href="{g->url arg1="view=core.ShowItem" arg2="itemId=`$item.id`" forceFullUrl=true}">{$item.pathComponent}</a>
	    {else}
	      {$item.pathComponent}
	    {/if}
	  </td>
	{/if}
	<td align="top">
	  <strong>{g->text text="Title"}:</strong> 
	  {$item.title|markup}<br>
	  <strong>{g->text text="Summary"}:</strong> 
	  {$item.summary|markup}
	</td> 
	<td>
	  <table cellspacing="0" cellpadding="10" border="1" bordercolor="#999999">
	    {section name=x loop=$product}
	      {if isset($item.quant[x]) }
	        <tr>
	          <td><center>{$product[x]}</td>
	          <td><center>{$csymbol}{if isset($item.itemPrices[x])}{$item.itemPrices[x]}{else}{$price[x]}{/if}</td>
	          <td><center><b>{$item.quant[x]}</td>
	        </tr>
	      {/if}
	    {/section}      	    		
	  </table>
	</td>
	{if $item.paper != ""}
	  <td>    	  		
	    {$item.paper}
	  </td>
	{/if}
	<td align="right"><strong>{$csymbol}{$item.subtotal}</strong></td>
      </tr>
    {/foreach} 
    <tr>
      {if $paper[0] !=""}
	<td colspan="4" align="right">{g->text text="Postage and Packing"}:</td>
      {else}
	<td colspan="3" align="right">{g->text text="Postage and Packing"}:</td>
      {/if}
      <td align="right"><b>{$csymbol}{$postage}</b></td>
    </tr>
    <tr>
      {if $paper[0] !=""}
        <td colspan="4" align="right"><strong>{g->text text="Total"}:</strong></td>
      {else}
        <td colspan="3" align="right"><strong>{g->text text="Total"}:</strong></td>
      {/if}
      <td align="right"><strong>{$csymbol}{$total}</strong></td>
    </tr>
  </tr>
</table>
</body>
</html>

--{$boundary}--
