<?php
/*
Template Name: О компании
*/
get_header();
?>

    <main class="main container-fluid2  row">
    
        <?php get_sidebar(); ?>

        <div class="main-content about-content col">            
            <section class="about-page">
                <?php estore_add_breadcrumbs();?>

                <?php $aboutBgImg = get_field('about_bg_img'); ?>

                <div class="container-fluid2 hero__cont row justify-content-between align-items-stretch">
                    <article class="hero-main about-page__main row justify-content-between" style='background: grey url("<?php echo esc_url($aboutBgImg['url']); ?>") no-repeat center/cover;'>
                        <h1 class="hero-main__heading about-page__heading col-12">
                            <?php the_title();?>
                        </h1>                 
                    </article>
        
                    <div class="about-page__cta about-cta">
                       <p class="about-page__text">
                            <?php the_field( 'about_page_text' );?>
                       </p>
        
                       <article class="about-page__info">
                            <h2 class="about-page__info">
                                Информация о юридическом лице:
                            </h2>
        
                            <ul class="about-page__list info-list">
                                <?php if(have_rows('add_status_item')): ?>
                                <?php while(have_rows('add_status_item')): the_row();
                                $aboutStatus = get_sub_field('status_item');                                
                                ?>

                                    <li class="info-list__item"><?= $aboutStatus; ?></li>

                                <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                       </article>
                    </div>            
                </div>
            </section>

            <section class="about post">
                <div class="container-fluid2  about__contain">
                    <h2 class="about__heading">
                        <?php the_field('block-about-abouts-head'); ?>
                    </h2>

                    <div class="container about__box left-pad-zero row justify-content-between">
                        <div class="about__text col-lg-6 col-12">
                            <?php the_field('block-about-abouts-left'); ?>
                        </div>

                        <div class="about__text col-lg-6 col-12">
                            <?php the_field('block-about-abouts-right'); ?>                    
                        </div>
                    </div>
                </div>
            </section>

            <?php get_template_part('template-parts/map'); ?>

            <div class="margin-top">
                <?php get_template_part('template-parts/block', 'cta'); ?>
            </div>
        </div>
    </main>

<?php get_footer(); ?>