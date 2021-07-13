<?php 

/****************************

Seccion: TreeBox
Agregado por Softpang
https://www.softpang.com

*****************************/

add_action( 'customize_register', 'softpang_treebox_panel_register' );

if ( ! function_exists( 'softpang_treebox_panel_register' ) ) :
    
    function softpang_treebox_panel_register( $wp_customize ) {


    	$wp_customize->add_panel(
            'softpang_treebox_settings_panel', 
            	array(
            		'priority'       => 25,
                	'capability'     => 'edit_theme_options',
                	'theme_supports' => '',
                	'title'          => esc_html__( 'SP.- TreeBox Settings', 'Softpang' ),
                ) 
        );


    	$wp_customize->add_section(
            'sp_treebox_section',
            array(
                'title'     => esc_html__( 'TreeBox:', 'softpang' ),
                'panel'     => 'softpang_treebox_settings_panel',
                'priority'  => 1,
            )
        );


         $wp_customize->add_setting('sp_show_treeboxpanel',array(
            'default' => false,
            'sanitize_callback' => 'sp_sanitize_checkbox',
            'capability' => 'edit_theme_options',
        ));  
        
        $wp_customize->add_control( 'sp_show_treeboxpanel', array(
            'settings' => 'sp_show_treeboxpanel',
            'section'   => 'sp_treebox_section',
            'label'     => __('Mostrar Seccion','softpang'),
            'type'      => 'checkbox'
        ));//Show Welcome Page Section


    for ($i = 1; $i <= 3; $i++){


    	$wp_customize->add_section(
            'sp_treebox_section_bloque0'.$i,
            array(
                'title'     => esc_html__( 'TreeBox 0'.$i, 'softpang' ),
                'panel'     => 'softpang_treebox_settings_panel',
                'priority'  => 1,
            )
        );

    	$wp_customize->add_setting('sp_texto_treebox_bloque0'.$i,array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_texto_treebox_bloque0'.$i,array( 
            'type' => 'text',
            'label' => __('Escriba titulo: ','Softpang'),
            'section' => 'sp_treebox_section_bloque0'.$i,
            'setting' => 'sp_texto_treebox_bloque0'.$i
        ));

        $wp_customize->add_setting('sp_descripcion_treebox_bloque0'.$i,array(
            'default' => null,
            'sanitize_callback' => 'sanitize_text_field'    
        )); 
        $wp_customize->add_control('sp_descripcion_treebox_bloque0'.$i,array( 
            'type' => 'textarea',
            'label' => __('Escriba descripción: ','Softpang'),
            'section' => 'sp_treebox_section_bloque0'.$i,
            'setting' => 'sp_descripcion_treebox_bloque0'.$i
        ));

    }


}

endif;
?>