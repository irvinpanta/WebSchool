<?php
/**
 * Create a metabox to added some custom filed in pages.
 *
 * @package Mystery Themes
 * @subpackage Scholarship
 * @since 1.0.0
 */

add_action( 'add_meta_boxes', 'scholarship_page_meta_options' );
 
if ( ! function_exists( 'scholarship_page_meta_options' ) ) :

    function  scholarship_page_meta_options() {
        add_meta_box(
            'scholarship_page_meta',
            esc_html__( 'Page Options', 'scholarship' ),
            'scholarship_page_meta_callback',
            'page',
            'normal',
            'high'
        );
    }

endif;

 $scholarship_page_sidebar_options = array(
    'default-sidebar' => array(
        'id'		=> 'page-default-sidebar',
        'value'     => 'default_sidebar',
        'label'     => esc_html__( 'Default Sidebar', 'scholarship' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/default-sidebar.png'
    ),
    'left-sidebar' => array(
        'id'		=> 'page-left-sidebar',
        'value'     => 'left_sidebar',
        'label'     => esc_html__( 'Left sidebar', 'scholarship' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/left-sidebar.png'
    ),
    'right-sidebar' => array(
        'id'		=> 'page-right-sidebar',
        'value'     => 'right_sidebar',
        'label'     => esc_html__( 'Right sidebar', 'scholarship' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/right-sidebar.png'
    ),
    'no-sidebar' => array(
        'id'		=> 'page-no-sidebar',
        'value'     => 'no_sidebar',
        'label'     => esc_html__( 'No sidebar Full width', 'scholarship' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/no-sidebar.png'
    ),
    'no-sidebar-center' => array(
        'id'		=> 'page-no-sidebar-center',
        'value'     => 'no_sidebar_center',
        'label'     => esc_html__( 'No sidebar Content Centered', 'scholarship' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/no-sidebar-center.png'
    )
);

if ( ! function_exists( 'scholarship_page_meta_callback' ) ) :

    /**
     * Callback function for page option
     */
	function scholarship_page_meta_callback() {
		global $post, $scholarship_page_sidebar_options;

        $get_post_meta_identity = get_post_meta( $post->ID, 'post_meta_identity', true );
        $post_identity_value = empty( $get_post_meta_identity ) ? 'mt-metabox-info' : $get_post_meta_identity;

		wp_nonce_field( basename( __FILE__ ), 'scholarship_page_meta_nonce' );
?>
		<div class="mt-meta-container clearfix">
			<ul class="mt-meta-menu-wrapper">
				<li class="mt-meta-tab <?php if ( $post_identity_value == 'mt-metabox-info' ) { echo 'active'; } ?>" data-tab="mt-metabox-info"><span class="dashicons dashicons-clipboard"></span><?php esc_html_e( 'Information', 'scholarship' ); ?></li>
				<li class="mt-meta-tab <?php if ( $post_identity_value == 'mt-metabox-sidebar' ) { echo 'active'; } ?>" data-tab="mt-metabox-sidebar"><span class="dashicons dashicons-exerpt-view"></span><?php esc_html_e( 'Sidebars', 'scholarship' ); ?></li>
			</ul><!-- .mt-meta-menu-wrapper -->
			<div class="mt-metabox-content-wrapper">
				
				<!-- Info tab content -->
				<div class="mt-single-meta" id="mt-metabox-info">
					<div class="content-header">
						<h4><?php esc_html_e( 'About Metabox Options', 'scholarship' ) ;?></h4>
					</div><!-- .content-header -->
					<div class="meta-options-wrap"><?php esc_html_e( 'At Metabox there are option for sidebars.', 'scholarship' ); ?></div><!-- .meta-options-wrap  -->
				</div><!-- #mt-info-content -->

				<!-- Sidebar tab content -->
				<div class="mt-single-meta" id="mt-metabox-sidebar">
					<div class="content-header">
						<h4><?php esc_html_e( 'Available Sidebars', 'scholarship' ) ;?></h4>
						<span class="section-desc"><em><?php esc_html_e( 'Select sidebar from available options which replaced sidebar layout from customizer settings.', 'scholarship' ); ?></em></span>
					</div><!-- .content-header -->
					<div class="mt-meta-options-wrap">
						<div class="buttonset">
							<?php
			                   	foreach ( $scholarship_page_sidebar_options as $field ) {
			                    	$scholarship_page_sidebar = get_post_meta( $post->ID, 'single_page_sidebar', true );
                                    $scholarship_page_sidebar = ( $scholarship_page_sidebar ) ? $scholarship_page_sidebar : 'default_sidebar';
			                ?>
			                    	<input type="radio" id="<?php echo esc_attr( $field['id'] ); ?>" value="<?php echo esc_attr( $field['value'] ); ?>" name="single_page_sidebar" <?php checked( $field['value'], $scholarship_page_sidebar ); ?> />
			                    	<label for="<?php echo esc_attr( $field['id'] ); ?>">
			                    		<span class="screen-reader-text"><?php echo esc_html( $field['label'] ); ?></span>
			                    		<img src="<?php echo esc_url( $field['thumbnail'] ); ?>" title="<?php echo esc_attr( $field['label'] ); ?>" alt="<?php echo esc_attr( $field['label'] ); ?>" />
			                    	</label>
			                    
			                <?php } ?>
						</div><!-- .buttonset -->
					</div><!-- .meta-options-wrap  -->
				</div><!-- #mt-sidebar-content -->
			</div><!-- .mt-metabox-content-wrapper -->
            <div class="clear"></div>
            <input type="hidden" id="post-meta-selected" name="post_meta_identity" value="<?php echo esc_attr( $post_identity_value ); ?>" />
		</div><!-- .mt-meta-container -->
<?php
	}

endif;

/*------------------------------------------------------------------------------------------------------------------------------------*/

add_action( 'save_post', 'scholarship_save_page_meta' );

if ( ! function_exists( 'scholarship_save_page_meta' ) ) :

    /**
     * Function for save value of meta options
     *
     * @since 1.0.0
     */
    function scholarship_save_page_meta( $post_id ) {

        global $post;
        
        // Verify the nonce before proceeding.
        $scholarship_page_nonce   = isset( $_POST['scholarship_page_meta_nonce'] ) ? $_POST['scholarship_page_meta_nonce'] : '';
        $scholarship_page_nonce_action = basename( __FILE__ );

        //* Check if nonce is set...
        if ( ! isset( $scholarship_page_nonce ) ) {
            return;
        }

        //* Check if nonce is valid...
        if ( ! wp_verify_nonce( $scholarship_page_nonce, $scholarship_page_nonce_action ) ) {
            return;
        }

        //* Check if user has permissions to save data...
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }

        //* Check if not an autosave...
        if ( wp_is_post_autosave( $post_id ) ) {
            return;
        }

        //* Check if not a revision...
        if ( wp_is_post_revision( $post_id ) ) {
            return;
        }

        /*Page sidebar*/

        //Execute this saving function
        if ( isset( $_POST['single_page_sidebar'] ) ) {
            // We validate making sure that the option is something we can expect.
            $value = in_array( $_POST['single_page_sidebar'], array( 'no_sidebar', 'left_sidebar', 'right_sidebar', 'no_sidebar_center', 'default_sidebar' ) ) ? $_POST['single_page_sidebar'] : 'default_sidebar';
            // We update our post meta.
            update_post_meta( $post_id, 'single_page_sidebar', $value );
        }

        /**
         * post meta identity
         */
        $post_identity = get_post_meta( $post_id, 'post_meta_identity', true );
        $stz_post_identity = sanitize_text_field( $_POST[ 'post_meta_identity' ] );

        if ( $stz_post_identity && '' == $stz_post_identity ){
            add_post_meta( $post_id, 'post_meta_identity', $stz_post_identity );
        } elseif ( $stz_post_identity && $stz_post_identity != $post_identity ) {
            update_post_meta($post_id, 'post_meta_identity', $stz_post_identity );
        } elseif ( '' == $stz_post_identity && $post_identity ) {
            delete_post_meta( $post_id, 'post_meta_identity', $post_identity );
        }

    }

endif;  