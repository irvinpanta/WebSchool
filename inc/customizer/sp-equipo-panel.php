<?php 


/****************************

Seccion: Equipo
Agregado por Softpang
https://www.softpang.com

*****************************/

add_action( 'customize_register', 'softpang_equipo_panel_register' );

if ( ! function_exists( 'softpang_equipo_panel_register' ) ) :
    
    function softpang_equipo_panel_register( $wp_customize ) {


    	$wp_customize->add_panel(
            'softpang_equipo_settings_panel', 
            	array(
            		'priority'       => 25,
                	'capability'     => 'edit_theme_options',
                	'theme_supports' => '',
                	'title'          => esc_html__( 'SP.- Equipo Settings', 'softpang' ),
                ) 
        );


        /*Oour Header*/
        $wp_customize->add_section(
            'sp_section_equipo',
            array(
                'title'     => esc_html__( 'Equipo', 'softpang' ),
                'panel'     => 'softpang_equipo_settings_panel',
                'priority'  => 1,
            )
        );

        $wp_customize->add_setting('sp_titulo_equipo',array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_titulo_equipo',array( 
            'type' => 'text',
            'label' => __('Escriba titulo: ','softpang'),
            'section' => 'sp_section_equipo',
            'setting' => 'sp_titulo_equipo'
        ));

        $wp_customize->add_setting('sp_descripcion_equipo',array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_descripcion_equipo',array( 
            'type' => 'text',
            'label' => __('Escriba descripcion: ','softpang'),
            'section' => 'sp_section_equipo',
            'setting' => 'sp_descripcion_equipo'
        ));

        $wp_customize->add_setting('sp_cantitem_equipo',array(
            'default' => 4,
            'sanitize_callback' => 'absint'    
        )); 
        $wp_customize->add_control('sp_cantitem_equipo',array( 
            'type' => 'number',
            'label' => __('Escriba Cantidad Items: ','softpang'),
            'section' => 'sp_section_equipo',
            'setting' => 'sp_cantitem_equipo'
        ));

        $wp_customize->add_setting('sp_show_equipopanel',array(
            'default' => false,
            'sanitize_callback' => 'sp_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        ));  
        
        $wp_customize->add_control( 'sp_show_equipopanel', array(
            'settings' => 'sp_show_equipopanel',
            'section'   => 'sp_section_equipo',
            'label'     => __('Mostrar Seccion','softpang'),
            'type'      => 'checkbox'
        ));//Show Welcome Page Section


    for ($i = 1; $i <= get_theme_mod('sp_cantitem_equipo', 4); $i++){


        $wp_customize->add_section(
            'sp_section_equipo_bloque0'.$i,
            array(
                'title'     => esc_html__( 'Bloque 0'.$i.':', 'softpang' ),
                'panel'     => 'softpang_equipo_settings_panel',
                'priority'  => 1,
            )
        );

        $wp_customize->add_setting('sp_nombre_equipo_bloque0'.$i,array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_nombre_equipo_bloque0'.$i,array( 
            'type' => 'text',
            'label' => __('Escriba nombre: ','softpang'),
            'section' => 'sp_section_equipo_bloque0'.$i,
            'setting' => 'sp_nombre_equipo_bloque0'.$i
        ));


        $wp_customize->add_setting('sp_descripcion_equipo_bloque0'.$i,array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_descripcion_equipo_bloque0'.$i,array( 
            'type' => 'text',
            'label' => __('Escriba descripcion: ','softpang'),
            'section' => 'sp_section_equipo_bloque0'.$i,
            'setting' => 'sp_descripcion_equipo_bloque0'.$i
        ));


        $wp_customize->add_setting(
        'sp_urlimg_equipo_bloque0'.$i,
            array(
                'sanitize_callback' => 'softpang_sanitize_file'    
            )
        ); 

        $wp_customize->add_control( 
        new WP_Customize_Upload_Control( 
            $wp_customize, 
            'sp_urlimg_equipo_bloque0'.$i, 
            array(
                'label'      => __( 'Seleccione Imagen', 'softpang' ),
                'section' => 'sp_section_equipo_bloque0'.$i                 
            )
        ));


    }   

}

endif;

 ?>