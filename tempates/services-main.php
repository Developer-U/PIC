<?php
/*
Template Name: Услуги общая
*/
get_header();
?>

    <main class="main container-fluid2  row">
    
        <?php get_sidebar(); ?>

        <div class="main-content col">
            <section class="reviews-page">
                <?php estore_add_breadcrumbs( );?>

                <div class="container-fluid2 about__contain blog__contain contacts row justify-content-between align-items-stretch">
                    <div class="reviews-page__main contacts__main">
                        <h1 class="pages-heading contacts__heading">
                            <?php the_title(); ?>
                        </h1> 
        
                        <div class="blog__main blog-main container row">

                        <?php
                            $uslugi = get_posts( array(
                                'numberposts' => 0,
                                'category'    => 0,
                                'orderby'     => 'date',
                                'order'       => 'ASC',
                                'include'     => array(),
                                'exclude'     => array(),
                                'meta_key'    => '',
                                'meta_value'  =>'',
                                'post_type'   => 'uslugi',
                                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                            ) );

                        global $post; ?>

                        <?php if( $uslugi) { ?>
                        <?php foreach( $uslugi as $post ){
                            setup_postdata( $post );
                        ?>

                            <article class="search-article col-md-4 col-sm-6 col-12">
                                <a class="entry-header catalog-list__heading" href="<?php the_permalink(); ?>" > 
                                    <?php the_title(); ?>
                                </a>

                                <figure class="search-article__image">
                                    <?php $services_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>
                                    <?php the_post_thumbnail(); ?>
                                </figure>

                                <div class="entry-summary">
                                    <?php the_excerpt(); ?>
                                </div>                                
                            </article>
                        <?php }                         
                
                        } else { ?>
                            <p class="news__subheading">Услуги не добавлены</p>
                        <?php }                  
                        
                        wp_reset_postdata(); // сброс
                        ?> 
                    </div>
                </div>
            </section>
        </div>
    </main>

<?php get_footer(); ?>