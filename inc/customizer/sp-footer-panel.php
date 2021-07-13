<?php 

/****************************

Seccion: Footer
Agregado por Softpang
https://www.softpang.com

*****************************/


add_action( 'customize_register', 'softpang_footer_panel_register' );

if ( ! function_exists( 'softpang_footer_panel_register' ) ) :
    
    function softpang_footer_panel_register( $wp_customize ) {

    	$wp_customize->add_panel(
            'softpang_footer_settings_panel', 
            	array(
            		'priority'       => 25,
                	'capability'     => 'edit_theme_options',
                	'theme_supports' => '',
                	'title'          => esc_html__( 'SP.- Footer Settings', 'Softpang' ),
                ) 
        );


        $wp_customize->add_section(
            'sp_footer_section',
            array(
                'title'     => esc_html__( 'Footer Bloque 01', 'softpang' ),
                'panel'     => 'softpang_footer_settings_panel',
                'priority'  => 1,
            )
        );

        $wp_customize->add_setting('sp_titulotexto_footer',array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_titulotexto_footer',array( 
            'type' => 'textarea',
            'label' => __('Escriba Titulo: ','softpang'),
            'section' => 'sp_footer_section',
            'setting' => 'sp_titulotexto_footer'
        ));


        $wp_customize->add_setting('sp_texto_footer',array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_texto_footer',array( 
            'type' => 'textarea',
            'label' => __('Escriba texto: ','softpang'),
            'section' => 'sp_footer_section',
            'setting' => 'sp_texto_footer'
        ));


        $wp_customize->add_setting('sp_cantitem_footer_bl0que02',array(
            'default' => 4,
            'sanitize_callback' => 'absint'    
        )); 
        $wp_customize->add_control('sp_cantitem_footer_bl0que02',array( 
            'type' => 'number',
            'label' => __('Cantidad Enlaces: ','softpang'),
            'section' => 'sp_footer_section',
            'setting' => 'sp_cantitem_footer_bl0que02'
        ));

        $wp_customize->add_setting('sp_texto_footer_bl0que02',array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_texto_footer_bl0que02',array( 
            'type' => 'text',
            'label' => __('Texto bloque 02: ','softpang'),
            'section' => 'sp_footer_section',
            'setting' => 'sp_texto_footer_bl0que02'
        ));


        $wp_customize->add_setting('sp_show_footerpanel',array(
            'default' => false,
            'sanitize_callback' => 'sp_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        ));  
        
        $wp_customize->add_control( 'sp_show_footerpanel', array(
            'settings' => 'sp_show_footerpanel',
            'section'   => 'sp_footer_section',
            'label'     => __('Mostrar Seccion','softpang'),
            'type'      => 'checkbox'
        ));//Show Welcome Page Section


        $wp_customize->add_section(
            'sp_footer_section_bloque02',
            array(
                'title'     => esc_html__( 'Footer Bloque 02:', 'softpang' ),
                'panel'     => 'softpang_footer_settings_panel',
                'priority'  => 1,
            )
        );

        for ($i = 1; $i <= get_theme_mod('sp_cantitem_footer_bl0que02', 4); $i++){

            $wp_customize->add_setting('sp_texoenlace_footer_bl0que0'.$i,array(
                'default' => null,
                'sanitize_callback' => 'sanitize_text_field'    
            )); 
            $wp_customize->add_control('sp_texoenlace_footer_bl0que0'.$i,array( 
                'type' => 'text',
                'label' => __('Texto Enlace 0'.$i,'softpang'),
                'section' => 'sp_footer_section_bloque02',
                'setting' => 'sp_texoenlace_footer_bl0que0'.$i
            ));

            $wp_customize->add_setting('sp_urlenlace_footer_bl0que0'.$i,array(
                'default' => null,
                'sanitize_callback' => 'esc_rul'    
            )); 
            $wp_customize->add_control('sp_urlenlace_footer_bl0que0'.$i,array( 
                'type' => 'url',
                'label' => __('Url Enlace 0'.$i,'softpang'),
                'section' => 'sp_footer_section_bloque02',
                'setting' => 'sp_urlenlace_footer_bl0que0'.$i
            ));
        }


        $wp_customize->add_section(
            'sp_footercopyright_section',
            array(
                'title'     => esc_html__( 'Copyright:', 'softpang' ),
                'panel'     => 'softpang_footer_settings_panel',
                'priority'  => 1,
            )
        );

        $wp_customize->add_setting('sp_textocopyright_footer',array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_textocopyright_footer',array( 
            'type' => 'text',
            'label' => __('Escriba Copyright: ','softpang'),
            'section' => 'sp_footercopyright_section',
            'setting' => 'sp_textocopyright_footer'
        ));
   }
endif;

?>