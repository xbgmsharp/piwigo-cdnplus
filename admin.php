<?php
/***********************************************
* File      :   admin.php
* Project   :   piwigo-cdnplus
* Descr     :   Install / Uninstall method
*
* Created   :   28.01.2015
*
* Copyright 2013-2015 <xbgmsharp@gmail.com>
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
************************************************/

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

// Check access and exit when user status is not ok
check_status(ACCESS_ADMINISTRATOR);

/* array_map callback for file ext */
$func_arr_map = function($value) {
    return isset($value) ? 'true' : 'false';
};

// Setup plugin Language
load_language('plugin.lang', PHPWG_PLUGINS_PATH . basename(dirname(__FILE__)).'/');

// Update conf if submitted in admin site
if (isset($_POST['cdnplus_submit']))
{
   if (isset($_POST['cdn_enabled']) and $_POST['cdn_enabled'] == "true" and (empty($_POST['root']) || empty($_POST['host'])))
   {
       array_push($page['errors'], l10n('CDN enable but no CDN domain setup or Site Root define'));
   }
   else if (isset($_POST['cdn_enabled']) and $_POST['cdn_enabled'] == "true" and !isset($_POST['filetypes']))
   {
       array_push($page['errors'], l10n('CDN enable but no file type setup'));
   }
   else if (isset($_POST['cdn_extra_enabled']) and $_POST['cdn_extra_enabled'] == "true" and empty($_POST['host_2']))
   {
       array_push($page['errors'], l10n('Extra CDN enable but not second cdn domain setup'));
   }
   else
   {

   /* handle file ext */
   $filetypes_arr = array_fill_keys(array_intersect_key($conf['file_ext'], array_unique(array_map('strtolower', $conf['file_ext']))), false);
   isset($_POST['filetypes']) ? $_POST['filetypes'] = array_merge($filetypes_arr, array_map( $func_arr_map, array_flip($_POST['filetypes']))) : $_POST['filetypes'] = $filetypes_arr;
   isset($_POST['filetypes_2']) ? $_POST['filetypes_2'] = array_merge($filetypes_arr, array_map( $func_arr_map, array_flip($_POST['filetypes_2']))) : $_POST['filetypes_2'] = $filetypes_arr;
   isset($_POST['filetypes_3']) ? $_POST['filetypes_3'] = array_merge($filetypes_arr, array_map( $func_arr_map, array_flip($_POST['filetypes_3']))) : $_POST['filetypes_3'] = $filetypes_arr;
   isset($_POST['filetypes_4']) ? $_POST['filetypes_4'] = array_merge($filetypes_arr, array_map( $func_arr_map, array_flip($_POST['filetypes_4']))) : $_POST['filetypes_4'] = $filetypes_arr;
   isset($_POST['filetypes_5']) ? $_POST['filetypes_5'] = array_merge($filetypes_arr, array_map( $func_arr_map, array_flip($_POST['filetypes_5']))) : $_POST['filetypes_5'] = $filetypes_arr;

   $conf['cdnplus_conf'] = array(
    'cdn_enabled'  => isset($_POST['cdn_enabled']),
    'cdn_extra_enabled' => isset($_POST['cdn_extra_enabled']),
    'cdn_1'    => array(
        'root' => $_POST['root'],
        'host' => $_POST['host'],
        'keep_https' => isset($_POST['keep_https']),
        'theme' => isset($_POST['theme']),
        'filetypes'=> $_POST['filetypes'],
        'extratypes'=> $_POST['extratypes'],
        'ignorefiles'=> $_POST['ignorefiles'],
        ),
    'cdn_2'    => array(
        'root' => $_POST['root_2'],
        'host' => $_POST['host_2'],
        'keep_https' => isset($_POST['keep_https_2']),
        'theme' => isset($_POST['theme_2']),
        'filetypes'=> $_POST['filetypes_2'],
        'extratypes'=> $_POST['extratypes_2'],
        'ignorefiles'=> $_POST['ignorefiles_2'],
        ),
    'cdn_3'    => array(
        'root' => $_POST['root_3'],
        'host' => $_POST['host_3'],
        'keep_https' => isset($_POST['keep_https_3']),
        'theme' => isset($_POST['theme_3']),
        'filetypes'=> $_POST['filetypes_3'],
        'extratypes'=> $_POST['extratypes_3'],
        'ignorefiles'=> $_POST['ignorefiles_3'],
        ),
    'cdn_4'    => array(
        'root' => $_POST['root_4'],
        'host' => $_POST['host_4'],
        'keep_https' => isset($_POST['keep_https_4']),
        'theme' => isset($_POST['theme_4']),
        'filetypes'=> $_POST['filetypes_4'],
        'extratypes'=> $_POST['extratypes_4'],
        'ignorefiles'=> $_POST['ignorefiles_4'],
        ),
    'cdn_5'    => array(
        'root' => $_POST['root_5'],
        'host' => $_POST['host_5'],
        'keep_https' => isset($_POST['keep_https_5']),
        'theme' => isset($_POST['theme_5']),
        'filetypes'=> $_POST['filetypes_5'],
        'extratypes'=> $_POST['extratypes_5'],
        'ignorefiles'=> $_POST['ignorefiles_5'],
        )
    );

      // Update config to DB
      conf_update_param('cdnplus_conf', serialize($conf['cdnplus_conf']));

      array_push($page['infos'], l10n('Your configuration settings are saved'));
    }
}

$template->set_filename('plugin_admin_content', dirname(__FILE__).'/admin.tpl');

// send value to template
$template->assign($conf['cdnplus_conf']);
$template->assign_var_from_handle('ADMIN_CONTENT', 'plugin_admin_content');
?>
