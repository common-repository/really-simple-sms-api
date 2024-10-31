<?php 
/*
 * Plugin Name: Really Simple SMS API 
 * Description: Send SMS notifications when somebody submits your contact form 7 using SMS API. This plugin is specially for contact form 7.
 * Version: 1.0.0
 * Author: omikant, wptutorialspoint
 * Author URI: https://profiles.wordpress.org/omikant
 * License: GPL2
*/

include( plugin_dir_path( __FILE__ ) . 'sms-setting.php'); 
 
function send_sms(){
	$submission = WPCF7_Submission::get_instance();
  
    if ( $submission ) {
        $posted_data = $submission->get_posted_data();
    }
      
	$sms_url = get_option('sms_url');
	$sms_user = get_option('sms_user');
	$sms_password = get_option('sms_password');
	$sms_sender_id = get_option('sms_sender_id');
	$sms_mobile = get_option('sms_mobile');
	$sms_msg = get_option('sms_msg');
	
	$sms = $posted_data[$sms_msg];
	
	$Curl_Session = curl_init($sms_url);
	curl_setopt ($Curl_Session, CURLOPT_POST, 1);
	curl_setopt ($Curl_Session, CURLOPT_POSTFIELDS, "user=$sms_user&password=$sms_password&mobiles=$sms_mobile&sms=$sms&senderid=$sms_sender_id");
	curl_setopt ($Curl_Session, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($Curl_Session, CURLOPT_RETURNTRANSFER,1);
	$result=curl_exec ($Curl_Session);
	//SMS CODE ENDS//
}
add_action("wpcf7_mail_sent", "send_sms");
?>