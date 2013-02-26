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

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="wp-includes/js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
        <script src="/wp-content/themes/stylitics/js/plugins.js"></script>
        <script src="/wp-content/themes/stylitics/js/main.js"></script>
        <!--[if (gte IE 6)&(lte IE 9)]>
          <script type="text/javascript" src="/wp-content/themes/stylitics/js/selectivizr-min.js"></script>
          <link rel="stylesheet" href="/wp-content/themes/stylitics/ie.css" type="text/css" media="all" />
        <![endif]-->
        <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'stylitics'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function () {
            var s = document.createElement('script'); s.async = true;
            s.type = 'text/javascript';
            s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
            (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
        }());
        </script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>