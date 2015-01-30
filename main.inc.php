<?php
/*
Plugin Name: CDNPlus
Version: 2.7.a
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

	if ($conf['cdnplus_conf']['cdn_enabled'] == 'true' && empty($conf['cdnplus_conf']['cdn']['cdn']) and in_array($page['page'], array('intro','plugins_list'))) {
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

//add_event_handler('get_download_url', 'cdnplus_add_prefix'); // download link ?
//add_event_handler('get_element_url', 'cdnplus_add_prefix');
//add_event_handler('get_high_url', 'cdnplus_add_prefix');
add_event_handler('get_src_image_url', 'cdnplus_add_prefix'); // picture page
add_event_handler('get_derivative_url', 'cdnplus_add_prefix'); // thumbnailCategory & thumbnail & navThumb

function cdnplus_add_prefix($content) {
	global $conf;

	//print $content;
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
	return $content;
}

?>
