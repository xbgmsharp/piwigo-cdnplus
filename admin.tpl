<div class="titlePage">
 <h2>{'CDNPlus'|@translate}</h2>
</div>

This plugin allows an easy integration with a Content Delivery Network (CDN) for your gallery.
<br/><br/>
Refer to the <a href="https://github.com/xbgmsharp/piwigo-cdnplus/wiki" target="_blanck">plugin documentation</a> for additional information. Create an <a href="https://github.com/xbgmsharp/piwigo-cdnplus/issues" target="_blanck">issue</a> for support, or feedback, or feature request.

<form method="post" action="" class="properties" id="cdnplus_config">
<fieldset>
   <legend>{'CDN Extra'|@translate}</legend>
    <ul>
      <li>
        <label>{'CDN_ENABLED'|@translate} : </label>
        <label><input type="checkbox" name="cdn_enabled" id="cdn_enabled" onClick="cdn_toggle();" value="true" {if $cdn_enabled} checked="checked"{/if} /></label>
        <br/><small>{'CDN_ENABLED_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_USE_EXTRA'|@translate} : </label>
        <label><input type="checkbox" name="cdn_extra_enabled" id="cdn_extra_enabled" onClick="extra_toggle();" value="true" {if $cdn_extra_enabled} checked="checked"{/if} /></label>
        <br/><small>{'CDN_USE_EXTRA_DESC'|@translate}</small>
      </li>
    </ul>
    <div class="errors" id="error" style="visibility:hidden; width:0px; height:0px; display:none;"></div>
</fieldset>

<div id="cdn_options" style="visibility:hidden; width:0px; height:0px; display:none;">
<fieldset>
   <legend>{'CDN_USE'|@translate}</legend>
    <ul>
      <li>
        <label>{'CDN_SITE_ROOT'|@translate} : </label>
        <label><input name="root" type="text" size="60" default="/" placeholder="/" value="{$cdn_1.root}" /></label>
        <br/><small>{'CDN_SITE_ROOT_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_DOMAIN'|@translate} : </label>
        <label><input name="host" type="text" size="60" default="" placeholder="cdn.example.com" value="{$cdn_1.host}" /></label>
        <br/><small>{'CDN_DOMAIN_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_KEEP_HTTPS'|@translate} : </label>
        <label><input name="keep_https" type="checkbox" value="true" {if $cdn_1.keep_https} checked="checked"{/if} /></label>
        <br/><small>{'CDN_KEEP_HTTPS_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_THEME'|@translate} : </label>
        <label><input name="theme" type="checkbox" value="true" {if $cdn_1.theme}checked="checked"{/if} /></label>
        <br/><small>{'CDN_THEME_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_FILE_TYPES'|@translate} : </label>
        <small>{'CDN_FILE_TYPES_DESC'|@translate}</small><br/>
           {foreach from=$cdn_1.filetypes key=name_ext item=data}
           <input type="checkbox" name="filetypes[]" value="{$name_ext}" {if $data} checked="checked"{/if} />{$name_ext}
           {/foreach}
      </li>
      <li>
        <label>{'CDN_EXTRA_FILETYPES'|@translate} : </label>
        <label><input name="extratypes" type="text" size="60" default="" label="{'CDN_EXTRA_FILETYPES'|@translate}" value="{$cdn_1.extratypes}" /></label>
        <br/><small>{'CDN_EXTRA_FILETYPES_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_IGNORE_FILES'|@translate} : </label>
        <label><input name="ignorefiles" type="textarea" cols="50" rows="5" default="" label="{'CDN_IGNORE_FILES'|@translate}" value="{$cdn_1.ignorefiles}" /></label>
        <br/><small>{'CDN_IGNORE_FILES_DESC'|@translate}</small>
      </li>
    </ul>
</fieldset>
</div>

<div id="cdn_extra" style="visibility:hidden; width:0px; height:0px; display:none;">
<fieldset>
   <legend>{'CDN_USE_EXTRA_2'|@translate}</legend>
    <ul>
      <li>
        <label>{'CDN_SITE_ROOT'|@translate} : </label>
        <label><input name="root_2" type="text" size="60" default="/" placeholder="/" value="{$cdn_2.root}" /></label>
        <br/><small>{'CDN_SITE_ROOT_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_DOMAIN'|@translate} : </label>
        <label><input name="host_2" type="text" size="60" default="" placeholder="cdn.example.com" value="{$cdn_2.host}" /></label>
        <br/><small>{'CDN_DOMAIN_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_KEEP_HTTPS'|@translate} : </label>
        <label><input name="keep_https_2" type="checkbox" value="true" {if $cdn_2.keep_https} checked="checked"{/if} /></label>
        <br/><small>{'CDN_KEEP_HTTPS_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_THEME'|@translate} : </label>
        <label><input name="theme_2" type="checkbox" value="true" {if $cdn_2.theme}checked="checked"{/if} /></label>
        <br/><small>{'CDN_THEME_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_FILE_TYPES'|@translate} : </label>
        <small>{'CDN_FILE_TYPES_DESC'|@translate}</small><br/>
           {foreach from=$cdn_2.filetypes key=name_ext item=data}
           <input type="checkbox" name="filetypes_2[]" value="{$name_ext}" {if $data} checked="checked"{/if} />{$name_ext}
           {/foreach}
      </li>
      <li>
        <label>{'CDN_EXTRA_FILETYPES'|@translate} : </label>
        <label><input name="extratypes_2" type="text" size="60" default="" label="{'CDN_EXTRA_FILETYPES'|@translate}" value="{$cdn_2.extratypes}" /></label>
        <br/><small>{'CDN_EXTRA_FILETYPES_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_IGNORE_FILES'|@translate} : </label>
        <label><input name="ignorefiles_2" type="textarea" cols="50" rows="5" default="" label="{'CDN_IGNORE_FILES'|@translate}" value="{$cdn_2.ignorefiles}" /></label>
        <br/><small>{'CDN_IGNORE_FILES_DESC'|@translate}</small>
      </li>
    </ul>
</fieldset>

<fieldset>
   <legend>{'CDN_USE_EXTRA_3'|@translate}</legend>
    <ul>
      <li>
        <label>{'CDN_SITE_ROOT'|@translate} : </label>
        <label><input name="root_3" type="text" size="60" default="/" placeholder="/" value="{$cdn_3.root}" /></label>
        <br/><small>{'CDN_SITE_ROOT_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_DOMAIN'|@translate} : </label>
        <label><input name="host_3" type="text" size="60" default="" placeholder="cdn.example.com" value="{$cdn_3.host}" /></label>
        <br/><small>{'CDN_DOMAIN_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_KEEP_HTTPS'|@translate} : </label>
        <label><input name="keep_https_3" type="checkbox" value="true" {if $cdn_3.keep_https} checked="checked"{/if} /></label>
        <br/><small>{'CDN_KEEP_HTTPS_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_THEME'|@translate} : </label>
        <label><input name="theme_3" type="checkbox" value="true" {if $cdn_3.themes}checked="checked"{/if} /></label>
        <br/><small>{'CDN_THEME_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_FILE_TYPES'|@translate} : </label>
        <small>{'CDN_FILE_TYPES_DESC'|@translate}</small><br/>
           {foreach from=$cdn_3.filetypes key=name_ext item=data}
           <input type="checkbox" name="filetypes_3[]" value="{$name_ext}" {if $data} checked="checked"{/if} />{$name_ext}
           {/foreach}
      </li>
      <li>
        <label>{'CDN_EXTRA_FILETYPES'|@translate} : </label>
        <label><input name="extratypes_3" type="text" size="60" default="" label="{'CDN_EXTRA_FILETYPES'|@translate}" value="{$cdn_3.extratypes}" /></label>
        <br/><small>{'CDN_EXTRA_FILETYPES_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_IGNORE_FILES'|@translate} : </label>
        <label><input name="ignorefiles_3" type="textarea" cols="50" rows="5" default="" label="{'CDN_IGNORE_FILES'|@translate}" value="{$cdn_3.ignorefiles}" /></label>
        <br/><small>{'CDN_IGNORE_FILES_DESC'|@translate}</small>
      </li>
    </ul>
</fieldset>
<fieldset>
   <legend>{'CDN_USE_EXTRA_4'|@translate}</legend>
    <ul>
      <li>
        <label>{'CDN_SITE_ROOT'|@translate} : </label>
        <label><input name="root_4" type="text" size="60" default="/" placeholder="/" value="{$cdn_4.root}" /></label>
        <br/><small>{'CDN_SITE_ROOT_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_DOMAIN'|@translate} : </label>
        <label><input name="host_4" type="text" size="60" default="" placeholder="cdn.example.com" value="{$cdn_4.host}" /></label>
        <br/><small>{'CDN_DOMAIN_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_KEEP_HTTPS'|@translate} : </label>
        <label><input name="keep_https_4" type="checkbox" value="true" {if $cdn_4.keep_https} checked="checked"{/if} /></label>
        <br/><small>{'CDN_KEEP_HTTPS_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_THEME'|@translate} : </label>
        <label><input name="theme_4" type="checkbox" value="true" {if $cdn_4.theme}checked="checked"{/if} /></label>
        <br/><small>{'CDN_THEME_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_FILE_TYPES'|@translate} : </label>
        <small>{'CDN_FILE_TYPES_DESC'|@translate}</small><br/>
           {foreach from=$cdn_4.filetypes key=name_ext item=data}
           <input type="checkbox" name="filetypes_4[]" value="{$name_ext}" {if $data} checked="checked"{/if} />{$name_ext}
           {/foreach}
      </li>
      <li>
        <label>{'CDN_EXTRA_FILETYPES'|@translate} : </label>
        <label><input name="extratypes_4" type="text" size="60" default="" label="{'CDN_EXTRA_FILETYPES'|@translate}" value="{$cdn_4.extratypes}" /></label>
        <br/><small>{'CDN_EXTRA_FILETYPES_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_IGNORE_FILES'|@translate} : </label>
        <label><input name="ignorefiles_4" type="textarea" cols="50" rows="5" default="" label="{'CDN_IGNORE_FILES'|@translate}" value="{$cdn_4.ignorefiles}" /></label>
        <br/><small>{'CDN_IGNORE_FILES_DESC'|@translate}</small>
      </li>
    </ul>
</fieldset>

<fieldset>
   <legend>{'CDN_USE_EXTRA_5'|@translate}</legend>
    <ul>
      <li>
        <label>{'CDN_SITE_ROOT'|@translate} : </label>
        <label><input name="root_5" type="text" size="60" default="/" placeholder="/" value="{$cdn_5.root}" /></label>
        <br/><small>{'CDN_SITE_ROOT_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_DOMAIN'|@translate} : </label>
        <label><input name="host_5" type="text" size="60" default="" placeholder="cdn.example.com" value="{$cdn_5.host}" /></label>
        <br/><small>{'CDN_DOMAIN_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_KEEP_HTTPS'|@translate} : </label>
        <label><input name="keep_https_5" type="checkbox" value="true" {if $cdn_5.keep_https} checked="checked"{/if} /></label>
        <br/><small>{'CDN_KEEP_HTTPS_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_THEME'|@translate} : </label>
        <label><input name="theme_5" type="checkbox" value="true" {if $cdn_5.theme}checked="checked"{/if} /></label>
        <br/><small>{'CDN_THEME_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_FILE_TYPES'|@translate} : </label>
        <small>{'CDN_FILE_TYPES_DESC'|@translate}</small><br/>
           {foreach from=$cdn_5.filetypes key=name_ext item=data}
           <input type="checkbox" name="filetypes_5[]" value="{$name_ext}" {if $data} checked="checked"{/if} />{$name_ext}
           {/foreach}
      </li>
      <li>
        <label>{'CDN_EXTRA_FILETYPES'|@translate} : </label>
        <label><input name="extratypes_5" type="text" size="60" default="" label="{'CDN_EXTRA_FILETYPES'|@translate}" value="{$cdn_5.extratypes}" /></label>
        <br/><small>{'CDN_EXTRA_FILETYPES_DESC'|@translate}</small>
      </li>
      <li>
        <label>{'CDN_IGNORE_FILES'|@translate} : </label>
        <label><input name="ignorefiles_5" type="textarea" cols="50" rows="5" default="" label="{'CDN_IGNORE_FILES'|@translate}" value="{$cdn_5.ignorefiles}" /></label>
        <br/><small>{'CDN_IGNORE_FILES_DESC'|@translate}</small>
      </li>
    </ul>
</fieldset>
</div>

<p>
 <input class="submit" type="submit" name="cdnplus_submit" value="{'Submit'|@translate}">
</p>

</form>

{literal}
<script type="text/javascript">
function cdn_toggle()
{
        var checkbox = document.getElementById("cdn_enabled");
	var div = document.getElementById("cdn_options");
        if (checkbox.checked == true)
        {
                div.removeAttribute("style");
        } else {
                div.setAttribute("style","visibility:hidden; width:0px; height:0px; display:none;");
        }
}

function extra_toggle()
{
        var check_cdn = document.getElementById("cdn_enabled");
        var check_extra = document.getElementById("cdn_extra_enabled");
	var div_cdn = document.getElementById("cdn_extra");
	var div_err = document.getElementById("error");
        if (check_cdn.checked == true && check_extra.checked == true)
        {
                div_err.setAttribute("style","visibility:hidden; width:0px; height:0px; display:none;");
		div_cdn.removeAttribute("style");
        } else if (check_cdn.checked == false && check_extra.checked == true) {
		div_err.innerHTML = "Multiple CDN setup require to first CDN to be enable";
		div_err.removeAttribute("style");
                div_cdn.setAttribute("style","visibility:hidden; width:0px; height:0px; display:none;");
        } else {
                div_err.setAttribute("style","visibility:hidden; width:0px; height:0px; display:none;");
                div_cdn.setAttribute("style","visibility:hidden; width:0px; height:0px; display:none;");
        }
}
window.load = cdn_toggle();
window.load = extra_toggle();
</script>
{/literal}
