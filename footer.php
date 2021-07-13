	<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mystery Themes
 * @subpackage Scholarship
 * @since 1.0.0
 */

	if ( ! is_page_template( 'templates/template-home.php' ) ) { 
    	echo '</div><!-- .mt-container -->';
	}
?>

	</div><!-- #content -->
		


	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php 
			$sp_texto_footer = get_theme_mod( 'sp_texto_footer', 'softpang');
			$sp_textocopyright_footer  = get_theme_mod('sp_textocopyright_footer', 'softpang');
		?>



<?php $sp_show_footerpanel = esc_attr( get_theme_mod('sp_show_footerpanel', false) );  ?>	
<?php  if ($sp_show_footerpanel != ''){ ?>

		<div id="top-footer" class="footer-widgets-wrapper footer_column_three clearfix">
    		<div class="mt-container">
        		<div class="footer-widgets-area clearfix">
            		<div class="mt-footer-widget-wrapper mt-column-wrapper clearfix">

          				<div class="scholarship-footer-widget wow fadeInLeft" data-wow-duration="0.5s">
          					
          					<section id="text-2" class="widget widget_text">			
          						<div class="textwidget">
          						<p style="text-transform: uppercase; font-size: 28px; color: #004b8e;font-weight: 900;">
          							<?php echo get_theme_mod('sp_titulotexto_footer', 'softpang') ?>
          						</p>
									<p><?php echo wp_kses_post( $sp_texto_footer ); ?></p>	
								</div>
							</section>          		
						</div>


						<?php 

							$sp_texto_footer_bl0que02 = get_theme_mod('sp_texto_footer_bl0que02', 'softpang');

						?>
      		            <div class="scholarship-footer-widget wow fadeInLeft" data-woww-duration="1s" style="width: 20%;">
                			<section id="nav_menu-2" class="widget widget_nav_menu">
                				<h4 class="widget-title"><?php echo  $sp_texto_footer_bl0que02 ?></h4>

	                			<div class="menu-pro-themes-container">
	                				<ul id="menu-pro-themes" class="menu">

	                				<?php for($l = 1; $l <= get_theme_mod('sp_cantitem_footer_bl0que02', 4); $l++){ 

	                				?>

	                					<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-163"><a href="<?php echo get_theme_mod('sp_urlenlace_footer_bl0que0'.$l, '!#') ?>"><?php echo get_theme_mod('sp_texoenlace_footer_bl0que0'.$l, 'softpang'); ?></a>
	                					</li>

									<?php } ?>


									</ul>
								</div>
							</section>       
						</div>
                                                

                	</div>
        		</div>
    		</div>
		</div>

<?php } ?>

		<?php 
			$footer_widget_option = get_theme_mod( 'footer_widget_option', 'show' );
			if ( $footer_widget_option == 'show' ) {
				get_sidebar( 'footer' );
			}
		?>
		
		<div class="site-info-wrapper">
			<div class="site-info">
				<div class="mt-container">
					
					<div class="scholarship-copyright-wrapper">

						<span class="scholarship-copyright"><?php echo wp_kses_post( $sp_textocopyright_footer ); ?></span>
						<span class="sep"> | </span>
						<?php printf( esc_html__( '%1$s por: %2$s.', 'scholarship' ), 'Adaptado', '<a href="'. esc_url( 'https://www.softpang.com/' ).'" rel="designer">SOFTPANG</a>' ); ?>
					</div>

					<div class="mt-sub-footer-right">
						<?php
							if ( function_exists( 'the_privacy_policy_link' ) ) {
								the_privacy_policy_link( '', '' );
							}
							 
							$mt_sub_footer_type = get_theme_mod( 'mt_sub_footer_type', 'social_icon' );
							if ( $mt_sub_footer_type == 'social_icon' ) {
						?>
			                <div class="mt-footer-social">
				           		<?php scholarship_social_icons(); ?>
				           	</div><!-- .mt-footer-social -->
				        <?php } else { ?>
				           	<nav id="site-footer-navigation" class="footer-navigation" role="navigation">
						        <?php wp_nav_menu( array( 'theme_location' => 'scholarship_footer_menu', 'menu_id' => 'footer-menu', 'fallback_cb' => false, 'depth' => 1 ) ); ?>
				           	</nav><!-- #site-navigation -->
			           	<?php } ?>
			        </div><!-- .mt-sub-footer-right -->

				</div>
			</div><!-- .site-info -->
		</div><!-- .site-info-wrapper -->

	</footer><!-- #colophon -->
	<div id="mt-scrollup" class="animated arrow-hide"><i class="fa fa-chevron-up"></i></div>
</div><!-- #page -->

<?php wp_footer(); ?>



</body>
</html>