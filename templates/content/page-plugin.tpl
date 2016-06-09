<!-- templates/content/page-plugin.tpl -->
<form action="{$smarty.server.REQUEST_URI}" method="post">
    <fieldset class="width3" style="width:850px">
        <legend><img src="{$path}images/like_page.png" />{$pagePlugin.name}</legend>
        <label>{$common.enablePlugin}</label>
        <div class="margin-form">
            <input type="checkbox" name="pagePlugin-enabled" value="1" {if $pagePlugin.enabled eq 1}checked="checked"{/if} />
            <p class="clear">{$pagePlugin.description}</p>
        </div>
        <label>{$pagePlugin.urlLabel}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="pagePlugin-url" value="{$pagePlugin.url}" placeholder="{$pagePlugin.urlPlaceholder}" />
        </div>
        <label>{$pagePlugin.pageNameLabel}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="pagePlugin-pageName" value="{$pagePlugin.pageName}" placeholder="{$pagePlugin.pageNamePlaceholder}" />
        </div>
        <label>{$pagePlugin.tabsLabel}</label>
        <div class="margin-form">
            <input type="checkbox" name="pagePlugin-tabs[]" value="timeline" {if isset($pagePlugin.tabs[0]) && $pagePlugin.tabs[0] eq 'timeline'}checked="checked"{/if} /> {$pagePlugin.tabsTimeline}<br />
            <input type="checkbox" name="pagePlugin-tabs[]" value="events" {if isset($pagePlugin.tabs[1]) && $pagePlugin.tabs[1] eq 'events'}checked="checked"{/if} /> {$pagePlugin.tabsEvents}<br />
            <input type="checkbox" name="pagePlugin-tabs[]" value="messages" {if isset($pagePlugin.tabs[2]) && $pagePlugin.tabs[2] eq 'messages'}checked="checked"{/if} /> {$pagePlugin.tabsMessages}
            <p class="clear">{$pagePlugin.tabsDescription}</p>
        </div>
        <label>{$pagePlugin.widthLabel}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="pagePlugin-width" value="{$pagePlugin.width}" placeholder="{$pagePlugin.widthPlaceholder}" />
            <p class="clear">{$pagePlugin.widthDescription}</p>
        </div>
        <label>{$pagePlugin.heightLabel}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="pagePlugin-height" value="{$pagePlugin.height}" placeholder="{$pagePlugin.heightPlaceholder}" />
            <p class="clear">{$pagePlugin.heightDescription}</p>
        </div>
        <label>{$pagePlugin.headerLabel}</label>
        <div class="margin-form">
            <input type="checkbox" name="pagePlugin-header" value="1" {if $pagePlugin.header eq 1}checked="checked"{/if} />
            <p class="clear">{$pagePlugin.headerDescription}</p>
        </div>
        <label>{$pagePlugin.coverLabel}</label>
        <div class="margin-form">
            <input type="checkbox" name="pagePlugin-cover" value="1" {if $pagePlugin.cover eq 1}checked="checked"{/if} />
            <p class="clear">{$pagePlugin.coverDescription}</p>
        </div>
        <label>{$pagePlugin.adaptLabel}</label>
        <div class="margin-form">
            <input type="checkbox" name="pagePlugin-adapt" value="1" {if $pagePlugin.adapt eq 1}checked="checked"{/if} />
            <p class="clear">{$pagePlugin.adaptDescription}</p>
        </div>
        <label>{$pagePlugin.facesLabel}</label>
        <div class="margin-form">
            <input type="checkbox" name="pagePlugin-faces" value="1" {if $pagePlugin.faces eq 1}checked="checked"{/if} />
            <p class="clear">{$pagePlugin.facesDescription}</p>
        </div>
		<input type="submit" name="pagePlugin-submit" value="{$pagePlugin.submit}" class="button" />
    </fieldset>
</form>