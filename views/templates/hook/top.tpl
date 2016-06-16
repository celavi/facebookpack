<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
{literal}
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/{/literal}{$locale}{literal}/sdk.js#xfbml=1&version={/literal}{$sdkVersion}{literal}";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
{/literal}