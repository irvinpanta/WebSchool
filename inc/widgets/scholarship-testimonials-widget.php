<?php
/**
 * Widget for grid layout which is suitable for services/features and teams.
 *
 * @package Mystery Themes
 * @subpackage Scholarship
 * @since 1.0.0
 */

class Scholarship_Testimonials extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'scholarship_testimonials',
            'description' => __( 'Display posts from selected category as testimonials layout.', 'scholarship' )
        );
        parent::__construct( 'scholarship_testimonials', __( 'Scholarship: Testimonials', 'scholarship' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        
        $fields = array(

            /*'section_title' => array(
                'scholarship_widgets_name'         => 'section_title',
                'scholarship_widgets_title'        => __( 'Section Title', 'scholarship' ),
                'scholarship_widgets_field_type'   => 'text'
            ),*/

            /*'section_info' => array(
                'scholarship_widgets_name'         => 'section_info',
                'scholarship_widgets_title'        => __( 'Section Info', 'scholarship' ),
                'scholarship_widgets_row'          => 5,
                'scholarship_widgets_field_type'   => 'textarea'
            ),*/

            'section_bg_image' => array(
                'scholarship_widgets_name' => 'section_bg_image',
                'scholarship_widgets_title' => __( 'Section Background Image', 'scholarship' ),
                'scholarship_widgets_field_type' => 'upload',
            ),

            'section_cat_slug' => array(
                'scholarship_widgets_name'         => 'section_cat_slug',
                'scholarship_widgets_title'        => __( 'Section Category', 'scholarship' ),
                'scholarship_widgets_default'      => '',
                'scholarship_widgets_field_type'   => 'category_dropdown'
            )
        );
        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );

        if ( empty( $instance ) ) {
            return ;
        }

        //$scholarship_section_title      = empty( $instance['section_title'] ) ? '' : $instance['section_title'];
        //$scholarship_section_info       = empty( $instance['section_info'] ) ? '' : $instance['section_info'];
        $scholarship_section_bg_image   = empty( $instance['section_bg_image'] ) ? '' : $instance['section_bg_image'];
        $scholarship_section_cat_slug   = empty( $instance['section_cat_slug'] ) ? '' : $instance['section_cat_slug'];

        if ( empty( $scholarship_section_cat_slug ) ) {
            return ;
        }

        /*if ( !empty( $scholarship_section_title ) || !empty( $scholarship_section_info ) ) {
            $sec_title_class = 'has-title';
        } else {
            $sec_title_class = 'no-title';
        }*/

        $testimonials_args = array(
            'post_type'      => 'post',
            'category_name'  => esc_attr( $scholarship_section_cat_slug ),
            'posts_per_page' => -1
        );
        $testimonials_query = new WP_Query( $testimonials_args );
        echo $before_widget;
    ?>
  

<?php 
    $sp_show_testimoniospanel = esc_attr( get_theme_mod('sp_show_testimoniospanel', false) );
    if ($sp_show_testimoniospanel != ''){ 
?>          

    <div class="section-wrapper scholarship-widget-wrapper" style="background-image:url('<?php echo esc_url( $scholarship_section_bg_image ); ?>'); background-position: center; background-attachment: fixed; background-size: cover;">
        <div class="mt-container">

            <?php 
                $sp_titulo_testimonial = get_theme_mod('sp_titulo_testimonial','Softpang');
                $sp_descripcion_testimonial = get_theme_mod('sp_descripcion_testimonial', '');
            ?>
            <div class="section-title-wrapper has-title clearfix">
                <?php

                    if ( !empty( $sp_titulo_testimonial ) ) {
                        echo $before_title . esc_html( $sp_titulo_testimonial ) . $after_title;
                    }

                    if ( !empty( $sp_descripcion_testimonial ) ) {
                        echo '<span class="section-info">'. esc_html( $sp_descripcion_testimonial ) .'</span>';
                    }
                ?>
            </div>

            <div class="section-items-wrapper">
                <ul class="testimonialsSlider">';                
                    
                <?php for($n = 1; $n <= get_theme_mod('sp_cantitem_testimonial', 3); $n++) { ?>                    
                    
                    <li>
                        <div class="single-post-wrapper">                        
                            <div class="testimonial-content">
                                <?php echo get_theme_mod('sp_texto_testimonios_bloque0'.$n, 'softpang');//the_content(); ?>
                            </div>

                            <div class="testimonial-img-name-wrap clearfix">
                                <div class="img-holder">
                                    <img width="150" height="150" src="<?php echo get_theme_mod('sp_urlimg_testimonios_bloque0'.$n,esc_url( get_template_directory_uri() ).'/images/testimonial.jpg') ?>" class="attachment-medium size-medium wp-post-image" alt="" loading="lazy"> 
                                </div>
                                
                                <div class="testimonial-name-wrap">
                                    <h3 class="client-name"><?php echo get_theme_mod('sp_autor_testimonios_bloque0'.$n, 'softpang') ?></h3>
                                 <span class="client-position"><?php echo get_theme_mod('sp_profesion_testimonios_bloque0'.$n, 'softpang') ?></span>
                                </div>
                            </div>                        
                        </div>
                    </li>

                <?php } ?>

                </ul>                          
            </div>

        </div>
    </div>

<?php } ?>

    <?php
        echo $after_widget;
        //wp_reset_postdata()            
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    scholarship_widgets_updated_field_value()      defined in scholarship-widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[$scholarship_widgets_name] = scholarship_widgets_updated_field_value( $widget_field, $new_instance[$scholarship_widgets_name] );
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    scholarship_widgets_show_widget_field()        defined in scholarship-widget-fields.php
     */
    public function form( $instance ) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );
            $scholarship_widgets_field_value = !empty( $instance[$scholarship_widgets_name] ) ? wp_kses_post( $instance[$scholarship_widgets_name] ) : '';
            scholarship_widgets_show_widget_field( $this, $widget_field, $scholarship_widgets_field_value );
        }
    }
}