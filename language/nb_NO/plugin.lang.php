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
$lang['PLG_CDNPLUS'] = 'Dette programtillegget gir en enkel integrasjon med Content Delivery Network (CDN) for ditt galleri.';
$lang['CDN_USE_EXTRA_DESC'] = 'Velg for å aktivere en ekstra Content Delivery Network setup. Med denne måten kan du bruke forskjellige innstillinger for forskjellige filtyper, som separate innstillinger for bilder og videoer filer.';
$lang['CDN_USE_EXTRA_5'] = 'Bruk det femte CDN settet';
$lang['CDN_USE_EXTRA_4'] = 'Bruk det fjerde CDN settet';
$lang['CDN_USE_EXTRA_3'] = 'Bruk det tredje CDN settet';
$lang['CDN_FILE_TYPES'] = 'Filtyper';
$lang['CDN_USE_EXTRA_2'] = 'Bruk det andre CDN settet';
$lang['CDN_USE_EXTRA'] = 'Flere CDN røtter';
$lang['CDN_USE'] = 'CDN Alternativer';
$lang['CDN_THEME_DESC'] = 'Ekspoter filene til temaet, f.eks:js,css.';
$lang['CDN_THEME'] = 'Legg til temaet';
$lang['CDN_SITE_ROOT_DESC'] = 'Roten til nettstedet ditt som du har koblet til din CDN-server. <br/> Du trenger sannsynligvis ikke å endre dette, men hvis du trenger kan du spesifisere en undermappe som f.eks/bilder/.';
$lang['CDN_SITE_ROOT'] = 'Side Rot';
$lang['CDN_KEEP_HTTPS_DESC'] = 'Velg for å beholde https i cdn webadresser. Ellers vil cdn webadresser bruke http.';
$lang['CDN_KEEP_HTTPS'] = 'Behold HTTPS i webadresser';
$lang['CDN_IGNORE_FILES_DESC'] = 'En kommaseparert liste med (del av) sti/filnavn som skal ignoreres (webadresser vil ikke bli endret til CDN-server).';
$lang['CDN_IGNORE_FILES'] = 'Ignorer filer';
$lang['CDN_FILE_TYPES_DESC'] = 'Velg de filtyper som skal serveres fra CDN-serveren.';
$lang['CDN_EXTRA_FILETYPES_DESC'] = 'En kommaseparert liste med ekstra filtyper som skal serveres fra CDN-server, f.eks: png, jpg';
$lang['CDN_EXTRA_FILETYPES'] = 'Ekstra filtyper';
$lang['CDN_ENABLED_DESC'] = 'Tillater enkel integrering med et Content Delivery Network (CDN).';
$lang['CDN_ENABLED'] = 'Aktivert CDN';
$lang['CDN_DOMAIN_DESC'] = 'Domenet (host) av din CDN Server';
$lang['CDN_DOMAINS_DESC'] = 'Domene til din CDN Server.<br/>Du kan også angi en kommaseparert liste over forskjellige CDN domener. En av disse vil bli utnevnt til hver fil i tilfeldig rekkefølge.<br/><br/>Du kan bruke aliaser {underdomene}, {domene} og {forlengelse} for å referere til de ulike delene av domenenavnet til nettstedet ditt.';
$lang['CDN_DOMAIN'] = 'CDN Domene';