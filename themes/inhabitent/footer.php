<?php
/**
 * The template for displaying the footer.
 *
 * @package RED_Starter_Theme
 */

?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info site-container">
					<div id="footer-sidebar" class="secondary">
						<div id="footer-sidebar1" class="footer-sidebar1">
							<?php
							if(is_active_sidebar('footer-sidebar-1')){
								dynamic_sidebar('footer-sidebar-1');
							}
							?>
							<p class="footer-social-media">
								<span><i class="fa fa-facebook-square" aria-hidden="true"></i></span>
								<span><i class="fa fa-twitter-square" aria-hidden="true"></i></span>
								<span><i class="fa fa-google-plus-square" aria-hidden="true"></i></span>
							</p>
						</div>
						<div id="footer-sidebar2" class="footer-sidebar2">
							<?php
							if(is_active_sidebar('footer-sidebar-2')){
								dynamic_sidebar('footer-sidebar-2');
							}
							?>
						</div>
					</div>
					<div class="footer-logo">
					<a href="<?php echo home_url() ?>" class="footer-inhabitent-logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/inhabitent-logo-text.svg" /> </a>
					</div>
					<p class="credit"> Copyright &copy; 2017 Inhabitent</p>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
