<?php 


/**
* 
*/
class SMFacebookCommentsAdmin
{
	
	function __construct()
	{
		add_action('admin_init', array($this,'sm_facebook_comments_init') );
		add_action('admin_menu', array($this,'sm_fbcomments_options'));
	}	

	public function sm_facebook_comments_init(){
		register_setting( 'sm_facebook_comments_options', 'sm-fb-comments' );
	}
	
	public function sm_fbcomments_options() {
		add_options_page('SM Facebook Comments Options', 'SM FB Comments', 'manage_options', 'sm-fb-comments', array($this,'sm_facebook_comments_options'));
	}

	public function sm_facebook_comments_options(){
		require 'pages/sm-facebook-comments-options.php';
	}
}

new SMFacebookCommentsAdmin;

