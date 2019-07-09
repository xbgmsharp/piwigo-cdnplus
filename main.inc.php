<?php
/*
Plugin Name: CDNPlus
Version: 2.8.a
Description: CDN integration for Piwigo
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=788
Author: xbmgsharp
Author URI: https://github.com/xbgmsharp/piwigo-cdnplus
*/

// Chech whether we are indeed included by Piwigo.
if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

global $conf;

// Prepare configuration
$conf['cdnplus_conf'] = safe_unserialize($conf['cdnplus_conf']);

// Add an entry to the 'Plugins' menu.
add_event_handler('get_admin_plugin_menu_links', 'cdnplus_admin_menu');

function cdnplus_admin_menu($menu) {
	global $page,$conf;

	if (!empty($conf['cdnplus_conf']['cdn_enabled']) && empty($conf['cdnplus_conf']['cdn_1']['host']) and in_array($page['page'], array('intro','plugins_list'))) {
		$page['errors'][] = l10n('You need to set your CDN host');
	}

	$admin_url = get_admin_plugin_menu_link(dirname(__FILE__).'/admin.php');
	array_push($menu, array(
		'NAME'  => 'CDNPlus',
		'URL'   => get_admin_plugin_menu_link(dirname(__FILE__)).'/admin.php'
		)
	);

	return $menu;
}

//add_event_handler('loc_end_picture', 'cdnplus_debug', EVENT_HANDLER_PRIORITY_NEUTRAL, 4);

// Add event handler if CDNPlus enable
if (!empty($conf['cdnplus_conf']['cdn_enabled']) and !defined('IN_ADMIN') )
{
	//add_event_handler('get_download_url', 'cdnplus_debug'); // download link ?
	//add_event_handler('get_element_url', 'cdnplus_debug'); // ?
	//add_event_handler('get_high_url', 'cdnplus_debug'); // ?
	add_event_handler('get_src_image_url', 'cdnplus_update_url', EVENT_HANDLER_PRIORITY_NEUTRAL, 4); // picture page
	add_event_handler('get_derivative_url', 'cdnplus_update_url', EVENT_HANDLER_PRIORITY_NEUTRAL, 4); // thumbnailCategory & thumbnail & navThumb
	//add_event_handler('get_src_image_url', 'cdnplus_update_url'); // picture page
	//add_event_handler('get_derivative_url', 'cdnplus_update_url'); // thumbnailCategory & thumbnail & navThumb

	// Find which CDN to use for theme and enabled the trigger
	for($i = 1; $i <= 5; $i++)
	{
		if (!empty($conf['cdnplus_conf']['cdn_'.$i]['host'])
			&& !empty($conf['cdnplus_conf']['cdn_'.$i]['theme']))
		{
			$cdnUrl = 'http://';
			if (!empty($_SERVER['HTTPS']) && !empty($conf['cdnplus_conf']['cdn_'.$i]['keep_https']))
			{
				$cdnUrl = 'https://';
			}
			define('CDNPLUS', $cdnUrl.$conf['cdnplus_conf']['cdn_'.$i]['host']);
			define('CDNPLUS_ROOT_URL', CDNPLUS . get_absolute_root_url(false));
			add_event_handler('get_combined_css', 'cdnplus_combined_css', EVENT_HANDLER_PRIORITY_NEUTRAL, 2); // update CSS
			add_event_handler('combined_script', 'cdnplus_combined_script', EVENT_HANDLER_PRIORITY_NEUTRAL, 2); // update Javascript
			add_event_handler('combined_css_postfilter', 'cdnplus_combined_css_postfilter'); // ?
		}
	}
}

function cdnplus_prefilter($source, &$smarty)
{
	$source = str_replace('src="{$ROOT_URL}{$themeconf.icon_dir}/', 'src="'.CDNPLUS_ROOT_URL.'{$themeconf.icon_dir}/', $source);
	$source = str_replace('url({$'.'ROOT_URL}', 'url('.CDNPLUS_ROOT_URL, $source);
	return $source;
}

function cdnplus_combined_script($url, $script)
{
	if (!$script->is_remote())
		$url = CDNPLUS_ROOT_URL.$script->path;
	return $url;
}

function cdnplus_combined_css($url, $loc)
{
	$url = CDNPLUS_ROOT_URL.$loc;
	return $url;
}

function cdnplus_combined_css_postfilter($css)
{
	return str_replace('url(/', 'url('.CDNPLUS.'/', $css);
}

function cdnplus_update_url($content)
{
	global $conf;

//	print "<br/>CDNPLUS IN[".$content."]";
	if (!empty($conf['cdnplus_conf']['cdn_enabled']))
	{
		$extension = get_extension(strtolower($content));
		//print $extension;
		for($i = 1; $i <= 5; $i++)
		{
			if (!empty($conf['cdnplus_conf']['cdn_'.$i]['extratypes']))
			{
				$conf['cdnplus_conf']['cdn_'.$i]['filetypes'] =
					array_uniq(array_merge($conf['cdnplus_conf']['cdn_'.$i]['filetypes'], explode(',', $conf['cdnplus_conf']['cdn_'.$i]['extratypes'])));
			}
			if(!empty($conf['cdnplus_conf']['cdn_'.$i]['ignorefiles']))
			{

			}
			if (!empty($conf['cdnplus_conf']['cdn_'.$i]['host'])
				&& array_key_exists($extension, $conf['cdnplus_conf']['cdn_'.$i]['filetypes'])
				&& !empty($conf['cdnplus_conf']['cdn_'.$i]['filetypes'][$extension]))
			{
				if (!startsWith($content, 'i.php?')) {
				$cdnUrl = 'http://';
				if (!empty($_SERVER['HTTPS']) && !empty($conf['cdnplus_conf']['cdn_'.$i]['keep_https']))
				{
					$cdnUrl = 'https://';
				}
				$cdnUrl = $cdnUrl.$conf['cdnplus_conf']['cdn_'.$i]['host'].make_index_url();
				$content = $cdnUrl.$content;
			}
			}
		}
	}
//	print "<br/>CDNPLUS OUT[".embellish_url($content)."]";
	return $content;
}


function cdnplus_debug()
{
	echo "DEBUG";
//	global $template;
//	print_r($template);
}

function startsWith($haystack, $needle)
{
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}

?>
