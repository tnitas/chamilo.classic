<?php
/**
 * Created on 27.09.2006
 * Include the lazlo file necessary to use the audiorecorder  
 * @author Sebastian Wagner <seba.wagner@gmail.com>
 * @author Eric Marguin <e.marguin@elixir-interactive.com>
 */
 
 


$params = "?lzt=swf&lzr=swf8&document_id=".$audio_recorder_item_id."&dbName=".$_SESSION["_course"]["dbName"]."&user_id=".$_SESSION["_user"]["user_id"].'&studentview='.$audio_recorder_studentview ;     

list($width, $height) = $audio_recorder_studentview =='true' ? array(220, 28) : array(220,140);

$path_to_lzx = api_get_setting('service_ppt2lp','path_to_lzx');


if(!empty($path_to_lzx)){

	$path_to_lzx .= $params;
	printf ("<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000'
				codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0'
			 WIDTH='".$width."px' HEIGHT='".$height."px'>
			<param name='movie' VALUE='%s'>
			 <param name='quality' VALUE='high'>
			 <param name='scale' VALUE='scale'>
			 <param name='swliveconnect' value='true'>
			 <param name='FlashVars' value='document_id=%s&dbName=%s&user_id=%s&studentview=%s' />
			 <param name='salign' value='lt' />
			 <param name='bgcolor' VALUE='#ffffff'> 
			 <embed src='%s' quality='high' scale='noscale' salign='lb' 
			 	bgcolor='#ffffff'  WIDTH='".$width."px' HEIGHT='".$height."px' ALIGN='center' TYPE='application/x-shockwave-flash' 
			 	PLUGINSPAGE='http://www.macromedia.com/go/getflashplayer'>
			 </embed>
			 </object>", $path_to_lzx,$audio_recorder_item_id,$_SESSION["_course"]["dbName"],$_SESSION["_user"]["user_id"],$audio_recorder_studentview,$path_to_lzx);
}

?>
