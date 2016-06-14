<!-- Share button -->
<div style="padding-bottom: 5px;" class="fb-share-button"
	{if $FbPack.shareButtonUrl}
	data-href="{$FbPack.shareButtonUrl}"
	{else}
	data-href="{$come_from}"
	{/if}
	data-layout="{$FbPack.shareButtonLayout}" 
	data-mobile-iframe="{$FbPack.shareButtonMobile}">
	{if $FbPack.shareButtonUrl}
	<a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={$FbPack.shareButtonUrl|escape:'url'}&amp;src=sdkpreparse">{$FbPack.shareButtonShare}</a>
	{else}
	<a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={$come_from|escape:'url'}&amp;src=sdkpreparse">{$FbPack.shareButtonShare}</a>
	{/if}
</div>