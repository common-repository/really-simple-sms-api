<?php 
function sms_settings_page(){
	?>
	    <div class="wrap">
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}

function sms_url()
{
	?>
    	<input type="text" name="sms_url" id="sms_url" value="<?php echo get_option('sms_url'); ?>" />
    <?php
}

function sms_user()
{
	?>
    	<input type="text" name="sms_user" id="sms_user" value="<?php echo get_option('sms_user'); ?>" />
    <?php
}

function sms_password()
{
	?>
    	<input type="text" name="sms_password" id="sms_password" value="<?php echo get_option('sms_password'); ?>" />
    <?php
}

function sms_sender_id()
{
	?>
    	<input type="text" name="sms_sender_id" id="sms_sender_id" value="<?php echo get_option('sms_sender_id'); ?>" />
    <?php
}

function sms_mobile()
{
	?>
    	<input type="text" name="sms_mobile" id="sms_mobile" value="<?php echo get_option('sms_mobile'); ?>" />
    <?php
}

function sms_msg()
{
	?>
    	<input type="text" name="sms_msg" id="sms_msg" value="<?php echo get_option('sms_msg'); ?>" />
    <?php
}



function sms_api_panel_fields()
{
	add_settings_section("section", "SMS Settings", null, "theme-options");
	
	add_settings_field("sms_url", "SMS API URL", "sms_url", "theme-options", "section");
	add_settings_field("sms_user", "SMS API User Name", "sms_user", "theme-options", "section");
    add_settings_field("sms_password", "SMS API Password", "sms_password", "theme-options", "section");
    add_settings_field("sms_sender_id", "SMS Sender ID", "sms_sender_id", "theme-options", "section");
    add_settings_field("sms_mobile", "SMS Mobile Number", "sms_mobile", "theme-options", "section");
    add_settings_field("sms_msg", "Enter Contact form 7 slug of message field", "sms_msg", "theme-options", "section");

    register_setting("section", "sms_url");
    register_setting("section", "sms_user");
    register_setting("section", "sms_password");
    register_setting("section", "sms_sender_id");
    register_setting("section", "sms_mobile");
    register_setting("section", "sms_msg");
}

add_action("admin_init", "sms_api_panel_fields");


function add_theme_menu_item()
{
	add_menu_page("SMS API Settings", "SMS API Settings", "manage_options", "sms-settings", "sms_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

?>