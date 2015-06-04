<?php
// +-----------------------------------------------------------------------+
// | Piwigo - a PHP based photo gallery                                    |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2008-2014 Piwigo Team                  http://piwigo.org |
// | Copyright(C) 2003-2008 PhpWebGallery Team    http://phpwebgallery.net |
// | Copyright(C) 2002-2003 Pierrick LE GALL   http://le-gall.net/pierrick |
// +-----------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify  |
// | it under the terms of the GNU General Public License as published by  |
// | the Free Software Foundation                                          |
// |                                                                       |
// | This program is distributed in the hope that it will be useful, but   |
// | WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU      |
// | General Public License for more details.                              |
// |                                                                       |
// | You should have received a copy of the GNU General Public License     |
// | along with this program; if not, write to the Free Software           |
// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, |
// | USA.                                                                  |
// +-----------------------------------------------------------------------+
$lang['CDN_DOMAINS_DESC'] = '您CDN服务器的域名。<br />您也可给出一个以逗号分隔的不同CDN服务器域名的清单。其中的某个将随机分配给每个文件。<br /><br />您可使用占位符 {subdomain}, {domain} 和 {extension} 来指涉您网站域名的不同部分。';
$lang['CDN_EXTRA_FILETYPES_DESC'] = '一个以逗号分隔的更多文件类型清单，其中的文件类型将可获得您的CDN服务器的服务，如： png,jpg';
$lang['CDN_IGNORE_FILES_DESC'] = '一个以逗号分隔的想忽略的目录/文件名清单(url将不会被转为CDN服务器)';
$lang['CDN_USE_EXTRA_DESC'] = '选择以启用一个新的内容传递网络(CDN)设定。这样您就可以做到对不同的文件类型使用不同的设定，比如对图片和视频文件采用不同设定。';
$lang['PLG_CDNPLUS'] = '本插件可为您的图库轻松实现与内容传递网络(CDN)的集成。';
$lang['CDN_USE_EXTRA_2'] = '使用第2个CDN设定';
$lang['CDN_USE_EXTRA_3'] = '使用第3个CDN设定';
$lang['CDN_USE_EXTRA_4'] = '使用第4个CDN设定';
$lang['CDN_USE_EXTRA_5'] = '使用第5个CDN设定';
$lang['CDN_KEEP_HTTPS'] = '保留url地址中的HTTPS';
$lang['CDN_KEEP_HTTPS_DESC'] = '选中，以在CDN url地址中保留HTTPS。否则CDN url地址将使用http。';
$lang['CDN_DOMAIN'] = 'CDN域名';
$lang['CDN_DOMAIN_DESC'] = '您CDN服务器的域名(host)';
$lang['CDN_ENABLED'] = '已启用的CDN';
$lang['CDN_ENABLED_DESC'] = '可轻松实现与内容传递网络(CDN)的集成。';
$lang['CDN_EXTRA_FILETYPES'] = '更多文件类型';
$lang['CDN_FILE_TYPES'] = '文件类型';
$lang['CDN_FILE_TYPES_DESC'] = '选择可获得您的CDN服务器服务的文件类型。';
$lang['CDN_IGNORE_FILES'] = '忽略文件';
$lang['CDN_SITE_ROOT'] = '站点根目录';
$lang['CDN_SITE_ROOT_DESC'] = '您连接至CDN服务器的网站的根目录。<br />您可能无需改变此项，如有需要，您可指定一个子目录，如 /images/。';
$lang['CDN_THEME'] = '应用到主题';
$lang['CDN_THEME_DESC'] = '导出主题文件，比如： js,css。';
$lang['CDN_USE'] = 'CDN选项';
$lang['CDN_USE_EXTRA'] = '多个CDN根目录';