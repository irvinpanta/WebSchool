<?php
/**
 * Widget for grid layout which is suitable for services/features and teams.
 *
 * @package Mystery Themes
 * @subpackage Scholarship
 * @since 1.0.0
 */

class Scholarship_Grid_Layout extends WP_Widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'scholarship_grid_layout',
            'description' => __( 'Display posts from selected category as grid view.', 'scholarship' )
        );
        parent::__construct( 'scholarship_grid_layout', __( 'Scholarship: Grid Items', 'scholarship' ), $widget_ops );
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

            'section_cat_slug' => array(
                'scholarship_widgets_name'         => 'section_cat_slug',
                'scholarship_widgets_title'        => __( 'Section Category', 'scholarship' ),
                'scholarship_widgets_default'      => '',
                'scholarship_widgets_field_type'   => 'category_dropdown'
            ),

            /*'section_post_count' => array(
                'scholarship_widgets_name'         => 'section_post_count',
                'scholarship_widgets_title'        => __( 'Section Post Count', 'scholarship' ),
                'scholarship_widgets_default'      => 3,
                'scholarship_widgets_field_type'   => 'number'
            ),*/
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

    	//$scholarship_section_title 	    = empty( $instance['section_title'] ) ? '' : $instance['section_title'];
    	//$scholarship_section_info		= empty( $instance['section_info'] ) ? '' : $instance['section_info'];    	
        $scholarship_section_cat_slug   = empty( $instance['section_cat_slug'] ) ? '' : $instance['section_cat_slug'];
        //$scholarship_section_post_count = empty( $instance['section_post_count'] ) ? 3 : $instance['section_post_count'];

    	if ( empty( $scholarship_section_cat_slug ) ) {
    		return ;
    	}

        /*if ( !empty( $scholarship_section_title ) || !empty( $scholarship_section_info ) ) {
            $sec_title_class = 'has-title';
        } else {
            $sec_title_class = 'no-title';
        }*/

        $grid_args = array(
        				'post_type'      => 'post',
        				'category_name'  => esc_attr( $scholarship_section_cat_slug ),
        				//'posts_per_page' => absint( $scholarship_section_post_count )
        			);
        $grid_query = new WP_Query( $grid_args );
        echo $before_widget;
    ?>
    		

<?php 
    $sp_show_treeboxpanel = esc_attr( get_theme_mod('sp_show_treeboxpanel', false) );
    if ($sp_show_treeboxpanel != ''){ 
?>

        <div class="section-wrapper scholarship-widget-wrapper clearfix">
        	<div class="mt-container">
                <div class="grid-items-wrapper mt-column-wrapper">

        	    <?php for ($t = 1; $t <= 3; $t++){ ?>

                    <div class="single-post-wrapper mt-column-3">
                        <h3 class="post-title">
                            <a href="!#"><?php echo get_theme_mod('sp_texto_treebox_bloque0'.$t, 'softpang'); ?></a>
                        </h3>
                            <?php echo get_theme_mod('sp_descripcion_treebox_bloque0'.$t, 'softpang'); ?>
                   	</div>
                <?php } ?>

                </div>
            </div>
        </div>

<?php } ?>

<?php
    echo $after_widget;
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