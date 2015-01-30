<?php
/***********************************************
* File      :   maintain.class.php
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

class cdnplus_maintain extends PluginMaintain {

  private $default_config = array(
    'cdn_enabled'  => false,
    'cdn_extra_enabled' => false,
    'cdn_1'    => array(
	'root' => '',
 	'host' => '',
	'keep_https' => '',
	'filetypes'=> '',
	'extratypes'=> '',
	'ignorefiles'=> '',
        ),
    'cdn_2'    => array(
	'root' => '',
 	'host' => '',
	'keep_https' => '',
	'filetypes'=> '',
	'extratypes'=> '',
	'ignorefiles'=> '',
        ),
    'cdn_3'    => array(
	'root' => '',
 	'host' => '',
	'keep_https' => '',
	'filetypes'=> '',
	'extratypes'=> '',
	'ignorefiles'=> '',
        ),
    'cdn_4'    => array(
	'root' => '',
 	'host' => '',
	'keep_https' => '',
	'filetypes'=> '',
	'extratypes'=> '',
	'ignorefiles'=> '',
        ),
    'cdn_5'    => array(
	'root' => '',
 	'host' => '',
	'keep_https' => '',
	'filetypes'=> '',
	'extratypes'=> '',
	'ignorefiles'=> '',
        )
    );

  function install($plugin_version, &$errors=array())
  {
    global $conf;

    // configuration
    if (!isset($conf['cdnplus_conf']) || empty($conf['cdnplus_conf']))
    {
      $this->default_config['last_clean'] = time();
      /* Generate file_ext from current ext supported */
      $filetypes_arr = array_fill_keys(array_intersect_key($conf['file_ext'], array_unique(array_map('strtolower', $conf['file_ext']))), false);
      $this->default_config['cdn_1']['filetypes'] = $filetypes_arr;
      $this->default_config['cdn_2']['filetypes'] = $filetypes_arr;
      $this->default_config['cdn_3']['filetypes'] = $filetypes_arr;
      $this->default_config['cdn_4']['filetypes'] = $filetypes_arr;
      $this->default_config['cdn_5']['filetypes'] = $filetypes_arr;

      conf_update_param('cdnplus_conf', $this->default_config, true);

      $q = 'UPDATE '.CONFIG_TABLE.' SET `comment` = "Configuration settings for piwigo-cdnplus plugin" WHERE `param` = "cdnplus_conf";';
      pwg_query( $q );
    }
    else
    {
      $new_conf = safe_unserialize($conf['cdnplus_conf']);

      conf_update_param('cdnplus_conf', $new_conf, true);
    }
  }

  function activate($plugin_version, &$errors=array()) {
  }

  function update($old_version, $new_version, &$errors=array())
  {
   $this->install($new_version, $errors);
  }

  function deactivate()
  {
  }

  function uninstall()
  {
    global $conf;

    conf_delete_param('cdnplus_conf');
  }

}

?>
