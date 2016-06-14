<!-- templates/content/share-button.tpl -->
<form action="{$smarty.server.REQUEST_URI}" method="post">
    <fieldset class="width3" style="width:850px">
        <legend><img src="{$path}images/share_button.png" />{$shareButton.name}</legend>
        <label>{$common.enablePlugin}</label>
        <div class="margin-form">
            <input type="checkbox" name="shareButton-enabled" value="1" {if $shareButton.enabled eq 1}checked="checked"{/if} />
            <p class="clear">{$shareButton.description}</p>
        </div>
		<label>{$shareButton.urlLabel}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="shareButton-url" value="{$shareButton.url}" placeholder="{$shareButton.urlPlaceholder}" />
        </div>
		<label>{$shareButton.layoutLabel}</label>
        <div class="margin-form">
            <select name="shareButton-layout" style="width:150px">
                <option value="box_count" {if $shareButton.layout eq 'box_count'}selected="selected"{/if} >{$shareButton.layoutBoxCount}</option>
                <option value="button_count" {if $shareButton.layout eq 'button_count'}selected="selected"{/if} >{$shareButton.layoutButtonCount}</option>
				<option value="button" {if $shareButton.layout eq 'button'}selected="selected"{/if} >{$shareButton.layoutButton}</option>
				<option value="link" {if $shareButton.layout eq 'link'}selected="selected"{/if} >{$shareButton.layoutLink}</option>
				<option value="icon_link" {if $shareButton.layout eq 'icon_link'}selected="selected"{/if} >{$shareButton.layoutIconLink}</option>
				<option value="icon" {if $shareButton.layout eq 'icon'}selected="selected"{/if} >{$shareButton.layoutIcon}</option>
            </select>
            <p class="clear">{$shareButton.layoutDescription}</p>
        </div>
		<label>{$shareButton.mobileLabel}</label>
        <div class="margin-form">
            <input type="checkbox" name="shareButton-mobile" value="1" {if $shareButton.mobile eq 1}checked="checked"{/if} />
            <p class="clear">{$shareButton.mobileDescription}</p>
        </div>
		<input type="submit" name="shareButton-submit" value="{$shareButton.submit}" class="button" />
	</fieldset>
</form>