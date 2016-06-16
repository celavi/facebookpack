<li>
	{if $FbPack.commentsPluginUrl}
	<a id="facebook_social_plugins_comments" href="#idTabFBComments">{l s='Comments' mod='facebooksocialplugins'} (<span class="fb-comments-count" data-href="{$FbPack.commentsPluginUrl}"></span>)</a>
	{else}
	<a id="facebook_social_plugins_comments" href="#idTabFBComments">{l s='Comments' mod='facebooksocialplugins'} (<span class="fb-comments-count" data-href="{$come_from}"></span>)</a>
	{/if}
</li>
