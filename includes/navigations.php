<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

register_nav_menus( array(
    'primary' => 'Основное',
    'secondary' => 'Вторичное',
    'about' =>'О компании',
    'help' =>'Помощь',
    'clients' =>'Клиентам',
    'article' =>'Смотрите также'
));

function estore_primary_menu() {
    wp_nav_menu( [
        'theme_location'  => 'primary',
        'container_class' => 'menu-top left-top__menu',
        'menu_class'      => 'row justify-content-between',  
        'menu_id'         => 'primary-menu'   
    ] );
}

function estore_secondary_menu() {
    wp_nav_menu( [
        'theme_location'  => 'secondary',
        'container_class' => 'sidebar-container',     
        'menu_class'      => 'hero-sidebar__list',  
        'menu_id'         => 'secondary-menu'   
    ] );
}

function estore_about_menu() {
    wp_nav_menu( [
        'theme_location'  => 'about',           
        'menu_class'      => 'footer-menu__list',  
        'menu_id'         => 'about-menu'   
    ] );
}

function estore_help_menu() {
    wp_nav_menu( [
        'theme_location'  => 'help',           
        'menu_class'      => 'footer-menu__list',  
        'menu_id'         => 'help-menu'   
    ] );
}

function estore_clients_menu() {
    wp_nav_menu( [
        'theme_location'  => 'clients',           
        'menu_class'      => 'footer-menu__list',  
        'menu_id'         => 'clients-menu'   
    ] );
}

function estore_article_menu() {
    wp_nav_menu( [
        'theme_location'  => 'article',           
        'menu_class'      => 'look-more__list row',  
        'menu_id'         => 'article-menu'   
    ] );
}