<!-- templates/content/intex.tpl -->
<h2>{$displayName}</h2>
{if isset($pluginSettingsUpdated)}
<div class="conf confirm"><img src="../img/admin/ok.gif" alt="{$common.settingsUpdated}" /> {$common.settingsUpdated}</div>
{/if}
<!-- errors -->
{if isset($errors)}
	{foreach $errors as $error}
		<div class="alert error">{$error}</div>
	{/foreach}
{/if}
<!-- social -->
<img src="{$path}images/social_plugins.jpg" style="float:left; margin-right:15px;"><b>{$common.socialTitle}</b>
<br />
<br /> {$common.socialDescriptionCommon}
<br /> {$common.socialDescriptionPlugins}
<br clear="all" />
<br />
<!-- Donate -->
{include file='./donate.tpl'}
<br />
<!-- Localization and Translation -->
{include file='./localization.tpl'}
<br />
<!-- like button -->
{include file='./like-button.tpl'}
<br />
<!-- save button -->
{include file='./save-button.tpl'}
<br />
<!-- share button -->
{include file='./share-button.tpl'}
<br />
<!-- page plugin -->
{include file='./page-plugin.tpl'}
<br />
<!-- comments plugin -->
{include file='./comments-plugin.tpl'}