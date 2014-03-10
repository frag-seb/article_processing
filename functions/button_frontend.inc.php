<?php
/**
 * article_processing Addon
 * @author j.mandl[at]met-net[dot]net Jochen S. Mandl
 * @package redaxo4.3
 * @version 1.1.1
 */	
	function ap_img($img, $name, $img_width){

	global $REX;
	global $I18N_ARTICLE_EDIT;	
	global $cat;
	
	$page			=	"/redaxo/index.php?page=";	
	$art_id			=	$REX['ARTICLE']->getValue('article_id');
	$cat_id			=	$REX['ARTICLE']->getValue('category_id');
	$clang_id		=	$REX['ARTICLE']->getValue('clang');
				
	$cat			=	OOCategory::getCategoryById($cat_id);
	$cat_re_id		=	$cat->getParentId();
		
	$url = "";
	switch ($name) 
	{
		case "a7881_edit":
	
			$url	=	"{$page}content&article_id={$art_id}&category_id={$cat_id}&mode=edit&clang={$clang_id}";
        	break;
		
		case "a7881_meta":
	
        	$url	=	"{$page}content&article_id={$art_id}&category_id={$cat_id}&mode=meta&clang={$clang_id}";
        	break;
		
		case "a7881_status":
			$url_1	=	"{$page}structure&category_id={$cat_re_id}&edit_id={$cat_id}&function=status&clang={$clang_id}";
			$url_2	=	"{$page}structure&article_id={$art_id}&function=status_article&category_id={$cat_id}&clang={$clang_id}";
				
			$url	=	($cat_id == $art_id)? "$url_1" : "$url_2";
		
       	 break;
		 
		case "a7881_logout":
	
        	$url	=	"/redaxo/index.php?rex_logout=1";
        	break;
		
	}
		$button		=	"<a style='cursor:pointer;' onClick=\"window.open('".$url."','admin_addon')\">";
		
	if($img == "")
	{
		$button .=	$I18N_ARTICLE_EDIT->Msg($name);
		
	}else
	{
		$button .=	"<img alt=\"";
		$button .=	"".$I18N_ARTICLE_EDIT->Msg($name)."";
		$button .=	"\" title=\"";
		$button .=	"".$I18N_ARTICLE_EDIT->Msg($name)."";
		$button .=	"\" {$img_width} src=\"./files/{$img}\" />";
		
	}
		$button .=	"</a>&nbsp; \n";	
	return $button;
  }
  
  
 
    function ap_style($name)
	{
		$style	= "";
		foreach($name as $value => $key)
		{
			$style	.=	($key == "") ? "" : " $value: $key ;";
		}
		return $style;
		
	}


?>