<?php
/*
Template Name: Мастера
*/
get_header();
?>

    <main class="main container-fluid2  row">
    
        <?php get_sidebar(); ?>

        <div class="main-content col">
            <section class="reviews-page">
                <?php estore_add_breadcrumbs( );?>

                <div class="container-fluid2 about__contain border-bottom-none blog__contain row justify-content-between align-items-stretch">                    
                    <div class="reviews-page__main masters ">
                        <h1 class="pages-heading blog__heading">
                            <?php the_title(); ?>
                        </h1>
                        
                        <ul class="masters__list row container">

                        <?php if( have_rows('add_master_card') ): ?>
                        <?php while( have_rows('add_master_card') ): the_row(); 
                        $masterPhoto = get_sub_field('master_photo');
                        $masterName = get_sub_field('master_name');
                        $masterPost = get_sub_field('master_post');
                        $masterExp = get_sub_field('master_exp');
                        $masterText = get_sub_field('master_text');
                        ?>

                            <li class="masters__item row col-lg-6 col-12">
                                <figure class="masters__photo">
                                    <img class="masters__img" src="<?php echo esc_url($masterPhoto['url']); ?>" alt="<?php echo esc_attr($masterPhoto['alt']); ?>">
                                </figure>
        
                                <div class="masters__cont">
                                    <h2 class="masters__name">
                                        <?= $masterName; ?>
                                    </h2>
        
                                    <h3 class="masters__post">
                                        <?= $masterPost; ?>
                                    </h3>
        
                                    <h4 class="masters__post">
                                        <?= $masterExp; ?>
                                    </h4>
        
                                    <p class="masters__descr">
                                        <?= $masterText; ?>
                                    </p>
                                </div>
                            </li>
        
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </section>

            <div class="margin-top">
                <?php get_template_part('template-parts/block', 'cta'); ?>
            </div> 
        </div>
    </main>

<?php
get_footer(); ?>