<?php
/**
 * article_processing Addon
 * @author j.mandl[at]met-net[dot]net Jochen S. Mandl
 * @package redaxo4.3
 * @version 1.1.0
 */	
function article_processing_frontend($params) 
{       		
	global $REX;	
	global $I18N_ARTICLE_EDIT;	
	global $article_processingIniFile;
	require_once $REX['INCLUDE_PATH'].'/addons/article_processing/functions/button_frontend.inc.php';
		
	if (file_exists($article_processingIniFile)) 
	{
		$settings = parse_ini_file($article_processingIniFile, TRUE); //Auslesen der .ini mit Gruppen
			
		$frontend_on	=	$settings['System']['frontend'];
		$bilder			=	$settings['Images'];	
		$img_width		=	($settings['Images']['img_masse'] != "") ? "width=\"".$settings['Images']['img_masse']."px\"" : "";		
			
		// div style 
		$style_div	=	ap_style($settings['Style']);
	}			
	
	if ($frontend_on == "1") 
	{		
				$bearbeiten	=	"<div id=\"article_processing\"  style=\"".$style_div."\"> $Basedir";
	// Artikel Bearbeitung		
				$bearbeiten	.=	"<ul class='ap_button'>";		
		foreach($bilder as $value => $key)
		{
			if($value != "img_masse")
			{							
				$bearbeiten	.=	"<li>";
				$bearbeiten	.=	ap_img($key, $value, $img_width);
				$bearbeiten	.=	"</li>";
			}
							
		}		
				$bearbeiten	.=	"</ul>";
				$bearbeiten	.=	"</div>";
				
				
		$output	=	$params['subject'];		
		$output	=	preg_replace('/<body(\s[^>]*)?>/i', '<body\\1>' . $bearbeiten, $output);
					
		return $output;	
		
	}
	
}

?>