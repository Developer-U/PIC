<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* Регистрируем новый тип записей - Статьи компании и таксономию для них
-----------------------------------------------*/
add_action('init', 'articles');
function articles()
{
  $labels = array(
    'name' => 'Публикации',
    'singular_name' => 'Публикация',
    'add_new' => 'Добавить публикацию',
    'add_new_item' => 'Добавить новую публикацию',
    'edit_item' => 'Редактировать публикацию',
    'new_item' => 'Новая публикация',
    'view_item' => 'Посмотреть Публикацию',
    'search_items' => 'Найти Публикацию',
    'not_found' =>  'Публикаций не найдено',
    'not_found_in_trash' => 'В корзине статей не найдено',
    'parent_item_colon' => '',
    'menu_name' => 'Статьи, новости, акции'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail', 'comments'),
	'taxonomies' => array('articles') 
  );
  register_post_type('articles',$args);  
}


/* Регистрируем новый тип записей - Наши проекты
-----------------------------------------------*/
add_action('init', 'works');
function works()
{
  $labels = array(
    'name' => 'Наши проекты',
    'singular_name' => 'Проект',
    'add_new' => 'Добавить проект',
    'add_new_item' => 'Добавить новый проект',
    'edit_item' => 'Редактировать проект',
    'new_item' => 'Новый проект',
    'view_item' => 'Посмотреть проект',    
    'search_items' => 'Найти проект',
    'not_found' =>  'Проектов не найдено', 
    'parent_item_colon' => '',
    'menu_name' => 'Наши проекты'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'icon_url' => 'dashicons-portfolio',
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail', 'comments'),
	'taxonomies' => array('works') 
  );
  register_post_type('works',$args);  
}


/* Регистрируем новый тип записей - Услуги
-----------------------------------------------*/
add_action('init', 'uslugi');
function uslugi()
{
  $labels = array(
    'name' => 'Услуги',
    'singular_name' => 'Услуга',
    'add_new' => 'Добавить услугу',
    'add_new_item' => 'Добавить новую услугу',
    'edit_item' => 'Редактировать услугу',
    'new_item' => 'Новая услуга',
    'view_item' => 'Посмотреть услугу',    
    'search_items' => 'Найти услугу',
    'not_found' =>  'Услуг не найдено', 
    'parent_item_colon' => '',
    'menu_name' => 'Услуги'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'icon_url' => 'dashicons-admin-tools',
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail'),
	'taxonomies' => array('uslugi') 
  );
  register_post_type('uslugi',$args);  
}

// Изменим длину текста в кратком описании (По умлочанию 55 слов, я хочу 20)
add_filter( 'excerpt_length', function(){
	return 20;
} );

?>