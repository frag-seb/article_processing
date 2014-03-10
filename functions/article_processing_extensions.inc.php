<?php
/**
 * article_processing Addon
 * @author j.mandl[at]met-net[dot]net Jochen Mandl
 * @package redaxo4.3
 * @version 1.1.1
 */
function rex_a7881_css_front($params)
{
	$mypage = "article_processing"; 
	$css = '<link rel="stylesheet" type="text/css" href="../files/addons/'.$mypage.'/frontend.css" />'."\n  ";
	$output	=	$params['subject'];		
	$output	=	preg_replace('/<\/head(\s[^>]*)?>/i', $css . '</head\\1>', $output);

	return $output;	
}

function rex_a7881_css_back($params)
{

	$mypage = "article_processing";
	$params['subject'] .= "\n  "
    					  .'<link rel="stylesheet" type="text/css" href="../files/addons/'.$mypage.'/backend.css" />';
	return $params['subject'];
}