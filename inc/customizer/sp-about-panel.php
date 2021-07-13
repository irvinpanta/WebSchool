<?php 

/****************************

Seccion: Nosotros
Agregado por Softpang
https://www.softpang.com

*****************************/

add_action( 'customize_register', 'softpang_nosotros_panel_register' );

if ( ! function_exists( 'softpang_nosotros_panel_register' ) ) :
    
    function softpang_nosotros_panel_register( $wp_customize ) {

    	$wp_customize->add_panel(
            'softpang_nosotros_settings_panel', 
            	array(
            		'priority'       => 25,
                	'capability'     => 'edit_theme_options',
                	'theme_supports' => '',
                	'title'          => esc_html__( 'SP.- Nosotros Settings', 'softpang' ),
                ) 
        );

        $wp_customize->add_section(
            'sp_section_nosotros',
            array(
                'title'     => esc_html__( 'Nosotros:', 'softpang' ),
                'panel'     => 'softpang_nosotros_settings_panel',
                'priority'  => 1,
            )
        );


        $wp_customize->add_setting('sp_nombre_nosotros',array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_nombre_nosotros',array( 
            'type' => 'text',
            'label' => __('Escriba nombre: ','softpang'),
            'section' => 'sp_section_nosotros',
            'setting' => 'sp_nombre_nosotros'
        ));


        $wp_customize->add_setting('sp_descripcion_nosotros',array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_descripcion_nosotros',array( 
            'type' => 'textarea',
            'label' => __('Escriba descripcion: ','softpang'),
            'section' => 'sp_section_nosotros',
            'setting' => 'sp_descripcion_nosotros'
        ));


        $wp_customize->add_setting(
        'sp_urlimg_nosotros',
            array(
                'sanitize_callback' => 'softpang_sanitize_file'    
            )
        ); 

        $wp_customize->add_control( 
        new WP_Customize_Upload_Control( 
            $wp_customize, 
            'sp_urlimg_nosotros', 
            array(
                'label'      => __( 'Seleccione Imagen', 'softpang' ),
                'section' => 'sp_section_nosotros'
            )
        ));


        $wp_customize->add_setting('sp_show_nosotrospanel',array(
            'default' => false,
            'sanitize_callback' => 'sp_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        ));  
        
        $wp_customize->add_control( 'sp_show_nosotrospanel', array(
            'settings' => 'sp_show_nosotrospanel',
            'section'   => 'sp_section_nosotros',
            'label'     => __('Mostrar Seccion','softpang'),
            'type'      => 'checkbox'
        ));//Show Welcome Page Section

    }

endif;

 ?>