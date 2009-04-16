    <table class="gbDataTable">
    <tr>
	    <th>{g->text text="date"}</th>
	    <th>{g->text text="fullName"}</th>
	    <th>{g->text text="recipientName"}</th>
    </tr>
    {foreach from=$order_list key=idx item=itm}
       <tr class="{cycle values="gbEven,gbOdd"}">
       <td>{g->date timestamp=$itm.date}</td>
       <td>{$itm.first_name}</td>
       <td>{$itm.recipient_name}</td>
       </tr>
    {/foreach}
    </table> 
