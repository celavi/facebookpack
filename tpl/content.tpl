<h2>{$displayName}</h2>
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
<!-- facebook like button -->
<form action="{$smarty.server.REQUEST_URI}" method="post">
    <fieldset class="width3" style="width:850px">
        <legend><img src="{$path}images/like.png" />{$likeButton}</legend>
        <label>{$enablePlugin}</label>
        <div class="margin-form">
            <input type="radio" name="fbPack_like_button" value="yes" {if $fbPack_like_button eq 'yes'}checked="checked"{/if} /> {$yes}
            <input type="radio" name="fbPack_like_button" value="no" {if $fbPack_like_button eq 'no'}checked="checked"{/if} /> {$no}
            <p class="clear">{$fbPack_like_button_description}</p>
        </div>
        <label>{$fbPack_like_button_label}</label>
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

        {*<label>{$fbPack_like_send_label}</label>*}
        {*<div class="margin-form">*}
            {*<input type="radio" name="fbPack_like_send" value="yes" {if $fbPack_like_send eq 'yes'}checked="checked"{/if} /> {$yes}*}
            {*<input type="radio" name="fbPack_like_send" value="no" {if $fbPack_like_send eq 'no'}checked="checked"{/if} /> {$no}*}
            {*<p class="clear">{$fbPack_like_send_description}</p>*}
        {*</div>*}

        {*<label>' . $this->l ( 'Show Faces' ) . '</label>*}
        {*<div class="margin-form">*}
            {*<input type="checkbox" name="fbPack_like_faces" value="1" ' . (Tools::getValue ( 'fbPack_like_faces', $this->_fbPack_like_faces ) ? 'checked="checked"' : false) . ' />*}
            {*<p class="clear">' . $this->l ( 'Show profile pictures below the button. (Standard layout only)' ) . '</p>*}
        {*</div>*}
        {*<label>' . $this->l ( 'Color Scheme' ) . '</label>*}
        {*<div class="margin-form">*}
            {*<select name="fbPack_like_color" style="width:150px">*}
                {*<option value="light" ' . (Tools::getValue ( 'fbPack_like_color', $this->_fbPack_like_color ) == "light" ? 'selected="selected"' : "") . '>' . $this->l ( 'Light' ) . '</option>*}
                {*<option value="dark" ' . (Tools::getValue ( 'fbPack_like_color', $this->_fbPack_like_color ) == "dark" ? 'selected="selected"' : "") . '>' . $this->l ( 'Dark' ) . '</option>*}
            {*</select>*}
            {*<p class="clear">' . $this->l ( 'The color scheme of the plugin.' ) . '</p>*}
        {*</div>*}
        {*<label>' . $this->l ( 'Font' ) . '</label>*}
        {*<div class="margin-form">*}
            {*<select name="fbPack_like_font" style="width:150px">*}
                {*<option value="arial" ' . (Tools::getValue ( 'fbPack_like_font', $this->_fbPack_like_font ) == "arial" ? 'selected="selected"' : "") . '>' . $this->l ( 'Arial' ) . '</option>*}
                {*<option value="lucida grande" ' . (Tools::getValue ( 'fbPack_like_font', $this->_fbPack_like_font ) == "lucida grande" ? 'selected="selected"' : "") . '>' . $this->l ( 'Lucida Grande' ) . '</option>*}
                {*<option value="segoe ui" ' . (Tools::getValue ( 'fbPack_like_font', $this->_fbPack_like_font ) == "segoe ui" ? 'selected="selected"' : "") . '>' . $this->l ( 'Segoe Ui' ) . '</option>*}
                {*<option value="tahoma" ' . (Tools::getValue ( 'fbPack_like_font', $this->_fbPack_like_font ) == "tahoma" ? 'selected="selected"' : "") . '>' . $this->l ( 'Tahoma' ) . '</option>*}
                {*<option value="trebuchet ms" ' . (Tools::getValue ( 'fbPack_like_font', $this->_fbPack_like_font ) == "trebuchet ms" ? 'selected="selected"' : "") . '>' . $this->l ( 'Trebuchet MS' ) . '</option>*}
                {*<option value="verdana" ' . (Tools::getValue ( 'fbPack_like_font', $this->_fbPack_like_font ) == "verdana" ? 'selected="selected"' : "") . '>' . $this->l ( 'Verdana' ) . '</option>*}
            {*</select>*}
            {*<p class="clear">' . $this->l ( 'The font of the plugin.' ) . '</p>*}
        {*</div>*}
        <input type="submit" name="submitLikeButton" value="{$fbPack_like_submit}" class="button" />
    </fieldset>
</form>
