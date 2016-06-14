<!-- templates/content/save-button.tpl -->
<form action="{$smarty.server.REQUEST_URI}" method="post">
    <fieldset class="width3" style="width:850px">
        <legend><img src="{$path}images/save_button.png" />{$saveButton.name}</legend>
        <label>{$common.enablePlugin}</label>
        <div class="margin-form">
            <input type="checkbox" name="saveButton-enabled" value="1" {if $saveButton.enabled eq 1}checked="checked"{/if} />
            <p class="clear">{$saveButton.description}</p>
        </div>
		<label>{$saveButton.urlLabel}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="saveButton-url" value="{$saveButton.url}" placeholder="{$saveButton.urlPlaceholder}" />
        </div>
		<label>{$saveButton.sizeLabel}</label>
        <div class="margin-form">
            <select name="saveButton-size" style="width:150px">
                <option value="small" {if $saveButton.size eq 'small'}selected="selected"{/if} >{$saveButton.sizeSmall}</option>
                <option value="large" {if $saveButton.size eq 'large'}selected="selected"{/if} >{$saveButton.sizeLarge}</option>
            </select>
            <p class="clear">{$saveButton.sizeDescription}</p>
        </div>
		<input type="submit" name="saveButton-submit" value="{$saveButton.submit}" class="button" />
	</fieldset>
</form>