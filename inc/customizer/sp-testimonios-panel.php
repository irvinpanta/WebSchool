<?php 

/****************************

Seccion: Testimonios
Agregado por Softpang
https://www.softpang.com

*****************************/

add_action( 'customize_register', 'softpang_testimonios_panel_register' );

if ( ! function_exists( 'softpang_testimonios_panel_register' ) ) :
    
    function softpang_testimonios_panel_register( $wp_customize ) {


        function softpang_sanitize_file( $file, $setting ) {
          
            //allowed file types
            $mimes = array(
                'jpg|jpeg|jpe' => 'image/jpeg',
                'gif'          => 'image/gif',
                'png'          => 'image/png'
            );
              
            //check file type from file name
            $file_ext = wp_check_filetype( $file, $mimes );
              
            //if file has a valid mime type return it, otherwise return default
            return ( $file_ext['ext'] ? $file : $setting->default );
        }

    	$wp_customize->add_panel(
            'softpang_testimonios_settings_panel', 
            	array(
            		'priority'       => 25,
                	'capability'     => 'edit_theme_options',
                	'theme_supports' => '',
                	'title'          => esc_html__( 'SP.- Testimonios Settings', 'softpang' ),
                ) 
        );


    	$wp_customize->add_section(
            'sp_testimonial_section',
            array(
                'title'     => esc_html__( 'Testimonios:', 'softpang' ),
                'panel'     => 'softpang_testimonios_settings_panel',
                'priority'  => 1,
            )
        );

        $wp_customize->add_setting('sp_titulo_testimonial',array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_titulo_testimonial',array( 
            'type' => 'text',
            'label' => __('Escriba titulo: ','softpang'),
            'section' => 'sp_testimonial_section',
            'setting' => 'sp_titulo_testimonial'
        ));

        $wp_customize->add_setting('sp_descripcion_testimonial',array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_descripcion_testimonial',array( 
            'type' => 'textarea',
            'label' => __('Escriba descripcion: ','softpang'),
            'section' => 'sp_testimonial_section',
            'setting' => 'sp_descripcion_testimonial'
        ));


        $wp_customize->add_setting('sp_cantitem_testimonial',array(
            'default' => 1,
            'sanitize_callback' => 'absint'    
        )); 
        $wp_customize->add_control('sp_cantitem_testimonial',array( 
            'type' => 'number',
            'label' => __('Escriba Cantidad Items: ','softpang'),
            'section' => 'sp_testimonial_section',
            'setting' => 'sp_cantitem_testimonial'
        ));

        $wp_customize->add_setting('sp_show_testimoniospanel',array(
            'default' => false,
            'sanitize_callback' => 'sp_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        ));  
        
        $wp_customize->add_control( 'sp_show_testimoniospanel', array(
            'settings' => 'sp_show_testimoniospanel',
            'section'   => 'sp_testimonial_section',
            'label'     => __('Mostrar Seccion','softpang'),
            'type'      => 'checkbox'
        ));//Show Welcome Page Sect


    for ($i = 1; $i <= get_theme_mod('sp_cantitem_testimonial', 3); $i++){

        $wp_customize->add_section(
            'sp_testimonial_section_bloque0'.$i,
            array(
                'title'     => esc_html__( 'Bloque 0'.$i, 'softpang' ),
                'panel'     => 'softpang_testimonios_settings_panel',
                'priority'  => 1,
            )
        );

        $wp_customize->add_setting('sp_texto_testimonios_bloque0'.$i,array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_texto_testimonios_bloque0'.$i,array( 
            'type' => 'textarea',
            'label' => __('Escriba testimonio:','softpang'),
            'section' => 'sp_testimonial_section_bloque0'.$i,
            'setting' => 'sp_texto_testimonios_bloque0'.$i
        ));

        $wp_customize->add_setting('sp_autor_testimonios_bloque0'.$i,array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_autor_testimonios_bloque0'.$i,array( 
            'type' => 'text',
            'label' => __('Escriba nombre de autor:','softpang'),
            'section' => 'sp_testimonial_section_bloque0'.$i,
            'setting' => 'sp_autor_testimonios_bloque0'.$i
        ));

        $wp_customize->add_setting('sp_profesion_testimonios_bloque0'.$i,array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_profesion_testimonios_bloque0'.$i,array( 
            'type' => 'text',
            'label' => __('Escriba profesión de autor:','softpang'),
            'section' => 'sp_testimonial_section_bloque0'.$i,
            'setting' => 'sp_profesion_testimonios_bloque0'.$i
        ));


        $wp_customize->add_setting(
        'sp_urlimg_testimonios_bloque0'.$i,
            array(
                'sanitize_callback' => 'softpang_sanitize_file'    
            )
        ); 

        $wp_customize->add_control( 
        new WP_Customize_Upload_Control( 
            $wp_customize, 
            'sp_urlimg_testimonios_bloque0'.$i, 
            array(
                'label'      => __( 'Seleccione Imagen', 'softpang' ),
                'section' => 'sp_testimonial_section_bloque0'.$i                 
            )
        ));    

    }

}
endif;

 ?>