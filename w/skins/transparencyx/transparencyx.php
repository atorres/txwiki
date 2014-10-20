<?php
/**
 * TransparencyX skin
 *
 * @file
 * @ingroup Skins
 * @author TransparencyX (http://www.transparencyx.com)
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */
 
 if( !defined( 'MEDIAWIKI' ) ) die( "This is an extension to the MediaWiki package and cannot be run standalone." );
 
$wgExtensionCredits['skin'][] = array(
	'path' => __FILE__,
	'name' => 'TransparencyX', // name as shown under [[Special:Version]]
	'version' => '1.0',
	'date' => '20140701',
	'url' => '[http://www.transparencyx.com]',
);

$wgValidSkinNames['transparencyx'] = 'TransparencyX';
$wgAutoloadClasses['SkinTransparencyX'] = __DIR__ . '/TransparencyX.skin.php';
$wgExtensionMessagesFiles['TransparencyX'] = __DIR__ .'/TransparencyX.i18n.php';
 
$wgResourceModules['skins.transparencyx'] = array(
	'styles' => array(
		'transparencyx/css/main.css' => array( 'media' => 'screen' ),
	),
	'remoteBasePath' => &$GLOBALS['wgStylePath'],
	'localBasePath' => &$GLOBALS['wgStyleDirectory'],
);

$wgResourceModules['skins.transparencyx.js'] = array(
	'scripts' => array(
		'transparencyx/js/modernizr.custom.87446.js',	
	),
	'remoteBasePath' => &$GLOBALS['wgStylePath'],
	'localBasePath' => &$GLOBALS['wgStyleDirectory'],
);