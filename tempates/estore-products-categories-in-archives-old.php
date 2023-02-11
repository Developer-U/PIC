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
                echo '</h2>'; ?>


                <div class="container">';
                    <ul class="catalog__list catalog-list row align-items-stretch">
                        <?php
                        
                        $args2 = array(                         
                            'post_type' => 'product', 
                            'posts_per_page' => 3,                         
                            'orderby' => 'id',
                            'product_cat' => 'light'                        
                        );                        
                        
                        
                        $loop = new WP_Query( $args2 );

                        if( $loop->have_posts() ):
                            
                        while ( $loop->have_posts() ) : $loop->the_post(); $term; ?>

                            <li class="catalog-list__item col-xxl-4 col-sm-6 col-12 row justify-content-between">
                                <figure class="catalog-list__image">
                                    <?php 
                                    if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
                                    else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>                                
                                </figure>

                                <div class="catalog-list__box col">
                                <h3><?php the_title(); ?></h3>
                                    <h3 class="catalog-list__heading">
                                        <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                                    </h3>

                                    <p class="catalog-list__text">
                                        <?php the_excerpt(); ?>
                                    </p>
                                </div>
                            </li>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div> <?php
        }
    }
      
}

add_action( 'woocommerce_before_shop_loop', 'estore_product_subcategories', 50 );

function estore_products() {
    wc_get_template_part( 'content', 'product' );
}

add_action('woocommerce_before_shop_loop', 'estore_products', 60);

