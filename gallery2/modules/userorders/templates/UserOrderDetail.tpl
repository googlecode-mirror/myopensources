{g->callback type="checkout.transactionCustomerDetails" transactionId=$form.transactionId}

{* include cart contents *}
{include file='gallery:modules/checkout/templates/TransactionContents.tpl'}

{*plugins*}
{foreach from=$statusPlugins item=plugin}
  {include file="gallery:`$plugin.statusPageTemplate`" l10Domain=$plugin.l10Domain}
{/foreach}

<input type="hidden" name="{g->formVar var="form[page]"}" value="{$pageDetails.page}">
<input type="hidden" name="{g->formVar var="form[transactionId]"}" value="{$transactionId}">
{if $allow_delete }
<input type="submit" class="inputTypeSubmit" name="{g->formVar var="form[action][deleteOrder]"}" value="{g->text text="Delete"}"/>
{/if}
