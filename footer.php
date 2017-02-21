<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Grid
 */

?>

	</div><!-- #content -->

	<footer class="site-footer text-center">
    	<div class="container">
        	<div class="copyright">
            	&copy; <a href="esc_url(http://www.demos.jeweltheme.com/grid)">Grid One</a> <?php echo date('Y'); ?> | Develpoed With Love by 

                        <?php $url=get_theme_mod( 'footer_url' ); if(!empty($url)){ ?>
                          <a href="https://www.<?php echo get_theme_mod( 'footer_url' ); ?>">
                        <?php } else{ ?>
                          <a href="http://demos.jeweltheme.com/grid/">
                          <?php } ?>
                      
                        <?php $user=get_theme_mod( 'footer_user' ); if(!empty($user)){
                          echo get_theme_mod( 'footer_user' );
                        } else{ 
                          echo "Jeweltheme";
                           } ?>
                    </a>
        	</div><!-- /.copyright -->
    	</div><!-- /.container -->
  	</footer>
	<div id="scroll-to-top" class="scroll-to-top">
		<i class="fa fa-angle-double-up"></i>    
	</div><!-- /#scroll-to-top -->

<?php wp_footer(); ?>

</body>

</html>