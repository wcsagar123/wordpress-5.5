<?php
/**
* Topbar Section options
*
* @package Theme Palace
* @subpackage News Vibe
* @since News Vibe 1.0.0
*/

// Add Topbar section
$wp_customize->add_section( 'news_vibe_topbar_section', array(
	'title'             => esc_html__( 'Top Ads Section','news-vibe' ),
	'description'       => esc_html__( 'Top Ads Section options.', 'news-vibe' ),
	'panel'             => 'news_vibe_front_page_panel',
	) );

// ads image setting and control.
$wp_customize->add_setting( 'news_vibe_theme_options[ads_image]', array(
	'sanitize_callback' => 'news_vibe_sanitize_image'
	) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'news_vibe_theme_options[ads_image]',
	array(
		'label'       		=> esc_html__( 'Ads Image', 'news-vibe' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'news-vibe' ), 810, 120 ),
		'section'     		=> 'news_vibe_topbar_section',
		) ) );

// ads link setting and control
$wp_customize->add_setting( 'news_vibe_theme_options[ads_url]', array(
	'sanitize_callback' => 'esc_url_raw',
	) );

$wp_customize->add_control( 'news_vibe_theme_options[ads_url]', array(
	'label'           	=> esc_html__( 'Ads Url', 'news-vibe' ),
	'section'        	=> 'news_vibe_topbar_section',
	'type'				=> 'url',
	) );

// topbar background setting and control.
$wp_customize->add_setting( 'news_vibe_theme_options[bg_image]', array(
	'sanitize_callback' => 'news_vibe_sanitize_image'
	) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'news_vibe_theme_options[bg_image]',
	array(
		'label'       		=> esc_html__( 'Background Image', 'news-vibe' ),
		'description' 		=> esc_html__( 'Background Image For Top Section', 'news-vibe'),
		'section'     		=> 'news_vibe_topbar_section',
		) ) );