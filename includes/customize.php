<?php

function wolfactive_customizer( $wp_customize ) {
            $wp_customize->add_panel(
            // $id
            'theme_option',
            // $args
            array(
              'priority' 			=> 11,
              'capability' 		=> 'edit_theme_options',
              'theme_supports'	=> '',
              'title' 			=> __( 'Theme Opitons', 'wolfactive' ),
              'description' 		=> __( 'Theme option', 'wolfactive' ),
            )
          );
      // Thông tin công ty
      $wp_customize->add_section(
      'title_sub_footer_top_menu',
      array(
          'title' => esc_html__( 'Tiêu đề sub Footer và top Menu', 'wolfactive' ),
          'panel'   =>  'theme_option',
          'priority' => 150
        )
     );
    // Thông tin công ty
    $wp_customize->add_section(
        'company_information',
        array(
            'title' => esc_html__( 'Thông tin công ty', 'wolfactive' ),
            'panel'   =>  'theme_option',
            'priority' => 150
        )
    );
    //social footer
    $wp_customize->add_section(
        'social_link',
        array(
            'title' => esc_html__( 'Mạng xã hội', 'wolfactive' ),
            'panel'   =>  'theme_option',
            'priority' => 150
        )
    );
      /*----------------------------------------------------------------------*/
    //Company_phone
    $wp_customize->add_setting(
        // $id
        'company_phone',
        // $args
        array(
          'sanitize_callback'	=> 'sanitize_text_field',
          'default'            =>  '032 717 2497 - 093 724 8602'
        )
      );


    $wp_customize->add_control(
            'company_phone',
            array(
                'label' => esc_html__( 'Điền số diện thoại', 'wolfactive' ),
                'section' => 'company_information',
                'type' => 'text'
            )
   );
   /*----------------------------------------------------------------------*/
   //Company_email
   $wp_customize->add_setting(
           'company_email',
           array(
               'sanitize_callback' => 'sanitize_email', //removes all invalid characters
               'default'           => 'info.wolfactive@gmail.com'
           )
       );

       $wp_customize->add_control(
           'company_email',
           array(
               'label' => esc_html__( 'Điền email công ty', 'wolfactive' ),
               'section' => 'company_information',
               'type' => 'email'
           )
       );
      /*----------------------------------------------------------------------*/
        //SOCIAL
        $wp_customize->add_setting(
            // $id
            'link_facebook',
            // $args
            array(
              'sanitize_callback'	=> 'sanitize_text_field',
              'default'           =>  'https://www.facebook.com/'
            )
          );


        $wp_customize->add_control(
                'link_facebook',
                array(
                    'label' => esc_html__( 'Link Facebook', 'wolfactive' ),
                    'section' => 'social_link',
                    'type' => 'text'
                )
       );

       $wp_customize->add_setting(
        // $id
        'link_instagram',
        // $args
        array(
          'sanitize_callback'	=> 'sanitize_text_field',
          'default'           =>  'Instagram STEAL SNEAKER AUTHENTIC'
        )
      );


        $wp_customize->add_control(
                'link_instagram',
                array(
                    'label' => esc_html__( 'Link Instagram', 'wolfactive' ),
                    'section' => 'social_link',
                    'type' => 'text'
                )
        );
        $wp_customize->add_setting(
            // $id
            'link_youtube',
            // $args
            array(
              'sanitize_callback'	=> 'sanitize_text_field',
              'default'           =>  'Youtube SNEAKER AUTHENTIC'
            )
          );


            $wp_customize->add_control(
                    'link_youtube',
                    array(
                        'label' => esc_html__( 'Link Youtube', 'wolfactive' ),
                        'section' => 'social_link',
                        'type' => 'text'
                    )
            );
            $wp_customize->add_setting(
                // $id
                'link_pinterest',
                // $args
                array(
                  'sanitize_callback'	=> 'sanitize_text_field',
                  'default'           =>  'Pinterest STEAL SNEAKER AUTHENTIC'
                )
              );


                $wp_customize->add_control(
                        'link_pinterest',
                        array(
                            'label' => esc_html__( 'Link Pinterest', 'wolfactive' ),
                            'section' => 'social_link',
                            'type' => 'text'
                        )
                );

                $wp_customize->add_setting(
                    // $id
                    'link_linkedin',
                    // $args
                    array(
                      'sanitize_callback'	=> 'sanitize_text_field',
                      'default'           =>  'Linkedin STEAL SNEAKER AUTHENTIC'
                    )
                  );


                    $wp_customize->add_control(
                            'link_linkedin',
                            array(
                                'label' => esc_html__( 'Link Linkedin', 'wolfactive' ),
                                'section' => 'social_link',
                                'type' => 'text'
                            )
                    );
        //SOCIAL
}
add_action( 'customize_register', 'wolfactive_customizer' );
