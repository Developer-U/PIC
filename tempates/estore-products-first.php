<?php
/**
 * Plugin Name: Estore display WooCommerce products and categories/subcategories separately in archive pages
 * Plugin URI: 
 * Description: Display products and catgeories / subcategories as two separate lists in product archive pages
 * Version: 1.0
 * Author: Moiseev Yury
 * Author URI: 
 *
 *
 */

function estore_product_subcategories( $args = array() ) {
    $parentid = get_queried_object_id(); // Получаем ID
         
    $args = array(
        'parent' => $parentid        
    );
     
    $terms = get_terms( 'product_cat', $args );
     
    if ( $terms ) { 
        foreach ( $terms as $term ) { ?>                            
            <div class="catalog__article">
                <?php echo '<h2>';
                    echo '<a href="' .  esc_url( get_term_link( $term ) ) . '" class="' . $term->slug . '">';
                        echo $term->name;
                    echo '</a>';
                echo '</h2>';
            echo '</div>'
        }
    } 

add_action( 'woocommerce_before_shop_loop', 'estore_product_subcategories', 50 );




