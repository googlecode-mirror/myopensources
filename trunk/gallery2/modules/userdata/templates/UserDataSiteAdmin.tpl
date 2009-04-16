{*
 * $Revision: 15342 $
 * If you want to customize this file, do not edit it directly since future upgrades
 * may overwrite it.  Instead, copy it into a new directory called "local" and edit that
 * version.  Gallery will look for that file first and use it if it exists.
 *}
<div class="gbBlock gcBackground1">
  <h2> {g->text text="User Profile Data Fields"} </h2>
</div>

{* variables used for editing *}
  <input type="hidden" name="{g->formVar var="form[opField]"}" value="{g->text text="XXX"}" id="opField"/>
  <input type="hidden" name="{g->formVar var="form[opWidth]"}" value="{g->text text="XXX"}" id="opWidth"/>
  <input type="hidden" name="{g->formVar var="form[opHeight]"}" value="{g->text text="XXX"}" id="opHeight"/>


<script type="text/javascript">{literal}
// <![CDATA[
function swap(j,k) {
 var tf,ts,td,ti,tid;
 tf = document.getElementById(k).innerHTML;
 tw = document.getElementById('w.'+k).value;
 th = document.getElementById('h.'+k).value;
 ti = document.getElementById('i.'+k).value;
 document.getElementById(k).innerHTML = document.getElementById(j).innerHTML;
 document.getElementById('w.'+k).value = document.getElementById('w.'+j).value;
 document.getElementById('h.'+k).value = document.getElementById('h.'+j).value;
 document.getElementById('i.'+k).value = document.getElementById('i.'+j).value;
 document.getElementById(j).innerHTML = tf;
 document.getElementById('w.'+j).value = tw;
 document.getElementById('h.'+j).value = th;
 document.getElementById('i.'+j).value = ti;
}
function up(j) { swap(j,j-1); }
function down(j) { swap(j,j+1); }


var pickdata = new Array();
{/literal}
{counter start=-1 print=no}
  {foreach from=$form.fields item=item}
  pickdata[{counter}] = '{foreach from=$item.choices item=choice}{$choice}\n{/foreach}';
  {assign var="nonempty" value="1"}
  {/foreach}
{literal}
function pickfield(s) {
 document.getElementById('pick').value = pickdata[s.selectedIndex];
}
// ]]>
{/literal}</script>

{if !empty($status)}
<div class="gbBlock"><h2 class="giSuccess">
  {if isset($status.saved)}
    {g->text text="Display settings saved successfully"}
  {/if}
  {if isset($status.added)}
    {g->text text="New field added successfully"}
  {/if}
  {if isset($status.moved)}
    {g->text text="Field moved successfully"}
  {/if}
  {if isset($status.removed)}
    {g->text text="Field removed successfully"}
  {/if}
  {if isset($status.picklist)}
    {g->text text="Picklist updated successfully"}
  {/if}
    {if isset($status.changed)}
    {g->text text="Field changed successfully"}
  {/if}
    {if isset($status.error.duplicate)}
    <span class="giError"> {g->text text="Field name already in use"} </span>
  {/if}
  {if isset($status.error.empty)}
    <span class="giError"> {g->text text="Field name cannot be empty"} </span>
  {/if}
</h2></div>
{/if}

<div class="gbBlock">
  <h3> {g->text text="Display"} </h3>
  <p class="giDescription">
    {g->text text="Set the display order and sizes of the fields below."}
  </p>

  <table class="gbDataTable">
    <tr>
      <th>{g->text text="User Profile Data Fields"}</th>
    </tr><tr style="vertical-align:top">
    <td>
      <table class="gbDataTable"><tr>
	<th> {g->text text="Field"} </th>
	<th> {g->text text="Width"} </th>
	<th> {g->text text="Height"} </th>
	<th> {g->text text="Operation"} </th>
	<th colspan="2"> {g->text text="Order"} </th>
      </tr>
      {foreach from=$form.fields key=idx item=item}
      <tr class="{cycle name=$key values=$rowclass}">
	<td style="white-space: nowrap">
	  <span id="{$idx}">{$form.fields.$idx.field}</span>
	  <input type="hidden" id="i.{$idx}"
	   name="{g->formVar var="form[index][$idx]"}" value="{$idx}"/>
	</td><td style="text-align: center">
	   <input type="text" size="3" id="w.{$idx}" value="{$form.fields.$idx.width}"
	    name="{g->formVar var="form[width][$idx]"}"/>
	</td><td style="text-align: center">
	   <input type="text" size="3" id="h.{$idx}" value="{$form.fields.$idx.height}"
	    name="{g->formVar var="form[height][$idx]"}"/>
	</td><td>
	<input type="submit" class="inputTypeSubmit"
   onclick="document.getElementById('opField').value = '{$item.field}';"
	 name="{g->formVar var="form[action][remove]"}" value="{g->text text="Remove"}"/>
	<input type="submit" class="inputTypeSubmit"
   onclick="
      document.getElementById('opField').value = '{$item.field}';
      document.getElementById('opWidth').value = document.getElementById('w.'+{$idx}).value;
      document.getElementById('opHeight').value = document.getElementById('h.'+{$idx}).value;"
	 name="{g->formVar var="form[action][change]"}" value="{g->text text="Change"}"/>
	</td><td>
	  {if $idx > 0}
	    <a href="" onclick="up({$idx});this.blur();return false"
	     style="padding:0 2px"> {g->text text="up"} </a>
	  {/if}
	</td><td>
	  {if ($idx < count($form.fields)-1)}
	    <a href="" onclick="down({$idx});this.blur();return false"
	     style="padding:0 2px"> {g->text text="down"} </a>
	  {/if}
	</td>
      </tr>
      {/foreach}
      {* add here the add button *}
      <tr><th colspan="4">{g->text text="New field"}</th></tr>
      <td>
      	<input type="text" size="20" name="{g->formVar var="form[newField]"}" value="New Field"/>
      </td><td>
        <input type="text" size="3" name="{g->formVar var="form[newWidth]"}" value="20"/>
      </td><td>
        <input type="text" size="3" name="{g->formVar var="form[newHeight]"}" value="1"/>
      </td><td>
       	<input type="submit" class="inputTypeSubmit"
	      name="{g->formVar var="form[action][add]"}" value="{g->text text="Add"}"/>
      </td>
      <tr>
      </tr
      
      </table>
    </td>
  </tr></table>
</div>

<div class="gbBlock gcBackground1">
  <input type="submit" class="inputTypeSubmit"
   name="{g->formVar var="form[action][save]"}" value="{g->text text="Save"}"/>
  <input type="submit" class="inputTypeSubmit"
   name="{g->formVar var="form[action][reset]"}" value="{g->text text="Reset"}"/>
</div>


<div class="gbBlock">
  <h3> {g->text text="Picklist Values"} </h3>
  <p class="giDescription">
    {g->text text="This module allows freeform text entry by default. Enter values below to restrict field values to a specific list of choices. Enter one choice per line. Remove all choices to return to freeform text. Note that existing field values will not be changed or deleted when a picklist is added."}
  </p>

  {if isset($nonempty)}
  <table class="gbDataTable"><tr>
    <td> {g->text text="Field:"} </td>
    <td> <select name="{g->formVar var="form[pickField]"}" id="picksel"
		 onchange="pickfield(this);this.blur()">
	{foreach from=$form.fields item=item}<option>{$item.field}</option>{/foreach}
      </select>
    </td>
  </tr><tr>
    <td> {g->text text="Choices:"} </td>
    <td>
      <textarea id="pick" name="{g->formVar var="form[picklist]"}" cols="40" rows="4"></textarea>
    </td>
  </tr></table>
  <script type="text/javascript">
    // <![CDATA[
    if (pickdata.length>0) pickfield(document.getElementById('picksel'));
    // ]]>
  </script>
  {else}
    <p class="giInfo"> {g->text text="Add a field above to enable this section."} </p>
  {/if}
</div>

<div class="gbBlock gcBackground1">
  <input type="submit" class="inputTypeSubmit"
   name="{g->formVar var="form[action][picklist]"}" value="{g->text text="Save"}"/>
  <input type="submit" class="inputTypeSubmit"
   name="{g->formVar var="form[action][reset]"}" value="{g->text text="Reset"}"/>
</div>


