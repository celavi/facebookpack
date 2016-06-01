<h2>{$displayName}</h2>
{if $settingUpdated}
<div class="conf confirm"><img src="../img/admin/ok.gif" alt="{$settingUpdated}" /> {$settingUpdated}</div>
{/if}
{foreach $validationErrors as $error}
    <div class="alert error">{$error}</div>
{/foreach}
<!-- social -->
<img src="{$path}images/social_plugins.jpg" style="float:left; margin-right:15px;"><b>{$socialTitle}</b>
<br />
<br />
{$socialDescription_common}
<br />
{$socialDescription_simple}
<br />
{$socialDescription_complex}
<br clear="all" />
<br />
<!-- like button -->
<form action="{$smarty.server.REQUEST_URI}" method="post">
    <fieldset class="width3" style="width:850px">
        <legend><img src="{$path}images/like_button.png" />{$likeButton}</legend>
        <label>{$enablePlugin}</label>
        <div class="margin-form">
            <input type="checkbox" name="fbPack_like_button" value="1" {if $fbPack_like_button eq 1}checked="checked"{/if} />
            <p class="clear">{$fbPack_like_button_description}</p>
        </div>
        <label>{$fbPack_like_url_label}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="fbPack_like_url" value="{$fbPack_like_url}" placeholder="{$fbPack_like_url_placeholder}" />
        </div>
        <label>{$fbPack_like_width_label}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="fbPack_like_width" value="{$fbPack_like_width}" placeholder="{$fbPack_like_width_placeholder}" />
            <p class="clear">{$fbPack_like_width_description}</p>
        </div>
        <label>{$fbPack_like_layout_label}</label>
        <div class="margin-form">
            <select name="fbPack_like_layout" style="width:150px">
                <option value="standard" {if $fbPack_like_layout eq 'standard'}selected="selected"{/if} >{$fbPack_like_layout_standard}</option>
                <option value="box_count" {if $fbPack_like_layout eq 'box_count'}selected="selected"{/if} >{$fbPack_like_layout_box_count}</option>
                <option value="button_count" {if $fbPack_like_layout eq 'button_count'}selected="selected"{/if} >{$fbPack_like_layout_button_count}</option>
                <option value="button" {if $fbPack_like_layout eq 'button'}selected="selected"{/if} >{$fbPack_like_layout_button}</option>
            </select>
            <p class="clear">{$fbPack_like_layout_description}</p>
        </div>
        <label>{$fbPack_like_action_label}</label>
        <div class="margin-form">
            <select name="fbPack_like_action" style="width:150px">
                <option value="like" {if $fbPack_like_action eq 'like'}selected="selected"{/if} >{$fbPack_like_action_like}</option>
                <option value="recommend" {if $fbPack_like_action eq 'recommend'}selected="selected"{/if} >{$fbPack_like_action_recommend}</option>
            </select>
            <p class="clear">{$fbPack_like_action_description}</p>
        </div>
        <label>{$fbPack_like_faces_label}</label>
        <div class="margin-form">
            <input type="checkbox" name="fbPack_like_faces" value="1" {if $fbPack_like_faces eq 1}checked="checked"{/if} />
            <p class="clear">{$fbPack_like_faces_description}</p>
        </div>
        <label>{$fbPack_like_share_label}</label>
        <div class="margin-form">
            <input type="checkbox" name="fbPack_like_share" value="1" {if $fbPack_like_share eq 1}checked="checked"{/if} />
            <p class="clear">{$fbPack_like_share_description}</p>
        </div>
        <label>{$fbPack_like_colorscheme_label}</label>
        <div class="margin-form">
            <select name="fbPack_like_colorscheme" style="width:150px">
                <option value="light" {if $fbPack_like_colorscheme eq 'light'}selected="selected"{/if} >{$fbPack_like_colorscheme_light}</option>
                <option value="dark" {if $fbPack_like_colorscheme eq 'dark'}selected="selected"{/if} >{$fbPack_like_colorscheme_dark}</option>
            </select>
            <p class="clear">{$fbPack_like_colorscheme_description}</p>
        </div>
        <input type="submit" name="submitLikeButton" value="{$fbPack_like_submit}" class="button" />
    </fieldset>
</form>
<br />
<!-- page plugin -->
<form action="{$smarty.server.REQUEST_URI}" method="post">
    <fieldset class="width3" style="width:850px">
        <legend><img src="{$path}images/like_page.png" />{$pagePlugin}</legend>
        <label>{$enablePlugin}</label>
        <div class="margin-form">
            <input type="checkbox" name="fbPack_page_plugin" value="1" {if $fbPack_page_plugin eq 1}checked="checked"{/if} />
            <p class="clear">{$fbPack_page_plugin_description}</p>
        </div>
        <label>{$fbPack_page_url_label}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="fbPack_page_url" value="{$fbPack_page_url}" placeholder="{$fbPack_page_url_placeholder}" />
        </div>
        <label>{$fbPack_page_name_label}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="fbPack_page_name" value="{$fbPack_page_name}" placeholder="{$fbPack_page_name_placeholder}" />
        </div>
        <label>{$fbPack_page_tabs_label}</label>
        <div class="margin-form">
            <input type="checkbox" name="fbPack_page_tabs[]" value="timeline" {if $fbPack_page_tabs[0] eq 'timeline'}checked="checked"{/if} /> {$fbPack_page_tabs_timeline}<br />
            <input type="checkbox" name="fbPack_page_tabs[]" value="events" {if $fbPack_page_tabs[1] eq 'events'}checked="checked"{/if} /> {$fbPack_page_tabs_events}<br />
            <input type="checkbox" name="fbPack_page_tabs[]" value="messages" {if $fbPack_page_tabs[2] eq 'messages'}checked="checked"{/if} /> {$fbPack_page_tabs_messages}
            <p class="clear">{$fbPack_page_tabs_description}</p>
        </div>
        <label>{$fbPack_page_width_label}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="fbPack_page_width" value="{$fbPack_page_width}" placeholder="{$fbPack_page_width_placeholder}" />
            <p class="clear">{$fbPack_like_width_description}</p>
        </div>
        <label>{$fbPack_page_height_label}</label>
        <div class="margin-form">
            <input style="width:500px;" type="text" name="fbPack_page_height" value="{$fbPack_page_height}" placeholder="{$fbPack_page_height_placeholder}" />
            <p class="clear">{$fbPack_page_height_description}</p>
        </div>
        <label>{$fbPack_page_header_label}</label>
        <div class="margin-form">
            <input type="checkbox" name="fbPack_page_header" value="1" {if $fbPack_page_header eq 1}checked="checked"{/if} />
            <p class="clear">{$fbPack_page_header_description}</p>
        </div>
        <label>{$fbPack_page_cover_label}</label>
        <div class="margin-form">
            <input type="checkbox" name="fbPack_page_cover" value="1" {if $fbPack_page_cover eq 1}checked="checked"{/if} />
            <p class="clear">{$fbPack_page_cover_description}</p>
        </div>
        <label>{$fbPack_page_adapt_label}</label>
        <div class="margin-form">
            <input type="checkbox" name="fbPack_page_adapt" value="1" {if $fbPack_page_adapt eq 1}checked="checked"{/if} />
            <p class="clear">{$fbPack_page_adapt_description}</p>
        </div>
        <label>{$fbPack_page_faces_label}</label>
        <div class="margin-form">
            <input type="checkbox" name="fbPack_page_faces" value="1" {if $fbPack_page_faces eq 1}checked="checked"{/if} />
            <p class="clear">{$fbPack_page_faces_description}</p>
        </div>

        Use Small Header
        Hide Cover Photo
        Adapt to plugin container width
        Show Friend's Faces
    </fieldset>
</form>
