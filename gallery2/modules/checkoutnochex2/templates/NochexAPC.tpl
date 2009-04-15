{*
 * $Revision:  $
 * Read this before changing templates!  http://codex.gallery2.org/Gallery2:Editing_Templates
 *}
<div class="gbBlock gcBackground1">
  <h2 class="gbTitle">
    {g->text text="PayPal"}::{g->text text="Payment Complete"}
  </h2>
</div>
Variables $APCpost : {foreach from=$APCpost key=k item=v}{$k}:{$v} {/foreach}<br>
$ncTransaction : {foreach from=$ncTransaction item=APCvariable}{$APCvariable}{/foreach}<br>
$IPNverified : {$APCverified}<br>
<p><strong>Automated Response</strong></p>
<p>PayPal IPN page, not seen by public</p>