			<div class="bottom-posts wrap">
				<?php get_sidebar('footer'); ?>
			</div>

			<div class="footer clearfix">
				<a class="logo" href="<?php echo home_url( '/'); ?>">Stylitics</a>
				<?php wp_nav_menu( array('menu' => 'bottom-menu' )); ?>
				<ul class="social-sites clearfix">
					<li class="facebook"><a href="http://www.facebook.com/stylitics">Facebook</a></li>
					<li class="twitter"><a href="http://www.twitter.com/stylitics">Twitter</a></li>
					<li class="pinterest"><a href="http://www.pinterest.com/stylitics">Pinterest</a></li>
					<li class="instagram"><a href="http://www.instagram.com/stylitics">Instagram</a></li>
				</ul>
			</div>
		</div>
		<!-- site -->

		 <?php
			$splash_page_id = 4159;
			$splash_page = get_page( $splash_page_id );
			if ($splash_page->post_status == 'publish') :
				$splash_content = apply_filters('the_content', $splash_page->post_content);
				$splash_content = str_replace(']]>', ']]>', $splash_content);
		?>
		<div id="splash-overlay" style="left:0; top:0; position: fixed; display:none; z-index:9999; background-color: #000000; opacity:0.5;">
							&nbsp;
		</div>
		<div id="splash" style="background: #FFFFFF; padding: 20px; z-index:10000; display:none; width:600px; height: 500px; overflow:hidden; border: 1px solid #333333; position: absolute; left:50%; margin-left:-300px; top:100px;">
			<div id="splash_x" style="background: url(<?php bloginfo('template_directory'); ?>/img/splash_x.png) top right; width: 30px; height: 30px; position: absolute; top: 3px; right: 10px;"></div>
			<?php echo $splash_content; ?>
		</div>
		<script>
			jQuery(document).ready(function(){
				 if ($.cookie('modal_shown') == null) {
								$.cookie('modal_shown', 'yes', { expires: 7, path: '/' });
								jQuery("#splash-overlay").css("width",$(window).width());
								jQuery("#splash-overlay").css("height",$(window).height());
								jQuery("#splash-overlay").fadeIn(300);
								jQuery("#splash").fadeIn(300);

								jQuery(document).click(function() {
										jQuery('#splash-overlay').fadeOut(300);
										jQuery('#splash').fadeOut(300);
								});
				  }
			});
		</script>
		<?php endif; ?>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="wp-includes/js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
		<script src="/wp-content/themes/stylitics/js/jquery.cookie.js"></script>
		<script src="/wp-content/themes/stylitics/js/plugins.js"></script>
		<script src="/wp-content/themes/stylitics/js/main.js"></script>
		<!--[if (gte IE 6)&(lte IE 9)]>
			<script type="text/javascript" src="/wp-content/themes/stylitics/js/selectivizr-min.js"></script>
			<link rel="stylesheet" href="/wp-content/themes/stylitics/css/ie.css" type="text/css" media="all" />
		<![endif]-->

		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
		<script>
			var _gaq=[['_setAccount','UA-27354539-1'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
	</body>
</html>
