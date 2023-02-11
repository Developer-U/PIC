<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action( 'wp_enqueue_scripts', 'estore_scripts' );
function estore_scripts() {
	wp_enqueue_style( 'estore-swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), null, 'all');

	wp_enqueue_style( 'estore-fancybox-style', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css', array(), null, 'all');

	wp_enqueue_style( 'ion-range-style', get_template_directory_uri() . '/assets/css/ion.rangeSlider.min.css', array(), null, 'all');

	wp_enqueue_style( 'simplebar-style', get_template_directory_uri() . '/assets/css/simplebar.css', array(), null, 'all');
	
	wp_enqueue_style( 'estore-style', get_template_directory_uri() . '/assets/css/styles.min.css', array('estore-bootstrap-style'), true);

	wp_enqueue_style( 'estore-ajax', get_template_directory_uri() . '/assets/css/ajax.css', array('estore-bootstrap-style'), true);

	wp_enqueue_style( 'estore-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), null, 'all');
}

add_action( 'wp_enqueue_scripts', 'estore_styles' );
function estore_styles() {

	wp_enqueue_script( 'estore-jquery-js', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '20151215', true );

	wp_enqueue_script( 'estore-jquery-min-js', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array('estore-jquery-js'), null, true );

	wp_enqueue_script( 'estore-fancybox-js', get_template_directory_uri() . '/assets/js/fancybox.min.js', array('estore-jquery-js'), null, true );
	
	wp_enqueue_script( 'estore-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('estore-jquery-js'), null, true );	

	wp_enqueue_script( 'estore-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('estore-jquery-js'), null, true );

	wp_enqueue_script( 'estore-simplebar-js', get_template_directory_uri() . '/assets/js/simplebar.min.js', array('estore-jquery-js'), null, true );

	wp_enqueue_script( 'estore-ion-js', get_template_directory_uri() . '/assets/js/ion.rangeSlider.min.js', array('estore-jquery-js'), null, true );

	wp_enqueue_script( 'estore-gsap-js', get_template_directory_uri() . '/assets/js/gsap.min.js', array('estore-jquery-js'), null, true );

	wp_enqueue_script( 'estore-scrollmagic', get_template_directory_uri() . '/assets/js/scrollmagic.min.js', array('estore-jquery-js'), null, true );
	
	wp_enqueue_script( 'estore-sidebar', get_template_directory_uri() . '/assets/js/sidebar.js', array('estore-scrollmagic'), null, true );

	wp_enqueue_script( 'estore-swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('estore-jquery-js'), true );

	wp_enqueue_script( 'estore-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );



	// Подключаем скрипт формы поиска на сайте

	wp_enqueue_script( 'estore-search', get_template_directory_uri() . '/assets/js/ajax-search.js', array(), '20151215', true );

	// Перед скриптом добавляем данные

	wp_localize_script( 'estore-search', 'search_form', array(
		'url' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce('search-nonce')
	) );

    wp_enqueue_script( 'estore-mainjs', get_template_directory_uri() . '/assets/js/main.min.js', array(), 'all', true );

	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}