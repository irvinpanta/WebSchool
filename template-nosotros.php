<?php
/**
 * The Template Name: Nosotros Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */

get_header(); ?>

<div id="primaryour" class="content-area">
    <main id="main" class="site-main" role="main">

<?php $sp_show_nosotrospanel = esc_attr( get_theme_mod('sp_show_nosotrospanel', false) );  ?> 
<?php  if ($sp_show_nosotrospanel != ''){ ?>

        <section class="section-gap info-area" id="about" tabindex="-1">
            <div class="container">

            <?php 

                $sp_nombre_nosotros = get_theme_mod('sp_nombre_nosotros', __('Softpang','Softpang'));
                $sp_descripcion_nosotros = get_theme_mod('sp_descripcion_nosotros', __('Softpang','Softpang'));
                $sp_urlimg_nosotros = get_theme_mod('sp_urlimg_nosotros', __('',''));

                if ($sp_urlimg_nosotros == ""){
                    $sp_urlimg_nosotros = get_template_directory_uri() . '/images/about.jpg';
                }

            ?>
                <div class="single-info row mt-40">
                    <div class="col-lg-6 col-md-12 mt-120 text-center no-padding info-left">
                        <div class="info-thumb">
                            <img style="border-radius: 10px;" src="<?php echo $sp_urlimg_nosotros ?>" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 no-padding info-rigth">          
                        <div class="info-content"  style="border-radius: 10px;">
                            <h2 class="pb-30"><?php echo $sp_nombre_nosotros ?></h2>
                            <p>
                                <?php echo $sp_descripcion_nosotros ?>                                 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php } ?>



<?php $sp_show_equipopanel = esc_attr( get_theme_mod('sp_show_equipopanel', false) );  ?> 
<?php  if ($sp_show_equipopanel != ''){ ?>

        <section id="scholarship_team-2" class="widget scholarship_team">            
            <div class="section-wrapper scholarship-widget-wrapper">
                <div class="mt-container">

                    <?php 
                        $sp_titulo_equipo = get_theme_mod('sp_titulo_equipo', __('Softpang','Softpang'));
                        $sp_descripcion_equipo = get_theme_mod('sp_descripcion_equipo', __('',''));
                    ?>
                    
                    <div class="section-title-wrapper has-title clearfix">
                        <h4 class="widget-title"><?php echo $sp_titulo_equipo ?></h4>
                        <span class="section-info"><?php echo $sp_descripcion_equipo ?></span>                    
                    </div><!-- .section-title-wrapper -->
                    
                    <div class="team-wrapper mt-column-wrapper">
                        

                    <?php             
                        for ($o = 1; $o <= get_theme_mod('sp_cantitem_equipo', 4); $o++){
                    ?>
                        <div class="single-post-wrapper mt-column-4">            
                            <div class="img-holder">  
                                <img width="300" height="343" src="<?php echo get_theme_mod('sp_urlimg_equipo_bloque0'.$o, esc_url(get_template_directory_uri()) . '/images/teacher.jpg') ?>" class="attachment-scholarship-team-medium size-scholarship-team-medium wp-post-image" alt="" loading="lazy">                                                
                                <div class="team-desc-wrapper">                     
                                    <div class="team-desc">
                                        <span>
                                            <p><?php echo get_theme_mod('sp_descripcion_equipo_bloque0'.$o, 'Softpang') ?></p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="team-title-wrapper">
                                <h3 class="post-title"><a href=""><?php echo get_theme_mod('sp_nombre_equipo_bloque0'.$o, 'Softpang') ?></a></h3>
                                <span class="team-position"></span>
                            </div>
                        </div>

                    <?php } ?>

                                                      
                    </div>

                </div>
            </div>
        </section>

<?php } ?>

    </main>
</div>
<?php get_footer(); ?>