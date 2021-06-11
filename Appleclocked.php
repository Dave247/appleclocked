<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 * @ingroup Skins
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( -1 );
}

$GLOBALS['wgExtensionCredits']['skin'][] = array(
	'path'           => __FILE__,
	'name'           => 'Appleclocked',
	'namemsg'        => 'skinname-appleclocked',
	'descriptionmsg' => 'appleclocked-desc',
	'author'         => 'PCGamingWiki Team',
	'url'            => "https://github.com/PCGamingWiki/appleclocked",
	'license-name'   => 'GPL-2.0+',
);

$GLOBALS['wgAutoloadClasses']['SkinAppleclocked'] = __DIR__ . '/Appleclocked.skin.php';
$GLOBALS['wgMessagesDirs']['Appleclocked'] = __DIR__ . '/i18n';

$GLOBALS['wgValidSkinNames']['appleclocked'] = 'Appleclocked';

$GLOBALS['wgHooks']['GetPreferences'][] = 'wfPrefHook';

function wfPrefHook( $user, &$preferences ) {
	$preferences['overclocked-ads'] = array(
		'type' => 'toggle',
		'label-message' => 'tog-ads',
		'section' => 'rendering/skin',
	);
	$preferences['overclocked-floating-toc'] = array(
		'type' => 'toggle',
		'label-message' => 'tog-floating-toc',
		'section' => 'rendering/skin',
	);

	return true;
}

$GLOBALS['wgDefaultUserOptions']['overclocked-ads'] = 0;
$GLOBALS['wgDefaultUserOptions']['overclocked-floating-toc'] = 0;

$GLOBALS['wgResourceModules']['skins.appleclocked.styles'] = array(
	'styles' => array(
		'resources/general-header.less',
		'resources/general-footer.less',
		'resources/general-personalbar.less',
		'resources/general-toc.less',
		'resources/general-inputfields.less',
		'resources/general-specialpages.less',
		'resources/pcgw.less',
		'resources/pcgw-templates.less',
		'resources/pcgw-icons.less',
		'resources/mediawiki.custom.less',
		'resources/mediawiki.mediaviewer.overrides.less',
		'resources/page-home.less',
		'resources/page-extension.less',
		'resources/page-donate.less',
		'resources/page-editing-guide.less',
		'resources/other.less',
	),
	'remoteSkinPath' => 'overclocked',
	'localBasePath' => __DIR__,
);

$GLOBALS['wgResourceModules']['skins.appleclocked.js'] = array(
	'scripts' => array(
		'resources/jquery/jquery.waypoints.min.js',
		'resources/jquery/jquery.ba-outside-events.min.js',
		'resources/pcgw.js',
	),
	'remoteSkinPath' => 'overclocked',
	'localBasePath' => __DIR__,
);

$GLOBALS['wgResourceModuleSkinStyles']['appleclocked'] = array(
	'mediawiki.special.preferences' => 'resources/mediawiki.special.preferences.less',
	'remoteSkinPath' => 'appleclocked',
	'localBasePath' => __DIR__,
);

/**
 * Ad set up - set these in your LocalSettings.php
 * header - banner above article body
 * sidebar - in sidebar (not visible on mobile)
 * footer - above footer, below content
 * infobox - intended for a square ad above infobox
 */
$GLOBALS['wgSkinOverclockedAds'] = array(
	'tag'     => '',
	'header'  => '',
	'sidebar' => '',
	'footer'  => '',
	'infobox' => '',
);
