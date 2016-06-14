<!-- templates/content/share-button.tpl -->
<form action="{$smarty.server.REQUEST_URI}" method="post">
    <fieldset class="width3" style="width:850px">
        <legend><img src="{$path}images/comments_plugin.png" />{$commentsPlugin.name}</legend>
        <label>{$common.enablePlugin}</label>
        <div class="margin-form">
            <input type="checkbox" name="commentsPlugin-enabled" value="1" {if $commentsPlugin.enabled eq 1}checked="checked"{/if} />
            <p class="clear">{$commentsPlugin.description}</p>
        </div>
		<label>{$commentsPlugin.urlLabel}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="commentsPlugin-url" value="{$commentsPlugin.url}" placeholder="{$commentsPlugin.urlPlaceholder}" />
        </div>
		<label>{$commentsPlugin.widthLabel}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="commentsPlugin-width" value="{$commentsPlugin.width}" placeholder="{$commentsPlugin.widthPlaceholder}" />
            <p class="clear">{$commentsPlugin.widthDescription}</p>
        </div>
		<label>{$commentsPlugin.numPostsLabel}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="commentsPlugin-numPosts" value="{$commentsPlugin.numPosts}" placeholder="{$commentsPlugin.numPostsPlaceholder}" />
            <p class="clear">{$commentsPlugin.numPostsDescription}</p>
        </div>
		<label>{$commentsPlugin.colorschemeLabel}</label>
        <div class="margin-form">
            <select name="commentsPlugin-colorscheme" style="width:150px">
                <option value="light" {if $commentsPlugin.colorscheme eq 'light'}selected="selected"{/if} >{$commentsPlugin.colorschemeLight}</option>
                <option value="dark" {if $commentsPlugin.colorscheme eq 'dark'}selected="selected"{/if} >{$commentsPlugin.colorschemeDark}</option>
            </select>
            <p class="clear">{$commentsPlugin.colorschemeDescription}</p>
        </div>
		<input type="submit" name="commentsPlugin-submit" value="{$commentsPlugin.submit}" class="button" />
	</fieldset>
</form>