<?php
/**
 * Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mystery Themes
 * @subpackage Scholarship
 * @since 1.0.0
 */

get_header(); 

?>


<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

			<?php
				/**
				 * Display the widget area section at homepage
				 *
				 * @since 1.0.0
				 */
	        	if ( is_active_sidebar( 'scholarship_home_section_area' ) ) {
	            	dynamic_sidebar( 'scholarship_home_section_area' );
	         	}
			?>


<?php $sp_show_eventospanel = esc_attr( get_theme_mod('sp_show_eventospanel', false) );  ?>	
<?php  if ($sp_show_eventospanel != ''){ ?>

<section class="widget events page_section ">
	<div class="section-wrapper scholarship-widget-wrapper">
		<div class="mt-container">

			<?php 
				$sp_texto_eventos = get_theme_mod( 'sp_texto_eventos', 'Softpang' ); 
			?>

			<div class="section-title-wrapper has-title">
		       	<h4 class="widget-title"><?php echo $sp_texto_eventos ?></h4>                
		    </div>
		      
		      		
		<?php for($e = 1; $e <= get_theme_mod('sp_cantitem_eventos',''); $e++) { ?>

		    <div class="event_items">
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">
						    
						    <div class="col-lg-2 order-lg-1 order-2">		
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
								    <div class="event_day"> 
								    	<?php echo get_theme_mod('sp_dia_eventos_bloque0'.$e,'01'); ?>
								    </div>
								    <div class="event_month">
								        <?php echo get_theme_mod('sp_mes_eventos_bloque0'.$e,'Enero'); ?>	
								    </div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
							    <div class="event_content">
							        <div class="event_name"><a class="trans_200" href="#"><?php echo get_theme_mod('sp_titulo_eventos_bloque0'.$e,'Titulo de evento'); ?></a>
							        </div>
							        <div class="event_location">
							                <?php echo get_theme_mod('sp_subtitulo_eventos_bloque0'.$e,'Subtitulo de evento'); ?>	
							        </div>
							        <p><?php echo get_theme_mod('sp_descripcion_eventos_bloque0'.$e,'Descripcion de evento'); ?></p>
							    </div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
							    <div class="event_image">
							        <img src="<?php echo get_theme_mod('sp_urlimg_eventos_bloque0'.$e, esc_url(get_template_directory_uri() ) .'/images/evento.jpg'); ?>" alt="">
							    </div>
							</div>

						</div>
					</div>
		        </div>  
		    </div>

		<?php } ?>

		</div>
	</div>      
</section>

<?php } ?>		


<?php $sp_show_hitospanel = esc_attr( get_theme_mod('sp_show_hitospanel', false) );  ?>	
<?php  if ($sp_show_hitospanel != ''){ ?>

<div class="milestones">
	<?php 
			$sp_urlimg_hitos_bloque0 = get_theme_mod('sp_urlimg_hitos_bloque0', '');

	if ($sp_urlimg_hitos_bloque0 == ''){
		$styleBackground = 'background: #004b8e;';
	}else {
		$styleBackground = 'background-image: url('.$sp_urlimg_hitos_bloque0.');';
	}

	?>
	<div class="milestones_container" style="<?php echo $styleBackground; ?>
    top: 0; left: 0; width: 100%; height: 100%; background-repeat: no-repeat; background-size: cover; background-position: center center; background-attachment: fixed;">						
		<!--<div class="milestones_background" style="">
		</div>-->
						
		<div class="container">
			<div class="row">
								
			
			<?php 
				for ($h = 1; $h <= 4; $h++){
			?>

				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="<?php echo get_theme_mod('sp_imgurl_hitos_bloque0'.$h, esc_url( get_template_directory_uri() ).'/images/milestone_'.$h.'.svg'); ?>" alt="">
						</div>
						<div class="milestone_counter" data-end-value="<?php echo get_theme_mod('sp_numero_hitos_bloque0'.$h,'10');; ?>">0</div>
						<div class="milestone_text"><?php echo get_theme_mod('sp_texto_hitos_bloque0'.$h,'softpang'); ?></div>
					</div>
				</div>
			<?php } ?>


			</div>
		</div>
	</div>
</div>

<?php } ?>

			
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>
