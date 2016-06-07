<!-- Like button -->
<div class="fb-like"
    {if $FbPack.likeButtonUrl}data-href="{$FbPack.likeButtonUrl}"{/if}
    {if $FbPack.likeButtonLayout eq "standard"}data-width="{$FbPack.likeButtonWidth}"{/if}
    data-layout="{$FbPack.likeButtonLayout}"
    data-action="{$FbPack.likeButtonAction}"
    data-show-faces="{$FbPack.likeButtonFaces}"
    data-share="{$FbPack.likeButtonShare}"
    data-colorscheme="{$FbPack.likeButtonColorscheme}">
</div>
