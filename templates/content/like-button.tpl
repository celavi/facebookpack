<!-- templates/content/like-button.tpl -->
<form action="{$smarty.server.REQUEST_URI}" method="post">
    <fieldset class="width3" style="width:850px">
        <legend><img src="{$path}images/like_button.png" />{$likeButton.name}</legend>
        <label>{$common.enablePlugin}</label>
        <div class="margin-form">
            <input type="checkbox" name="likeButton-enabled" value="1" {if $likeButton.enabled eq 1}checked="checked"{/if} />
            <p class="clear">{$likeButton.description}</p>
        </div>
		<label>{$likeButton.urlLabel}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="likeButton-url" value="{$likeButton.url}" placeholder="{$likeButton.urlPlaceholder}" />
        </div>
		<label>{$likeButton.widthLabel}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="likeButton-width" value="{$likeButton.width}" placeholder="{$likeButton.widthPlaceholder}" />
            <p class="clear">{$likeButton.widthDescription}</p>
        </div>
		<label>{$likeButton.layoutLabel}</label>
        <div class="margin-form">
            <select name="likeButton-layout" style="width:150px">
                <option value="standard" {if $likeButton.layout eq 'standard'}selected="selected"{/if} >{$likeButton.layoutStandard}</option>
                <option value="box_count" {if $likeButton.layout eq 'box_count'}selected="selected"{/if} >{$likeButton.layoutBoxCount}</option>
                <option value="button_count" {if $likeButton.layout eq 'button_count'}selected="selected"{/if} >{$likeButton.layoutButtonCount}</option>
                <option value="button" {if $likeButton.layout eq 'button'}selected="selected"{/if} >{$likeButton.layoutButton}</option>
            </select>
            <p class="clear">{$likeButton.layoutDescription}</p>
        </div>
		<label>{$likeButton.actionLabel}</label>
        <div class="margin-form">
            <select name="likeButton-action" style="width:150px">
                <option value="like" {if $likeButton.action eq 'like'}selected="selected"{/if} >{$likeButton.actionLike}</option>
                <option value="recommend" {if $likeButton.action eq 'recommend'}selected="selected"{/if} >{$likeButton.actionRecommend}</option>
            </select>
            <p class="clear">{$likeButton.actionDescription}</p>
        </div>
        <label>{$likeButton.facesLabel}</label>
        <div class="margin-form">
            <input type="checkbox" name="likeButton-faces" value="1" {if $likeButton.faces eq 1}checked="checked"{/if} />
            <p class="clear">{$likeButton.facesDescription}</p>
        </div>
        <label>{$likeButton.shareLabel}</label>
        <div class="margin-form">
            <input type="checkbox" name="likeButton-share" value="1" {if $likeButton.share eq 1}checked="checked"{/if} />
            <p class="clear">{$likeButton.shareDescription}</p>
        </div>
        <label>{$likeButton.colorschemeLabel}</label>
        <div class="margin-form">
            <select name="likeButton-colorscheme" style="width:150px">
                <option value="light" {if $likeButton.colorscheme eq 'light'}selected="selected"{/if} >{$likeButton.colorschemeLight}</option>
                <option value="dark" {if $likeButton.colorscheme eq 'dark'}selected="selected"{/if} >{$likeButton.colorschemeDark}</option>
            </select>
            <p class="clear">{$likeButton.colorschemeDescription}</p>
        </div>
        <input type="submit" name="likeButton-submit" value="{$likeButton.submit}" class="button" />
    </fieldset>
</form>
