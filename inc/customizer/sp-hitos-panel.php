<?php

/****************************

Seccion: Hitos
Agregado por Softpang
https://www.softpang.com

*****************************/


add_action( 'customize_register', 'softpang_hitos_panel_register' );

if ( ! function_exists( 'softpang_hitos_panel_register' ) ) :
    
    function softpang_hitos_panel_register( $wp_customize ) {


    	$wp_customize->add_panel(
            'softpang_hitos_settings_panel', 
            	array(
            		'priority'       => 25,
                	'capability'     => 'edit_theme_options',
                	'theme_supports' => '',
                	'title'          => esc_html__( 'SP.- Hitos Settings', 'softpang' ),
                ) 
        );
    /*------------------------------------------------------------------------------------------------------------------------------------*/

        $wp_customize->add_section(
            'sp_hitos_section',
            array(
                'title'     => esc_html__( 'Hitos:', 'softpang' ),
                'panel'     => 'softpang_hitos_settings_panel',
                'priority'  => 1,
            )
        );

        /*$wp_customize->add_setting('sp_cantitem_hitos',array(
            'default' => 4,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_cantitem_hitos',array( 
            'type' => 'text',
            'label' => __('Escriba Cantidad Items: ','softpang'),
            'section' => 'sp_hitos_section',
            'setting' => 'sp_cantitem_hitos'
        ));*/

        $wp_customize->add_setting(
        'sp_urlimg_hitos_bloque0',
            array(
                'sanitize_callback' => 'softpang_sanitize_file'    
            )
        ); 

        $wp_customize->add_control( 
        new WP_Customize_Upload_Control( 
            $wp_customize, 
            'sp_urlimg_hitos_bloque0', 
            array(
                'label'      => __( 'Seleccione Imagen de fondo', 'softpang' ),
                'section' => 'sp_hitos_section'
            )
        )); 


        $wp_customize->add_setting('sp_show_hitospanel',array(
            'default' => false,
            'sanitize_callback' => 'sp_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        ));  
        
        $wp_customize->add_control( 'sp_show_hitospanel', array(
            'settings' => 'sp_show_hitospanel',
            'section'   => 'sp_hitos_section',
            'label'     => __('Mostrar Seccion','softpang'),
            'type'      => 'checkbox'
        ));//Show Welcome Page Section



    for ($i = 1; $i <= 4; $i++ ){


        $wp_customize->add_section(
            'sp_hitos_section_bloque0'.$i,
            array(
                'title'     => esc_html__( 'Bloque 0'.$i.':', 'softpang' ),
                'panel'     => 'softpang_hitos_settings_panel',
                'priority'  => 1,
            )
        );


        $wp_customize->add_setting('sp_numero_hitos_bloque0'.$i,array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_numero_hitos_bloque0'.$i,array( 
            'type' => 'text',
            'label' => __('Escriba numero: ','softpang'),
            'section' => 'sp_hitos_section_bloque0'.$i,
            'setting' => 'sp_numero_hitos_bloque0'.$i
        ));

        $wp_customize->add_setting('sp_texto_hitos_bloque0'.$i,array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_texto_hitos_bloque0'.$i,array( 
            'type' => 'text',
            'label' => __('Escriba texto: ','softpang'),
            'section' => 'sp_hitos_section_bloque0'.$i,
            'setting' => 'sp_texto_hitos_bloque0'.$i
        ));

        $wp_customize->add_setting('sp_imgurl_hitos_bloque0'.$i,array(
            'default' => null,
            'sanitize_callback' => 'esc_url'    
        )); 
        $wp_customize->add_control('sp_imgurl_hitos_bloque0'.$i,array( 
            'type' => 'url',
            'label' => __('Url de Icono (.svg): ','softpang'),
            'section' => 'sp_hitos_section_bloque0'.$i,
            'setting' => 'sp_imgurl_hitos_bloque0'.$i
        ));

    }
        


}// close function

endif;