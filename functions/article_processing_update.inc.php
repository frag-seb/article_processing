<?php
/**
 * article_processing Addon
 * @author j.mandl[at]met-net[dot]net Jochen S. Mandl
 * @package redaxo4.3
 * @version 1.1.1
 */	
function article_processing_update($addon_v, $addonkey)
{
	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_HTTPHEADER      => array('Content-type: application/json'),
		CURLOPT_RETURNTRANSFER  => true,
		CURLOPT_URL             => 'http://www.redaxo.org/de/_system/_webservice/addons/?v='.$addon_v.'&addonkey='.$addonkey.''
  	));
	$res = curl_exec($ch);
	curl_close($ch);
 
	if( $res )
	{
		$json = json_decode($res,true);
		return $json[0];
	}
	return false;
}


function ap_update_check($addon_v, $addonkey, $version)
{
	global $I18N_ARTICLE_EDIT;	
	$version_array = article_processing_update($addon_v, $addonkey);
	if(isset($version_array)){ 
		foreach($version_array as $value => $key)
		{			
			switch($value)
			{
				case "file_version":
					$version_new = $key;
				break;
				
				case "file_path":
					$version_url = $key;
				break;
				
				case "file_name":
					$version_name = $key;
				break;
				
				case "addon_shortdescription":
					$addon_shortdescription = $key;
				break;
			}
		}
	}else
	{
		return FALSE;
	}
	
	if($version < $version_new){
		echo rex_info(''.$I18N_ARTICLE_EDIT->Msg('a7881_update_version').' <a href="'.$version_url.'" title="'.$addon_shortdescription.'">'.$version_name.' '.$version_new.'</a>');
	}
}