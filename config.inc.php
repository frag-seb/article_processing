<?php
/**
 * article_processing Addon
 * @author j.mandl[at]met-net[dot]net Jochen Mandl
 * @package redaxo4.5
 * @version 1.1.2
 */
 
	$mypage = "article_processing"; 	
						
	$I18N_ARTICLE_EDIT = new i18n($REX['LANG'],$REX['INCLUDE_PATH']."/addons/$mypage/lang");  	
		
	$REX['ADDON']['rxid'][$mypage]	= '7881';
	$REX['ADDON']['name'][$mypage]	= $I18N_ARTICLE_EDIT->Msg('a7881_title');
	$REX['ADDON']['page'][$mypage]	= $mypage;
	$REX['ADDON']['perm'][$mypage]	= 'article_processing[]';
	$REX['ADDON']['version'][$mypage] = '1.1.2';
	$REX['ADDON']['redaxo_version'][$mypage] = '4.3';
	$REX['ADDON']['author'][$mypage] = "Jochen S. Mandl / cukabeka";
	$REX['PERM'][]	= 'article_processing[]';	
	

	//$Basedir = dirname(__FILE__);
	$article_processingIniFile = $REX['INCLUDE_PATH'] . "/addons/" . $mypage . "/" . $mypage . ".ini";
	
	require_once $REX['INCLUDE_PATH'].'/addons/'.$mypage.'/functions/article_processing_extensions.inc.php';
	require_once $REX['INCLUDE_PATH'].'/addons/'.$mypage.'/functions/article_processing_frotend.inc.php';	

		rex_register_extension('PAGE_HEADER', 'rex_a7881_css_back');
		
	#session_set_cookie_params(0, '/', 'naschdwor.org', false, false);
	//session_set_cookie_params(0, '/', NULL, TRUE, TRUE);
	//ini_set('session.cookie_domain','.naschdwor.org');
	
	if(!isset($_SESSION)) { 
    	session_start(); 
	}  
	
	//var_dump($_SESSION[$REX['INSTNAME']]);
	//$logged_in = ( $_SESSION[$REX['INSTNAME']]['UID'] == "" ) ? true : false;	
	$logged_in = ( $_SESSION[$REX['INSTNAME']]['UID'] != "" ) ? true : false;	
	
	if($REX['GG'] &&  $logged_in == true){			
		rex_register_extension('OUTPUT_FILTER', 'rex_a7881_css_front');		
		rex_register_extension('OUTPUT_FILTER', 'article_processing_frontend');	
		
	}
	
?>