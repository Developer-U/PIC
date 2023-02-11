<?php
/*
Template Name: Карта сайта
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
                        <h1 class="pages-heading map__head">
                            <?php the_title(); ?>
                        </h1>

                        <div class="footer__menu footer-menu row justify-content-between" style="margin:0">
                            <div class="footer-menu__first row">
                                <div class="footer-menu__box footer-menu__box_first col-6">
                                    <div class="footer-menu__block">
                                        <h3 class="footer-menu__heading">
                                            о компании
                                        </h3>

                                        <?php estore_about_menu(); ?>                                
                                    </div>
                                    
                                    <div class="footer-menu__block">
                                        <h3 class="footer-menu__heading">
                                            помощь
                                        </h3>

                                        <?php estore_help_menu(); ?>
                                    </div>
                                </div>

                                <div class="footer-menu__box footer-menu__box_first col-6">
                                    <div class="footer-menu__block">
                                        <h3 class="footer-menu__heading">
                                            клиентам
                                        </h3>

                                        <?php estore_clients_menu(); ?>
                                    </div>                           
                                </div>                       
                            </div>

                            <div class="footer-menu__second">
                                <h3 class="footer-menu__heading">
                                    потолки
                                </h3>

                                <?php                         
                                    array(
                                    'per_page' => '12',
                                    'columns' => '4',
                                    'orderby' => 'title',
                                    'order' => 'asc',
                                    'category' => ''
                                ) ?>

                                <div class="footer-menu__boxes row">
                                    <div class="footer-menu__box">
                                        <div class="footer-menu__block">
                                            <h4 class="footer-menu__subheading">                         
                                                <?php 
                                                    if( $term = get_term_by( 'id', 16, 'product_cat' ) ){
                                                        echo $term->name;
                                                    }                        
                                                ?>                   
                                            </h4>
                            
                                            <ul class="footer-menu__list">
                                                <?php echo do_shortcode('[product_category category="a_facture" columns="1"]'); ?>
                                            </ul>
                                        </div>
                                        
                                        <div class="footer-menu__block">
                                            <h4 class="footer-menu__subheading">
                                                <?php 
                                                    if( $term = get_term_by( 'id', 31, 'product_cat' ) ){
                                                        echo $term->name;
                                                    }                        
                                                ?> 
                                            </h4>
                            
                                            <ul class="footer-menu__list">
                                                <?php echo do_shortcode('[product_category category="manufacturer" columns="1"]'); ?>
                                            </ul>
                                        </div>                                
                                    </div>

                                    <div class="footer-menu__box">
                                        <div class="footer-menu__block">
                                            <h4 class="footer-menu__subheading">
                                                <?php 
                                                    if( $term = get_term_by( 'id', 33, 'product_cat' ) ){
                                                        echo $term->name;
                                                    }                        
                                                ?>
                                            </h4>
                            
                                            <ul class="footer-menu__list">
                                                <?php echo do_shortcode('[product_category category="light" columns="1"]'); ?>              
                                            </ul>                                    
                                        </div>
                                        
                                        <div class="footer-menu__block">
                                            <h4 class="footer-menu__subheading"> 
                                                <?php 
                                                    if( $term = get_term_by( 'id', 30, 'product_cat' ) ){
                                                        echo $term->name;
                                                    }                        
                                                ?>                                              
                                            </h4>
                            
                                            <ul class="footer-menu__list">
                                                <?php echo do_shortcode('[product_category category="exclusive" columns="1"]'); ?>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="footer-menu__box footer-menu__box_last">
                                        <div class="footer-menu__block">
                                            <h4 class="footer-menu__subheading">
                                                <?php 
                                                    if( $term = get_term_by( 'id', 32, 'product_cat' ) ){
                                                        echo $term->name;
                                                    }                        
                                                ?>
                                            </h4>
                            
                                            <ul class="footer-menu__list">
                                                <?php echo do_shortcode('[product_category category="house_type" columns="1"]'); ?>               
                                            </ul>
                                        </div>                                
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="margin-top">
                            <?php get_template_part('template-parts/block', 'cta'); ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

<?php
get_footer(); ?>