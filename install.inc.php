<?php
/**
 * article_processing Addon
 * @author j.mandl[at]met-net[dot]net Jochen Mandl
 * @package redaxo4.3
 * @version 1.1.1
 */
 
 $error = '';
 $mypage = 'article_processing'; 
 $source_dir = $REX['INCLUDE_PATH'] . "/addons/" . $mypage . "/" . $mypage . ".ini";
 $I18N_ARTICLE_EDIT = new i18n($REX['LANG'],$REX['INCLUDE_PATH']."/addons/$mypage/lang");  
 
$is_writeable=is_writeable($source_dir); 
if($is_writeable==false){ 
    $error  = $I18N_ARTICLE_EDIT->Msg('a7881_error'); 
	$error .= $mypage.".ini"; 
    /** 
     * Rechte der Datei ändern... 
     */ 
} 

if($error != '')
		$REX['ADDON']['installmsg'][$mypage] = $error;
	else
		$REX['ADDON']['install'][$mypage] = 1;

?>