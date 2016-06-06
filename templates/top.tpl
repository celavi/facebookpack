{*{if not $isLogged}*}
{*<div id="fb-login-button">*}
    {*<a href='#'><img alt="" class="" height="21" width="169" src="/modules/facebookpack/fb_connect.gif" /></a>*}
{*</div>*}
{*{elseif $fbUser}*}
{*<div id="fb-picture">*}
    {*<img src="https://graph.facebook.com/{$fb_user_id}/picture" height="50" width="50" />*}
{*</div>*}
{*{/if}*}
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
{literal}
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/{/literal}{$locale}{literal}/sdk.js#xfbml=1&version={/literal}{$sdk_version}{literal}";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
{/literal}