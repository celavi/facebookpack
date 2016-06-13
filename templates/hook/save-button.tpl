<!-- Save button -->
<div style="padding-bottom: 5px;" class="fb-save" 
	{if $FbPack.saveButtonUrl}
	data-uri="{$FbPack.saveButtonUrl}"
	{else}
	data-uri="{$come_from}"
	{/if}
	data-size="{$FbPack.saveButtonSize}">
</div>