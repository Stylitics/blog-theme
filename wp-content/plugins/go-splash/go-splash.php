<?php
/*
Plugin Name: * go splash
Plugin URI: http://owagu.com
Description: a simple splash screen with admin login 
Author: pete scheepens
Author URI: http://wpprogrammeurs.nl
Version: 1.1
*/

add_action('wp', 'splash_me');

add_action('admin_menu', 'go_splash_page');

function go_splash_page() {
add_menu_page( 'go splash', 'go splash', 'add_users', 'splash_me', 'show_gosplash',plugins_url('/images/icon.jpg', __FILE__) );
}

function show_gosplash() {

if (wp_verify_nonce($_REQUEST['splash'],'opts'))
	{
	$splashopt = get_option('gosplash_options');
	$splashopt['title'] = $_REQUEST['spl_blogtitle'];
	$splashopt['description'] = $_REQUEST['spl_descr'];
	$splashopt['allowlink']  = $_REQUEST['allowlink'];
	update_option('gosplash_options',$splashopt);
	$splashset = 1;
	}
	
$splashopt = get_option('gosplash_options');
?>
<div>

<div style="float:left;width:50%;margin:2%;padding:1%;overflow:auto;height:70%;background-color:white;border:2px solid #CCC;border-radius:3px">
<a href='http://owagu.com/go-splash-premium-splash-page-for-wp/' title='download the premium version now'>
<img src='<?PHP echo plugins_url('/images/splash_logo.jpg', __FILE__); ?>' style='float:left;width:100px;margin: 1px 15px'>
</a>
<h2>Go <a href='http://owagu.com/go-splash-premium-splash-page-for-wp/' title='download the premium version now'>Splash</a> - free version - </h2>
A simple splash screen for WordPress showing a login-form on a light screen to any visitor that is not logged in.
<div style="clear:both;margin:5px"></div>
	<div style="width:90%;margin:2% auto;padding:2%;overflow:auto;background-color:white;border:2px solid #CCC;border-radius:3px">
	<?PHP if ($splashset) echo "<div style='border:3px solid green;text-align:center;margin:10px auto;width:40%;padding:5px;'>Options saved</div>"; ?>
		<h2>Option Settings</h2>
		<form method='POST'>		
		Show blog title on splash page ?<br/>
		<select name='spl_blogtitle'>
		<option value='1' <?PHP if ($splashopt['title'] == '1') echo "selected"; ?> >yes </option>
		<option value='0' <?PHP if ($splashopt['title'] == '0') echo "selected"; ?> >No</option>
		</select><br/><br/>
		
		Show blog title on splash page ?<br/>
		<select name='spl_descr'>
		<option value='1' <?PHP if ($splashopt['description'] == '1') echo "selected"; ?> >yes </option>
		<option value='0' <?PHP if ($splashopt['description'] == '0') echo "selected"; ?> >No</option>
		</select><br/><br/>
		
		<?PHP if ($splashopt['allowlink'] == '0') echo "You are currently not allowing our link to show<br/>"; ?>
		We offer you this plugin free of charge. May we please put a small unobtrusive link to our download page on the splash screen ?<br/>
		<select name='allowlink'>
		<option value='1'  selected>yes </option>
		<option value='0'>No</option>
		</select><br/><br/>
		
	<div style="width:90%;margin:2% auto;padding:2%;overflow:auto;background-color:#CCC;border:1px solid red;border-radius:8px">	
	<strong>Extra options below are available in our <a href='http://owagu.com/go-splash-premium-splash-page-for-wp/' title='download the premium version now'>PREMIUM version</a></strong><br/><br/>
		Add a registration link to the splash screen ?<br/>
		<select name='spl_reg'>
		<option value='1' <?PHP if ($splashopt['registration'] == '1') echo "selected"; ?> >yes </option>
		<option value='0' <?PHP if ($splashopt['registration'] == '0') echo "selected"; ?> >No</option>
		</select><br/><small>Only works if you allow new users registrations in your admin settings! </small><br /><br/>
		
		Shall we route all <strong>unregistered-user</strong> calls to wp-admin & wp-login to the splash screen ?<br/>
		<select name='adminredirect'>
		<option value='1' <?PHP if ($splashopt['adminredirect'] == '1') echo "selected"; ?> >yes </option>
		<option value='0' <?PHP if ($splashopt['adminredirect'] == '0') echo "selected"; ?> >No</option>
		</select><br/><small>Only works if you allow new users registrations in your admin settings! </small><br /><br/>
		
		
		Redirect users to this URL upon login :<br />
		<input type='text' name='redirect' value='<?PHP echo $splashopt['redirect']; ?>' style='width:70%'>
		<br><small>Always start with 'http://' - leave empty to redirect users to standard homepage<br />
		URL should be on the same domain as this WP install</small>
		<br/><br/>
		
		Add an optional message (shows between titles and login form) - light html allowed<br/>
		<textarea name='message' style='width:70%;height:120px'><?PHP echo stripslashes($splashopt['message']); ?></textarea>
		<br/>
	</div>	
		<br/>
		
		<?php wp_nonce_field('opts','splash'); ?>
		
		<input type='submit' value='submit settings' style='cursor:pointer;margin:1px auto;font-size:44px;text-align:center;padding:18px;background-color:lightyellow'>
		
		</form>	
	</div>
	Go Splash was written, and is maintained by : Pete Scheepens - <a href='http://wpprogrammeurs.nl' title='developers home'>wpprogrammeurs.nl</a>
</div>

<div class='fets_left' style="float:left;width:36%;margin:2%;padding:1%;overflow:auto;height:70%;background-color:lightyellow;border:2px solid #CCC;border-radius:3px">
	<img src='<?PHP echo plugins_url('/images/wppr.png', __FILE__); ?>' style='width:90%;margin:1% 4%;'>
	<h2>Latest news from wpprogrammeurs.nl :</h2>
	<?php 	
		if(function_exists('fetch_feed')) 
		{
			include_once(ABSPATH . WPINC . '/feed.php');
			$feed = 'http://wpprogrammeurs.nl/feed/';
			$rss = fetch_feed($feed);
			if (!is_wp_error( $rss ) ) :
				$maxitems = $rss->get_item_quantity(5);
				$rss_items = $rss->get_items(0, $maxitems);
				if ($rss_items):
					echo "<ul>\n";
					foreach ( $rss_items as $item ) :
						echo '<li>';
						echo '<strong><a href="' . $item->get_permalink() . '">' . $item->get_title() . "</a></strong><br />";
						echo $item->get_description() ;
						echo '</li>';
					endforeach;
					echo "</ul>\n";
				endif;
			endif;		
		}
		
	?>
	</div>
	
<div style='clear:both'></div>	

	<div style='text-align:center'>
	This plugin was created by Pete Scheepens @ <a href='http://wpprogrammeurs.nl' title='dutch WordPress Programmers'>wpprogrammeurs.nl</a><br/>
	Are you a WP pro ? Advertise your skills for free -> <a href='http://wpfaces.com/add-a-face/' title='faces of wordpress'>faces of wordpress</a>
	</div> 
	
</div>
<?PHP
}


// show splash
function splash_redirect_login()
{
$splashopt = get_option('gosplash_options');
if ($splashopt['adminredirect'] && !is_user_logged_in()) {
echo "<h1>Redirecting</h1>";
wp_redirect( home_url() ); 
exit;
 }
}
add_action( 'login_head', 'splash_redirect_login' );

function splash_me() {
	if (!is_user_logged_in() ) {
	$splashopt = get_option('gosplash_options');
	?>	
	<div style="text-align:center;padding:5%;margin:5%;background-image:url('<?PHP echo plugins_url('/images/splash_main.jpg', __FILE__); ?>');background-repeat:no-repeat;background-size:100% 100%;height:70%;min-height:580px;max-width:1200px;border:1px solid #CCC">
	<?PHP if ($splashopt['allowlink']) echo "<div style='text-align:right;font-size:11px'><a href='http://owagu.com/go-splash-premium-splash-page-for-wp/' title='download Go Splash for WordPress'>Get your own copy of Go Splash for WordPress</a></div>"; ?>
	<br />
	<?php 
		if ($splashopt['title']) echo "<h1>".get_bloginfo('name')."</h1>";
		if ($splashopt['description']) echo "<h3>".get_bloginfo('description')."</h3><br />";		
		wp_login_form($args); 
		?>
	</div>
	<?PHP
	exit();
	}
}


