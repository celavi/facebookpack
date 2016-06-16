<div id="idTabFBComments">
	<div class="fb-comments"
		{if $FbPack.commentsPluginUrl}
		data-href="{$FbPack.commentsPluginUrl}"
		{else}
		data-href="{$come_from}"
		{/if}
		data-width="{$FbPack.commentsPluginWidth}"
		data-numposts="{$FbPack.commentsPluginNumPosts}"
		data-colorscheme="{$FbPack.commentsPluginColorscheme}">
	</div>
</div>