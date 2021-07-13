<?php 

/****************************

Seccion: Eventos
Agregado por Softpang
https://www.softpang.com

*****************************/

add_action( 'customize_register', 'softpang_eventos_panel_register' );

if ( ! function_exists( 'softpang_eventos_panel_register' ) ) :
    
    function softpang_eventos_panel_register( $wp_customize ) {

    	function sp_sanitize_checkbox( $checked ) {
            // Boolean check.
            return ( ( isset( $checked ) && true == $checked ) ? true : false );
        } 

    	$wp_customize->add_panel(
            'softpang_eventos_settings_panel', 
            	array(
            		'priority'       => 25,
                	'capability'     => 'edit_theme_options',
                	'theme_supports' => '',
                	'title'          => esc_html__( 'SP.- Eventos Settings', 'Softpang' ),
                ) 
        );


    	/****************************************************************************************************/
    	$wp_customize->add_section(
            'sp_eventos_section',
            array(
                'title'     => esc_html__( 'Eventos:', 'softpang' ),
                'panel'     => 'softpang_eventos_settings_panel',
                'priority'  => 1,
            )
        );

        $wp_customize->add_setting('sp_texto_eventos',array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_texto_eventos',array( 
            'type' => 'text',
            'label' => __('Escriba titulo: ','softpang'),
            'section' => 'sp_eventos_section',
            'setting' => 'sp_texto_eventos'
        ));

        $wp_customize->add_setting('sp_cantitem_eventos',array(
            'default' => 1,
            'sanitize_callback' => 'absint'    
        )); 
        $wp_customize->add_control('sp_cantitem_eventos',array( 
            'type' => 'number',
            'label' => __('Escriba Cantidad Items: ','softpang'),
            'section' => 'sp_eventos_section',
            'setting' => 'sp_cantitem_eventos'
        ));


        $wp_customize->add_setting('sp_show_eventospanel',array(
            'default' => false,
            'sanitize_callback' => 'sp_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        ));  
        
        $wp_customize->add_control( 'sp_show_eventospanel', array(
            'settings' => 'sp_show_eventospanel',
            'section'   => 'sp_eventos_section',
            'label'     => __('Mostrar Seccion','softpang'),
            'type'      => 'checkbox'
        ));//Show Welcome Page Section


        for ($i = 1; $i <= get_theme_mod('sp_cantitem_eventos', 1); $i++){

			/*****************SECCION eventos**********************************************/
	        
	        $wp_customize->add_section(
	            'sp_eventos_section_bloque0'.$i,
	            array(
	                'title'     => esc_html__( 'Bloque 0'.$i, 'softpang' ),
	                'panel'     => 'softpang_eventos_settings_panel',
	                'priority'  => 1,
	            )
	        );

	        /**********************************************************************/

	        $wp_customize->add_setting('sp_dia_eventos_bloque0'.$i,array(
	            'default' => 1,
	            'sanitize_callback' => 'absint'    
	        )); 
	        $wp_customize->add_control('sp_dia_eventos_bloque0'.$i,array( 
	            'type' => 'number',
	            'label' => __('Escriba Dia: ','softpang'),
	            'section' => 'sp_eventos_section_bloque0'.$i,
	            'setting' => 'sp_dia_eventos_bloque0'.$i
	        ));

	        $wp_customize->add_setting('sp_mes_eventos_bloque0'.$i,array(
            	'default' => null,
            	'sanitize_callback' => 'sanitize_text_field'    
	        )); 
	        $wp_customize->add_control('sp_mes_eventos_bloque0'.$i,array( 
	            'type' => 'text',
	            'label' => __('Escriba Mes: ','softpang'),
	            'section' => 'sp_eventos_section_bloque0'.$i,
	            'setting' => 'sp_mes_eventos_bloque0'.$i
	        ));

	        $wp_customize->add_setting('sp_titulo_eventos_bloque0'.$i,array(
            	'default' => null,
            	'sanitize_callback' => 'sanitize_text_field'    
	        )); 
	        $wp_customize->add_control('sp_titulo_eventos_bloque0'.$i,array( 
	            'type' => 'text',
	            'label' => __('Escriba titulo: ','softpang'),
	            'section' => 'sp_eventos_section_bloque0'.$i,
	            'setting' => 'sp_titulo_eventos_bloque0'.$i
	        ));

	        $wp_customize->add_setting('sp_subtitulo_eventos_bloque0'.$i,array(
            	'default' => null,
            	'sanitize_callback' => 'sanitize_text_field'    
	        )); 
	        $wp_customize->add_control('sp_subtitulo_eventos_bloque0'.$i,array( 
	            'type' => 'text',
	            'label' => __('Escriba Sub Titulo: ','softpang'),
	            'section' => 'sp_eventos_section_bloque0'.$i,
	            'setting' => 'sp_subtitulo_eventos_bloque0'.$i
	        ));

	        $wp_customize->add_setting('sp_descripcion_eventos_bloque0'.$i,array(
            	'default' => null,
            	'sanitize_callback' => 'sanitize_text_field'    
	        )); 
	        $wp_customize->add_control('sp_descripcion_eventos_bloque0'.$i,array( 
	            'type' => 'textarea',
	            'label' => __('Escriba Descripcion: ','softpang'),
	            'section' => 'sp_eventos_section_bloque0'.$i,
	            'setting' => 'sp_descripcion_eventos_bloque0'.$i
	        ));



            $wp_customize->add_setting(
            'sp_urlimg_eventos_bloque0'.$i,
                array(
                    'sanitize_callback' => 'softpang_sanitize_file'    
                )
            ); 

            $wp_customize->add_control( 
            new WP_Customize_Upload_Control( 
                $wp_customize, 
                'sp_urlimg_eventos_bloque0'.$i, 
                array(
                    'label'      => __( 'Seleccione Imagen', 'softpang' ),
                    'section' => 'sp_eventos_section_bloque0'.$i                 
                )
            ));


        }



    }
 endif;

 ?>