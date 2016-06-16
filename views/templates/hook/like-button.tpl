<!-- Like button -->
<div style="padding-bottom: 5px;" class="fb-like"
    {if $FbPack.likeButtonUrl}
	data-href="{$FbPack.likeButtonUrl}"
	{else}
	data-href="{$come_from}"
	{/if}
    {if $FbPack.likeButtonLayout eq "standard"}
	data-width="{$FbPack.likeButtonWidth}"
	{/if}
    data-layout="{$FbPack.likeButtonLayout}"
    data-action="{$FbPack.likeButtonAction}"
    data-show-faces="{$FbPack.likeButtonFaces}"
    data-share="{$FbPack.likeButtonShare}"
    data-colorscheme="{$FbPack.likeButtonColorscheme}">
</div>