<?php
/**
 * article_processing Addon
 * @author j.mandl[at]met-net[dot]net Jochen S. Mandl
 * @package redaxo4.3
 * @version 1.1.1
 */	
 	$mypage = "article_processing";
		
	$addon_v	= $REX['ADDON']['redaxo_version'][$mypage];	
	$version	= $REX['ADDON']['version'][$mypage];
	$author 	= $REX['ADDON']['author'][$mypage];
	
	require $REX['INCLUDE_PATH']."/layout/top.php";    
	require_once $REX['INCLUDE_PATH'].'/addons/'.$mypage.'/functions/article_processing_update.inc.php';
	require_once $REX['INCLUDE_PATH'].'/addons/'.$mypage.'/functions/article_processing_setting.inc.php';
	
	$subpages = array (
		array( 'settings', $I18N_ARTICLE_EDIT->Msg('a7881_head_1')),
		array( 'info', $I18N_ARTICLE_EDIT->Msg('a7881_head_2'))		
	);

	rex_title($I18N_ARTICLE_EDIT->Msg('a7881_title') . ' ' . $version, $subpages);
	$update_check = ap_update_check($addon_v, $mypage, $version);

	$subpage = rex_request('subpage', 'string', '');	
	$func    = rex_request('func', 'string', '');
	$view    = rex_request('view', 'string', '');	
	
	switch ($subpage)
	{
	case "settings":
        $file = dirname(__FILE__).'/settings.inc.php';
        break;
	case "info":
        $file = dirname(__FILE__).'/info.inc.php';
        break;	
	default:
		$file = dirname(__FILE__).'/settings.inc.php';
		break;
	}
	
	$update_check = ap_update_check($addon_v, $mypage, $version);
	
    if ($file != "")
		require $update_check.$file;

	require $REX['INCLUDE_PATH']."/layout/bottom.php";

?>