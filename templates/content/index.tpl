<!-- templates/content/intex.tpl -->
<h2>{$displayName}</h2>
{if $pluginSettingsUpdated}
<div class="conf confirm"><img src="../img/admin/ok.gif" alt="{$common.settingsUpdated}" /> {$common.settingsUpdated}</div>
{/if}
<!-- errors -->
{foreach $errors as $error}
    <div class="alert error">{$error}</div>
{/foreach}
<!-- social -->
<img src="{$path}images/social_plugins.jpg" style="float:left; margin-right:15px;"><b>{$common.socialTitle}</b>
<br />
<br /> {$common.socialDescriptionCommon}
<br /> {$common.socialDescriptionSimple}
<br /> {$common.socialDescriptionComplex}
<br clear="all" />
<br />
<!-- like button -->
{include file='./like-button.tpl'}
