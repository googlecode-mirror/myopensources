{*
 * $Revision: 15342 $
 * If you want to customize this file, do not edit it directly since future upgrades
 * may overwrite it.  Instead, copy it into a new directory called "local" and edit that
 * version.  Gallery will look for that file first and use it if it exists.
 *}
<div class="gbBlock gcBackground1">
  <h2> {g->text text="User Profile Data"} </h2>
</div>


<div class="gbBlock">
  {if !empty($status.saved)}
    <h2 class="giSuccess">
    {g->text text="Changes Saved Successfully"}
    </h2>
  {/if}

  {if !empty($form.fields)}
  <table class="gbDataTable">
  {foreach from=$form.fields key=idx item=af}
    <tr><td>{$af.field}</td><td>
      <input type="hidden"
       name="{g->formVar var="form[fields][$idx][field]"}" value="{$af.field}"/>
    
    {if !empty($af.choices)}
      <select name="{g->formVar var="form[fields][$idx][value]"}">
    	  <option value="">&laquo; {g->text text="No Value"} &raquo;</option>
	      {foreach from=$af.choices item=choice}
          <option {if $choice==$af.value} selected="selected"{/if}>{$choice}</option>
        {/foreach}
      </select>
    {elseif ($af.height == 1)}
      <input type="text" size="{$af.width}"
       name="{g->formVar var="form[fields][$idx][value]"}" value="{$af.value}"/>
    {else}
      <textarea rows="{$af.height}" cols="{$af.width}"
        name="{g->formVar var="form[fields][$idx][value]"}">{$af.value}</textarea>
    {/if}
    </td></tr>
  {/foreach}
  </table>
  {/if}
</div>

{if !empty($form.fields)}
<div class="gbBlock gcBackground1">
  <input type="submit" class="inputTypeSubmit"
   name="{g->formVar var="form[action][save]"}" value="{g->text text="Save"}"/>
  <input type="submit" class="inputTypeSubmit"
   name="{g->formVar var="form[action][reset]"}" value="{g->text text="Reset"}"/>
</div>
{/if}
