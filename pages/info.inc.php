<?php
/**
 * article_processing Addon
 * @author j.mandl[at]met-net[dot]net Jochen S. Mandl
 * @package redaxo4.3
 * @version 1.1.1
 */	

$addon = article_processing_update($addon_v, $mypage);
if(isset($addon)){
?>

<div class="rex-addon-output">

  <h2 class="rex-hl2"><?php echo $addon['addon_name'] .'&nbsp;'. $addon['file_version']; ?></h2>
  <div class="rex-addon-content">
  <p class="rex-tx1">
		Hier finden Sie die aktulle zum Download bereit gestellte Beschreibung des Addon.<br />
        Es wären alle änderungen hier aufgeführ und Sie bekommen immer die neuse entwicklung <br />
        des Addons mit.
        <br />
    </p>
  </div>
  </div>
  <div class="rex-addon-output">
  <h2 class="rex-hl2">Beschreibung</h2>
  <div class="rex-addon-content">
  <p class="rex-tx1">
		<?php echo $addon['addon_description']; ?><br />
    </p>
    <p class="rex-tx1">
		<?php echo $addon['file_description']; ?>     
     <br /><br />        
        Zum Downlad : <a href="<?php echo $addon['file_path']; ?>" title="<?php echo $addon['addon_name'] .'&nbsp;'. $addon['file_version']; ?>"><?php echo $addon['addon_name'] .'&nbsp;'. $addon['file_version']; ?></a>       
        
    </p>
  </div>
</div>
<?php
}
?>
<div class="rex-addon-output">
  <h2 class="rex-hl2">Copyright</h2>
  <div class="rex-addon-content">
    <p class="rex-tx1">
		<?php echo $mypage; ?> &copy; 2011 by <?php echo $author; ?><br /><br />
		<a href="http://www.met-net.net" title="MET Elektro">www.met-net.net</a> | MET Elektro<br /><br />
    </p>
  </div>
</div>