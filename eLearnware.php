<?php
/**
 * eLearnware Namespace
 *
 * @file
 * @ingroup Extensions
 * @version 1.0
 * @author Eranga Bandara Mapa <erangamapa@gmail.com> - original code/ideas
 */
if (!defined('MEDIAWIKI')) {
        echo <<<EOT
To install eLearnware, put the following line in LocalSettings.php:
require_once( "\$IP/extensions/eLearnware/eLearnware.php" );
EOT;
        exit( 1 );
}

// Extension credits that show up on Special:Version
$wgExtensionCredits['specialpage'][] = array(
        'path' => __FILE__,
        'name' => 'eLearnware',
        'author' => 'Eranga Bandara Mapa',
        'url' => 'https://www.mediawiki.org/wiki/Extension:eLearnware',
        'descriptionmsg' => 'eLearnware-desc',
        'version' => '1.0.0',
);


$dir = dirname(__FILE__) . '/';
$myPath='/mediawiki/mediawiki-1.18.0/extensions/eLearnware/';

//Loading class path to get directory details
$wgAutoloadClasses['Path']=$dir.'Path.php';

//Loading template classes
$wgAutoloadClasses['eViewerTemplate']=$dir.'eViewerTemplate.php';
$wgAutoloadClasses['eEditorTemplate']=$dir.'eEditorTemplate.php';
$wgAutoloadClasses['eListTemplate']=$dir.'eListTemplate.php';
$wgAutoloadClasses['eUploadTemplate']=$dir.'eUploadTemplate.php';
$wgAutoloadClasses['eContentDeleteTemplate']=$dir.'eContentDeleteTemplate.php';

//Loading data controller class
$wgAutoloadClasses['eDataController']=$dir.'eDataController.php';

//Loading parser functions
$wgExtensionFunctions[] = "eEditorParsing";
$wgExtensionFunctions[] = "eViewerParsing";
$wgExtensionFunctions[] = "eListParsing";
$wgExtensionFunctions[] = "eUploadParsing";
$wgExtensionFunctions[] = "eContentDeleteParsing";

//Parser binding functions
function eEditorParsing() {
    global $wgParser;
    $wgParser->setHook( "eeditor", "eEditorParser" );
}
function eViewerParsing() {
    global $wgParser;
    $wgParser->setHook( "eviewer", "eViewerParser" );
}
function eListParsing() {
    global $wgParser;
    $wgParser->setHook( "elist", "eListParser" );
}
function eUploadParsing() {
    global $wgParser;
    $wgParser->setHook( "eupload", "eUploadParser" );
}
function eContentDeleteParsing() {
    global $wgParser;
    $wgParser->setHook( "econtentdelete", "eContentDeleteParser" );
}

//Template feeding functions for parser
function eEditorParser( $paramstring, $params = array() ){
	$html=eEditorTemplate::getHTML($params);
	return $html;
}
function eViewerParser( $paramstring, $params = array() ){
	$html=eViewerTemplate::getHTML($params);
	return $html;
}
function eListParser( $paramstring, $params = array() ){
	$html=eListTemplate::getHTML($params);
	return $html;
}
function eUploadParser( $paramstring, $params = array() ){
	$html=eUploadTemplate::getHTML();
	return $html;
}
function eContentDeleteParser( $paramstring, $params = array() ){
	$html=eContentDeleteTemplate::getHTML($params);
	return $html;
}
 
//Loading internationalization and alias files to extention
$wgExtensionMessagesFiles['eLearnware'] = $dir . 'eLearnware.i18n.php'; # Location of a messages file (Tell MediaWiki to load this file)
$wgExtensionMessagesFiles['eLearnwareAlias'] = $dir . 'eLearnware.alias.php'; # Location of an aliases file (Tell MediaWiki to load this file)


//Location of the SpecialeLearnware class (Tell MediaWiki to load this file)
$wgAutoloadClasses['Editor'] = $dir . 'SpecialEditor.php'; 
$wgAutoloadClasses['Viewer'] = $dir . 'SpecialViewer.php'; 

//Tell MediaWiki about the new special page and its class name
$wgSpecialPages['Editor'] = 'Editor'; 
$wgSpecialPages['Viewer'] = 'Viewer'; 

//Catogorise mediawiki special pages
$wgSpecialPageGroups['Editor'] = 'other';
$wgSpecialPageGroups['Viewer'] = 'other';
?>