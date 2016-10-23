<?php 

/**
* 
*/
class SMFacebookCommentsShortcode
{
	
	function __construct()
	{
		add_shortcode( 'sm-fb-comments', array($this,'sm_facebook_comments_shortcode') );
	}

	public function sm_facebook_comments_shortcode( $atts ){
		global $wp;
		$current_url = home_url(add_query_arg(array(),$wp->request));
		ob_start();
		?>

		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1404625236449876";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<div 
		class="fb-comments" 
		width="100%" 
		data-numposts="5"
		data-href="<?=$current_url;?>" 
		></div>
		<?php
		return ob_get_clean();
	}
	
}

