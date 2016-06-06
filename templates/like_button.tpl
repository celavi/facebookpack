<!-- Like button -->
<div class="fb-like"
    {if $fbPack_like_url}data-href="{$fbPack_like_url}"{/if}
    {if $fbPack_like_layout eq "standard"}data-width="{$fbPack_like_width}"{/if}
    data-layout="{$fbPack_like_layout}"
    data-action="{$fbPack_like_action}"
    data-show-faces="{$fbPack_like_faces}"
    data-share="{$fbPack_like_share}"
    data-colorscheme="{$fbPack_like_colorscheme}">
</div>