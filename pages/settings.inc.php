<?php
/**
 * article_processing Addon
 * @author j.mandl[at]met-net[dot]net Jochen S. Mandl
 * @package redaxo4.3
 * @version 1.1.1
 */	
 	$thissubpage				=	"settings";
	$baseURL					=	"index.php?page=".$mypage."&amp;subpage=".$thissubpage;
	$article_processingIniFile	=	$REX['INCLUDE_PATH'] . "/addons/" . $mypage . "/" . $mypage . ".ini";
#	$norm_img['a7881_edit']		=	"addons/" . $mypage . "/bearbeiten.png";
#	$norm_img['a7881_meta']		=	"addons/" . $mypage . "/metadaten.png";
#	$norm_img['a7881_status']	=	"addons/" . $mypage . "/status.png";
#	$norm_img['a7881_logout']	=	"addons/" . $mypage . "/abmelden.png";
	$norm_img['a7881_edit']		=	"";
	$norm_img['a7881_meta']		=	"";
	$norm_img['a7881_status']	=	"";
	$norm_img['a7881_logout']	=	"";
	$post						=	rex_request('value',	'array');
	$norm 						=	$post['images']['norm'];
	
 	//$_POST		
	if ($func == "save")
	{				
		foreach($post as $pos_value => $pos_key)
		{
			$new_ini .= ap_post($pos_value, $pos_key, $norm);			
		}

		$ap = fopen($article_processingIniFile, 'w') or die("".$I18N_ARTICLE_EDIT->Msg('a7881_error'). "" . $mypage . ".ini.");
		fwrite($ap, $new_ini);
		fclose($ap);
	}

	if (file_exists($article_processingIniFile)) {
		$settings = parse_ini_file($article_processingIniFile); 
		
		foreach($settings as $value => $key)
		{
			$set[''.$value.''] = $key;
		}
	}

		/*
		echo "<pre>";
		print_r($post);
		echo "</pre>";
		*/
?>

<div class="rex-addon-output">
  <h2 class="rex-hl2"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_subheader_cfg1'); ?></h2>
  <div id="rex-addon-editmode" class="rex-form">
    <form action="<?php echo $baseURL; ?>" name="<?php echo $mypage; ?>1" method="post">
      <fieldset class="rex-form-col-1">
        <input type="hidden" name="page" value="<?php echo $mypage; ?>" />
        <input type="hidden" name="subpage" value="<?php echo $thissubpage; ?>" />
        <input type="hidden" name="func" value="save" />
        <div class="rex-form-wrapper">
          <div class="rex-form-row">
            <p class="rex-form-text">
              <label for="frontend_on"><b><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_rights_meta'); ?></b></label>
              <input name="value[system][rights_meta]" type="hidden" value="0"  />
              <input name="value[system][rights_meta]" type="checkbox" value="1"  <?php echo ($set['frontend'] == 0) ? "" : "checked='checked'"; ?>/>            <hr />
            </p>
          </div>
          <div class="rex-form-row">
            <p class="rex-form-text">
              <label for="frontend_on"><b><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_subheader_cfg2'); ?></b></label>
            <hr />
            </p>
          </div>
          <div class="rex-form-row">
            <p class="rex-form-text">
              <label for="frontend_on"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_script_status'); ?></label>
              <input name="value[system][frontend]" type="hidden" value="0"  />
              <input name="value[system][frontend]" type="checkbox" value="1"  <?php echo ($set['frontend'] == 0) ? "" : "checked='checked'"; ?>/>
            </p>
          </div>
          <div class="rex-form-row">
            <p class="rex-form-text">
              <label for="frontend_on"><b><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_subheader_cfg3'); ?></b></label>
            <hr />
            </p>
          </div>
          <div class="rex-form-row">
            <p class="rex-form-text">
              <label for="img"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_back_image'); ?></label>
              <input type="hidden" size="30" name="value[images][norm]" value="" />
              <input type="checkbox" size="30" name="value[images][norm]" value="1" />
            </p>
          </div>
          <div class="rex-form-row">
            <p class="rex-form-text">
              <label for="img"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_1'); ?></label>
              <input type="text" size="30" style="width: 270px; height: 15px;" name="value[images][a7881_edit]" id="REX_MEDIA_1" readonly  value="<?php echo $set['a7881_edit']; ?>" />
              <span class="rex-widget-column rex-widget-column-first"> <a href="#" class="rex-icon-file-open" onclick="openREXMedia(1,'');return false;" title="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_1_a_title'); ?>" tabindex="30"> <img src="media/file_open.gif" width="16" height="16" alt="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_1_img_title'); ?>" title="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_1_img_title'); ?>" /> </a> <a href="#" class="rex-icon-file-delete" onclick="deleteREXMedia(1);return false;" title="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_2_a_title'); ?>" tabindex="32"> <img src="media/file_del.gif" width="16" height="16" title="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_2_img_title'); ?>" alt="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_2_img_title'); ?>" /> </a> </span> </p>
          </div>
          <div class="rex-form-row">
            <p class="rex-form-text">
              <label for="img"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_2'); ?></label>
              <input type="text" size="20" style="width: 270px; height: 15px;" name="value[images][a7881_meta]" id="REX_MEDIA_2" readonly  value="<?php echo $set['a7881_meta']; ?>" />
              <span class="rex-widget-column rex-widget-column-first"> <a href="#" class="rex-icon-file-open" onclick="openREXMedia(2,'');return false;" title="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_1_a_title'); ?>" tabindex="30"> <img src="media/file_open.gif" width="16" height="16" alt="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_1_img_title'); ?>" title="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_1_img_title'); ?>" /> </a> <a href="#" class="rex-icon-file-delete" onclick="deleteREXMedia(2);return false;" title="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_2_a_title'); ?>" tabindex="32"> <img src="media/file_del.gif" width="16" height="16" title="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_2_img_title'); ?>" alt="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_2_img_title'); ?>" /> </a> </span> </p>
          </div>
          <div class="rex-form-row">
            <p class="rex-form-text">
              <label for="img"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_3'); ?></label>
              <input type="text" size="20" style="width: 270px; height: 15px;" name="value[images][a7881_status]" id="REX_MEDIA_3" readonly  value="<?php echo $set['a7881_status']; ?>" />
              <span class="rex-widget-column rex-widget-column-first"> <a href="#" class="rex-icon-file-open" onclick="openREXMedia(3,'');return false;" title="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_1_a_title'); ?>" tabindex="30"> <img src="media/file_open.gif" width="16" height="16" alt="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_1_img_title'); ?>" title="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_1_img_title'); ?>" /> </a> <a href="#" class="rex-icon-file-delete" onclick="deleteREXMedia(3);return false;" title="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_2_a_title'); ?>" tabindex="32"> <img src="media/file_del.gif" width="16" height="16" title="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_2_img_title'); ?>" alt="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_2_img_title'); ?>" /> </a> </span> </p>
          </div>
          <div class="rex-form-row">
            <p class="rex-form-text">
              <label for="img"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_4'); ?></label>
              <input type="text" size="30" style="width: 270px; height: 15px;" name="value[images][a7881_logout]" id="REX_MEDIA_4" readonly  value="<?php echo $set['a7881_logout']; ?>" />
              <span class="rex-widget-column rex-widget-column-first"> <a href="#" class="rex-icon-file-open" onclick="openREXMedia(4,'');return false;" title="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_1_a_title'); ?>" tabindex="30"> <img src="media/file_open.gif" width="16" height="16" alt="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_1_img_title'); ?>" title="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_1_img_title'); ?>" /> </a> <a href="#" class="rex-icon-file-delete" onclick="deleteREXMedia(4);return false;" title="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_2_a_title'); ?>" tabindex="32"> <img src="media/file_del.gif" width="16" height="16" title="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_2_img_title'); ?>" alt="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_2_img_title'); ?>" /> </a> </span> </p>
          </div>
          <div class="rex-form-row">
            <p class="rex-form-text">
              <label for="img_width"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_image_width'); ?></label>
              <input type="text" name="value[images][img_masse]" style="width: 50px; height: 15px;" value="<?php echo $set['img_masse']; ?>" size="5" class="inp100" />
            </p>
          </div>
          <div class="rex-form-row">
            <p class="rex-form-text">
              <label for="position"><b><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_subheader_cfg4'); ?>:</b></label>
            <hr />
            </p>
          </div>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr height="25">
              <td width="15">&nbsp;</td>
              <td style=" width: 60px; padding-left: 5px; text-align: left; vertical-align: middle; background-color:#CCC; "><label for="position"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_p_top'); ?></label></td>
              <td style=" width: 110px; text-align: left; "><input type="text" name="value[style][top]" value="<?php echo $set['top']; ?>" size="5" class="inp100" style="text-align: center; height: 25px;" />
                <?php echo $I18N_ARTICLE_EDIT->Msg('a7881_unit'); ?></td>
              <td style=" width: 60px; padding-left: 5px; text-align: left; vertical-align: middle; background-color:#CCC; "><label for="position"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_p_right'); ?></label></td>
              <td style=" width: 110px; text-align: left; "><input type="text" name="value[style][right]" value="<?php echo $set['right']; ?>" size="5" class="inp100" style="text-align: center; height: 25px;" />
                <?php echo $I18N_ARTICLE_EDIT->Msg('a7881_unit'); ?></td>
              <td style=" width: 60px; padding-left: 5px; text-align: left; vertical-align: middle; background-color:#CCC; "><label for="position"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_p_bottom'); ?></label></td>
              <td style=" width: 110px; text-align: left; "><input type="text" name="value[style][bottom]" value="<?php echo $set['bottom']; ?>" size="5" class="inp100" style="text-align: center; height: 25px;" />
                <?php echo $I18N_ARTICLE_EDIT->Msg('a7881_unit'); ?></td>
              <td style=" width: 60px; padding-left: 5px; text-align: left; vertical-align: middle; background-color:#CCC; "><label for="position"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_p_left'); ?></label></td>
              <td style=" width: 110px; text-align: left; "><input type="text" name="value[style][left]" value="<?php echo $set['left']; ?>" size="5" class="inp100" style="text-align: center; height: 25px;" />
                <?php echo $I18N_ARTICLE_EDIT->Msg('a7881_unit'); ?></td>
              <td width="15">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="10">&nbsp;</td>
            </tr>
            <tr height="25">
              <td>&nbsp;</td>
              <td style="padding-left: 5px; text-align: left; vertical-align: middle; background-color:#CCC; "><label for="position"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_m_top'); ?></label></td>
              <td style="text-align: left; "><input type="text" name="value[style][margin-top]" value="<?php echo $set['margin-top']; ?>" size="5" class="inp100" style="text-align: center; height: 25px;" />
                <?php echo $I18N_ARTICLE_EDIT->Msg('a7881_unit'); ?></td>
              <td style="padding-left: 5px; text-align: left; vertical-align: middle; background-color:#CCC; "><label for="position"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_m_right'); ?></label></td>
              <td style="text-align: left; "><input type="text" name="value[style][margin-right]" value="<?php echo $set['margin-right']; ?>" size="5" class="inp100" style="text-align: center; height: 25px;" />
                <?php echo $I18N_ARTICLE_EDIT->Msg('a7881_unit'); ?></td>
              <td style="padding-left: 5px; text-align: left; vertical-align: middle; background-color:#CCC; "><label for="position"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_m_bottom'); ?></label></td>
              <td style="text-align: left; "><input type="text" name="value[style][margin-bottom]" value="<?php echo $set['margin-bottom']; ?>" size="5" class="inp100" style="text-align: center; text-align: center; height: 25px;" />
                <?php echo $I18N_ARTICLE_EDIT->Msg('a7881_unit'); ?></td>
              <td style="padding-left: 5px; text-align: left; vertical-align: middle; background-color:#CCC; "><label for="position"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_m_left'); ?></label></td>
              <td style="text-align: left; "><input type="text" name="value[style][margin-left]" value="<?php echo $set['margin-left']; ?>" size="5" class="inp100" style="text-align: center; height: 25px;" />
                <?php echo $I18N_ARTICLE_EDIT->Msg('a7881_unit'); ?></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="10">&nbsp;</td>
            </tr>
            <tr height="25">
              <td>&nbsp;</td>
              <td style="padding-left: 5px; text-align: left; background-color:#CCC; "><label for="position"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_z_index'); ?></label></td>
              <td style=" text-align: left; "><input type="text" name="value[style][z-index]" value="<?php echo $set['z-index']; ?>" size="5" class="inp100" style="text-align: center; height: 25px;" /></td>
              <td style="padding-left: 5px; text-align: left; background-color:#CCC; "><label for="position"><?php echo $I18N_ARTICLE_EDIT->Msg('a7881_position'); ?></label></td>
              <td><select name="value[style][position]" style="height: 25px;">
                  <option value="fixed" <?php echo ($set['position'] == "fixed" )? "selected" : ""; ?> >fixed</option>
                  <option value="absolute" <?php echo ($set['position'] == "absolute" )? "selected" : ""; ?> >absolute</option>
                </select></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr height="25">
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="submit" name="func2" class="rex-form-submit" value="<?php echo $I18N_ARTICLE_EDIT->Msg('a7881_save'); ?>" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
        </div>
      </fieldset>
    </form>
  </div>
  <p>&nbsp;</p>
</div>

