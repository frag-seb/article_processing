<?php
/**
 * article_processing Addon
 * @author j.mandl[at]met-net[dot]net Jochen S. Mandl
 * @package redaxo4.3
 * @version 1.1.1
 */	
function ap_post($pos_value, $pos_key, $norm)
{
	global $norm_img;
	
	$new_ini2  = "";
	switch ($pos_value)
			{
				case "system":
						$new_ini2  .= "[System]" . chr(10);		
			
					foreach($pos_key as $value => $key)
					{					
						$key =  ($value == "0") ? "" : "$key";	
						$new_ini2 .= $value." = " . $key . chr(10);							
					}
						$new_ini2 .= "" . chr(10);
				break;
				
				case "images":
						$new_ini2  .= "[Images]" . chr(10);		
			
					foreach($pos_key as $value => $key)
					{		
						if($value != "norm" && $value != "img_masse")
						{	
							if($norm == "1"){
								$key =  ($value == "") ? "" : "$norm_img[$value]";							
								$new_ini2 .= $value." = " . $key . chr(10);	
							}else
							{
								$key =  ($value == "") ? "" : "$key";
								$new_ini2 .= $value." = " . $key . chr(10);	
							}
							
						}elseif($value == "img_masse")
						{
							$key =  ($value == "") ? "" : "$key";								
							$new_ini2 .= $value." = " . $key . chr(10);	

						}
						
					}
						$new_ini2 .= "" . chr(10);
				break;
				
				case "style":
						$new_ini2  .= "[Style]" . chr(10);		
			
					foreach($pos_key as $value => $key)
					{					
						$key =  ($value == "") ? "" : "$key";						
						$new_ini2 .= $value." = " . $key . chr(10);	
						
					}
						$new_ini2 .= "" . chr(10);
				break;
				
				default:
					$new_ini2  .= "[default]" . chr(10);		
			
					foreach($pos_key as $value => $key)
					{					
						$key =  ($value == "") ? "" : "$key";						
						$new_ini2 .= $value." = " . $key . chr(10);	
						
					}
						$new_ini2 .= "" . chr(10);
				
			}
			
			
			return $new_ini2;
}
?>