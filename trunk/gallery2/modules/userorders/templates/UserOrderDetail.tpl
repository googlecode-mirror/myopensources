{* include cart contents *}
{include file='gallery:modules/checkout/templates/TransactionContents.tpl'}

{*plugins*}
{foreach from=$statusPlugins item=plugin}
  {include file="gallery:`$plugin.statusPageTemplate`" l10Domain=$plugin.l10Domain}
{/foreach}
