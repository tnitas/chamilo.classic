<?php
/* For licensing terms, see /chamilo_license.txt */
/**
*	@package dokeos.messages
*/

// name of the language file that needs to be included
$language_file = array('registration','messages','userInfo');
$cidReset=true;
require_once '../inc/global.inc.php';
require_once api_get_path(LIBRARY_PATH).'message.lib.php';

api_block_anonymous_users();
if (isset($_GET['messages_page_nr'])) {
	$social_link = '';
	if ($_REQUEST['f']=='social') {
		$social_link = '?f=social';
	}
	if (api_get_setting('allow_social_tool')=='true' &&  api_get_setting('allow_message_tool')=='true') {
		header('Location:inbox.php'.$social_link);
	}
}
if (api_get_setting('allow_message_tool')!='true'){
	api_not_allowed();
}
$htmlHeadXtra[]='<script language="javascript">
<!--
function enviar(miforma)
{
	if(confirm("'.get_lang("SureYouWantToDeleteSelectedMessages").'"))
		miforma.submit();
}
function select_all(formita)
{
   for (i=0;i<formita.elements.length;i++)
	{
      		if(formita.elements[i].type == "checkbox")
				formita.elements[i].checked=1
	}
}
function deselect_all(formita)
{
   for (i=0;i<formita.elements.length;i++)
	{
      		if(formita.elements[i].type == "checkbox")
				formita.elements[i].checked=0
	}
}
//-->
</script>';

/*
==============================================================================
		MAIN CODE
==============================================================================
*/
$nameTools = get_lang('Messages');
$request=api_is_xml_http_request();
if (isset($_GET['form_reply']) || isset($_GET['form_delete'])) {
	/***********************************************/
	$info_reply=array();
	$info_delete=array();
	/***********************************************/
	if ( isset($_GET['form_reply']) ) {
		//allow to insert messages
		$info_reply=explode(base64_encode('&%ff..x'),$_GET['form_reply']);
		$count_reply=count($info_reply);
		$button_sent=urldecode($info_reply[4]);
	}
	/***********************************************/
	if ( isset($_GET['form_delete']) ) {
		//allow to delete messages
		$info_delete=explode(',',$_GET['form_delete']);
		$count_delete=(count($info_delete)-1);
	}
	/***********************************************/

	if ( isset($button_sent) ) {
		$title     = api_convert_encoding(urldecode($info_reply[0]),'UTF-8',$charset);
		$content   = api_convert_encoding(str_replace("\\","",urldecode($info_reply[1])),'UTF-8',$charset);
		$title     = Security::remove_XSS($title);
		$content   = Security::remove_XSS($content,COURSEMANAGERLOWSECURITY);

		$user_reply= $info_reply[2];
		$user_email_base=str_replace(')','(',$info_reply[5]);
		$user_email_prepare=explode('(',$user_email_base);
		if (count($user_email_prepare)==1) {
			$user_email=trim($user_email_prepare[0]);
		} elseif (count($user_email_prepare)==3) {
			$user_email=trim($user_email_prepare[1]);
		}
		$user_id_by_email=MessageManager::get_user_id_by_email($user_email);

		if ($info_reply[6]=='save_form') {
			$user_id_by_email=$info_reply[2];
		}
		if ( isset($user_reply) && !is_null($user_id_by_email) && strlen($info_reply[0]) >0) {
			MessageManager::send_message($user_id_by_email, $title, $content);
			MessageManager::display_success_message($user_id_by_email);
			inbox_display();
			exit;
		} elseif (is_null($user_id_by_email)) {
			$message_box=get_lang('ErrorSendingMessage');
			Display::display_error_message(api_xml_http_response_encode($message_box),false);
			inbox_display();
			exit;
		}
	} elseif (trim($info_delete[0])=='delete' ) {
		for ($i=1;$i<=$count_delete;$i++) {
			MessageManager::delete_message_by_user_receiver(api_get_user_id(), $info_delete[$i]);
		}
			$message_box=get_lang('SelectedMessagesDeleted');
			Display::display_normal_message(api_xml_http_response_encode($message_box),false);
		   	inbox_display();
		    exit;
	}
}


$link_ref="new_message.php";
$table_message = Database::get_main_table(TABLE_MESSAGE);


//api_display_tool_title(api_xml_http_response_encode(get_lang('Inbox')));
if ($_GET['f']=='social') {
	$this_section = SECTION_SOCIAL;
	$interbreadcrumb[]= array ('url' => api_get_path(WEB_PATH).'main/social/profile.php','name' => get_lang('Social'));
	$interbreadcrumb[]= array ('url' => '#','name' => get_lang('Inbox'));	
} else {
	$this_section = SECTION_MYPROFILE;
	$interbreadcrumb[]= array ('url' => api_get_path(WEB_PATH).'main/auth/profile.php','name' => get_lang('Profile'));
	$interbreadcrumb[]= array ('url' => 'outbox.php','name' => get_lang('Inbox'));
}

Display::display_header('');
$social_parameter = '';

if ($_GET['f']=='social') {
	$user_online_list = WhoIsOnline(api_get_setting('time_limit_whosonline'));
	$user_online_count = count($user_online_list); 
	echo '<div class="actions-title-groups">';
	echo '<table width="100%"><tr><td width="150px" bgcolor="#32578b"><center><span class="menuTex1">'.strtoupper(get_lang('Menu')).'</span></center></td>
			<td width="15px">&nbsp;</td><td bgcolor="#32578b">'.Display::return_icon('whoisonline.png','',array('hspace'=>'6')).'<a href="#" ><span class="menuTex1">'.get_lang('FriendsOnline').' '.$user_online_count.'</span></a></td>
			</tr></table>';
	/*
	echo '<div class="menuTitle" align="center"><span class="menuTex1">'.get_lang('Menu').'</span></div>';
	echo '<div class="TitleRigth">'.Display::return_icon('whoisonline.png','',array('hspace'=>'6')).'<a href="#" ><span class="menuTex1">'.$who_is_on_line.'</span></a></div>';
	*/
	echo '</div>';
	/*
	echo '<div class="actions-title">';
	echo get_lang('Messages');
	echo '</div>';
	*/
	$social_parameter = '?f=social';
} else {
	//comes from normal profile
	
	echo '<div class="actions">';
	
	if (api_get_setting('allow_social_tool') == 'true' && api_get_setting('allow_message_tool') == 'true') {
		echo '<a href="'.api_get_path(WEB_PATH).'main/social/profile.php">'.Display::return_icon('shared_profile.png', get_lang('ViewSharedProfile')).'&nbsp;'.get_lang('ViewSharedProfile').'</a>';
	}
	if (api_get_setting('allow_message_tool') == 'true') {
		echo '<a href="'.api_get_path(WEB_PATH).'main/messages/inbox.php">'.Display::return_icon('inbox.png').' '.get_lang('Messages').'</a>';
	}	
	echo '<a href="'.api_get_path(WEB_PATH).'main/auth/profile.php?type=reduced">'.Display::return_icon('edit.gif', get_lang('EditNormalProfile')).'&nbsp;'.get_lang('EditNormalProfile').'</a>';
	echo '</div>';


}

echo '<div id="inbox-wrapper">';
	$id_content_right = '';
	//LEFT CONTENT			
	if (api_get_setting('allow_social_tool') != 'true') { 
		$id_content_right = 'inbox';
		echo '<div id="inbox-menu" class="actions">';
		echo '<ul>';
			echo '<li><a href="'.api_get_path(WEB_PATH).'main/messages/inbox.php">'.Display::return_icon('inbox.png',get_lang('Inbox')).get_lang('Inbox').'</a>'.'</li>';
			echo '<li><a href="'.api_get_path(WEB_PATH).'main/messages/new_message.php">'.Display::return_icon('message_new.png',get_lang('ComposeMessage')).get_lang('ComposeMessage').'</a>'.'</li>';
			echo '<li><a href="'.api_get_path(WEB_PATH).'main/messages/outbox.php">'.Display::return_icon('outbox.png',get_lang('Outbox')).get_lang('Outbox').'</a>'.'</li>';
		echo '</ul>';
		echo '</div>';		
	} else {
		require_once api_get_path(LIBRARY_PATH).'social.lib.php';
		$id_content_right = 'socialContentRigth';
		echo '<div id="socialContentLeft">';	
			//this include the social menu div
			SocialManager::show_social_menu('messages');
		echo '</div>';		
	}

	echo '<div id="'.$id_content_right.'">';
			//MAIN CONTENT
			if (!isset($_GET['del_msg'])) {	
				inbox_display();
			} else {
				$num_msg = intval($_POST['total']);
				for ($i=0;$i<$num_msg;$i++) {
					if($_POST[$i]) {
						//the user_id was necesarry to delete a message??
						MessageManager::delete_message_by_user_receiver(api_get_user_id(), $_POST['_'.$i]);
					}
				}
				inbox_display();
			}
	echo '</div>';	

echo '</div>';

/*
==============================================================================
		FOOTER
==============================================================================
*/

Display::display_footer();

?>
