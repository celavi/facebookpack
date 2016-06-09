<!-- templates/content/localization.tpl -->
<form action="{$smarty.server.REQUEST_URI}" method="post">
    <fieldset class="width3" style="width:850px">
		<legend><img src="{$path}images/fb.png" />{$common.localizationAndTranslation}</legend>
		<label>{$common.localizationLabel}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="fbPack-locale" value="{$common.localization}" placeholder="{$common.localizationPlaceholder}" />
            <p class="clear">{$common.localizationDescription}</p>
        </div>
		<input type="submit" name="localization-submit" value="{$common.localizationSubmit}" class="button" />
	</fieldset>
</form>