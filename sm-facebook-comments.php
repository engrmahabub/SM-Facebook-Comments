<?php 
/*
Plugin Name: SM Facebook Comments
Plugin URI: http://www.mahabub.me
Author: Mahabubur Rahman
*/







/**
* 
*/
class SMFacebookComments
{
	
	function __construct()
	{
		$plugin = plugin_basename(__FILE__);
		require 'includes/sm-fb-comments-admin.php';
		require 'includes/sm-facebook-comments-shortcode.php';
		add_filter("plugin_action_links_$plugin", array($this,'sm_facebook_settings_link') );
		add_action('wp_head', array($this,'sm_facebook_comment_obP_meta'));
		add_filter ('the_content', array($this,'sm_facebook_comment'), 100);
		add_action('wp_footer', array($this,'sm_facebook_comment_setup'), 100);
	}

	// Add settings link on plugin page
	public function sm_facebook_settings_link($links) {
	  $settings_link = '<a href="options-general.php?page=sm-fb-comments">Settings</a>';
	  array_unshift($links, $settings_link);
	  return $links;
	}

	

	// add_filter ('the_content', 'fbcommentbox', 100);

	public function sm_facebook_comment(){
		print get_the_content();
		if(!is_page() && is_single()):
		global $wp;
		$current_url = home_url(add_query_arg(array(),$wp->request));
		ob_start();
		?>	

		<div 
		class="fb-comments" 
		width="100%" 
		data-numposts="5"
		data-href="<?=$current_url;?>" 
		></div>
		<?php
		return ob_get_clean();
		endif;
	}

	


	public function sm_facebook_comment_obP_meta(){

	}
	

	function sm_facebook_comment_setup(){
		?>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1404625236449876";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<?php
	}
	
}

new SMFacebookComments;