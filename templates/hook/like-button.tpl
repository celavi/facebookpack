<!-- Like button -->
<div class="fb-like"
    {if $fbPlugin.likeButtonUrl}data-href="{$fbPlugin.likeButtonUrl}"{/if}
    {if $fbPlugin.likeButtonLayout eq "standard"}data-width="{$fbPlugin.likeButtonWidth}"{/if}
    data-layout="{$fbPlugin.likeButtonLayout}"
    data-action="{$fbPlugin.likeButtonAction}"
    data-show-faces="{$fbPlugin.likeButtonFaces}"
    data-share="{$fbPlugin.likeButtonShare}"
    data-colorscheme="{$fbPlugin.likeButtonColorscheme}">
</div>
