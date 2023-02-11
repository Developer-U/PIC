<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;


Container::make( 'theme_options', 'Настройки темы' )
	
	->set_icon( 'dashicons-carrot' )

	->add_tab( __( 'Header' ), array(
	Field::make( 'select', 'est_choose_header_logo', __( 'Используется ли логотип?' ) )
		->add_options( array(
			'yes' => __( 'Да, будет использоваться' ),
			'no' => __( 'Нет, не будет использоваться' )			
		) ),
	Field::make( 'image', 'est_header_logo',  'Логотип' )
		->set_value_type( 'url' )

		->set_conditional_logic( array(
			'relation' => 'AND', // Optional, defaults to "AND"
			array(
				'field' => 'est_choose_header_logo',
				'value' => 'yes', // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
				'compare' => '=', // Optional, defaults to "=". Available operators: =, <, >, <=, >=, IN, NOT IN
			)
		) ),

	Field::make('image', 'est_logo', "Лого"),		

	Field::make( 'text', 'est_header_sitename', __( 'Название сайта' ) )
	->set_conditional_logic( array(
		'relation' => 'AND', // Optional, defaults to "AND"
		array(
			'field' => 'est_choose_header_logo',
			'value' => 'no', // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
			'compare' => '=', // Optional, defaults to "=". Available operators: =, <, >, <=, >=, IN, NOT IN
		)
	) ),
	Field::make( 'text', 'est_header_sitedescr', __( 'Описание сайта' ) )
	->set_conditional_logic( array(
		'relation' => 'AND', // Optional, defaults to "AND"
		array(
			'field' => 'est_choose_header_logo',
			'value' => 'no', // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
			'compare' => '=', // Optional, defaults to "=". Available operators: =, <, >, <=, >=, IN, NOT IN
		)
	) ),
	) )

	->add_tab( __( 'Footer' ), array(
		Field::make( 'text', 'crb_email', __( 'Notification Email' ) ),
		Field::make( 'text', 'crb_phone', __( 'Phone Number' ) ),
	) );


Container::make( 'post_meta', 'Options' )
    ->where( 'post_type', '=', 'page' )
    ->add_fields( array(

        Field::make( 'image', 'crb_photo' ),
    ));

