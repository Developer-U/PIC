<?php
/*
Template Name: Главная страница
*/
get_header();
?>

<main class="main container-fluid2  row">
   
    <?php get_sidebar(); ?>

    <div class="main-content col">
        <section class="hero">
            <div class="hero__cont row justify-content-between align-items-stretch">
                <article class="hero__main hero-main row justify-content-between">
                    <h1 class="hero-main__heading col-9">
                        <?php the_field('main-mainhead'); ?>
                    </h1>
    
                    <h2 class="hero-main__subheading col-3">
                        <?php the_field('main-subhead'); ?>
                    </h2>
    
                    <div class="hero-main__catalog">
                        <a class="hero-main__btn" href="/catalog">
                            каталог потолков
                        </a>
                    </div>
                </article>
    
                <div class="hero__cta hero-cta col-xl col-12">
                    <div class="hero-cta__contain row align-items-center">
                        <h2 class="hero-cta__heading col-xxl-6 col-xl-5">
                            <?php the_field('main-form-head'); ?>
                        </h2>
        
                        <div class="hero-cta__btns col-xxl-6 col-7">
                            <button class="hero-cta__btn js-buttonZamer">
                                <span class="hero-cta__text hero-cta__text_zamer">вызов замерщика</span>
                            </button>
        
                            <a class="hero-cta__btn" href="/#calc">
                                <span class="hero-cta__text hero-cta__text_calc">калькулятор</span>
                            </a>
                        </div>
                    </div>  
                    
                    <div class="hero-cta__contain hero-cta__contain_bottom row align-items-center col-xl-12 col-7">                         
                        <div class="hero-cta__form col-xxl-6 col-12">
                            <?php echo do_shortcode('[contact-form-7 id="276" title="Форма подобрать потолок"]'); ?>
                            
                            <div class="hero-cta__btns col-xxl-6 col-xl-0"></div>
                        </div>                        
                    </div>
    
                    <a class="hero-cta__link" href="/services">
                        <h3 class="hero-cta__subheading">
                            <?php the_field('main-head-uslugi'); ?>
                        </h3>
                    </a>
                </div>            
            </div>
        </section>

        <section class="about post">
            <div class="container-fluid2  about__contain">
                <h2 class="about__heading">
                    <?php the_field('block-about-main-head'); ?>
                </h2>

                <div class="container about__box left-pad-zero row justify-content-between">
                    <div class="about__text col-lg-6 col-12">
                        <?php the_field('block-about-main-left'); ?>
                    </div>

                    <div class="about__text col-lg-6 col-12">
                        <?php the_field('block-about-main-right'); ?>                    
                    </div>
                </div>
            </div>
        </section>

        <?php get_template_part('template-parts/pricing'); ?>   
        
        <?php get_template_part('template-parts/calc'); ?> 
    
        <?php get_template_part('template-parts/options'); ?> 

        <?php get_template_part('template-parts/solutions'); ?>

        <?php get_template_part('template-parts/reviews'); ?>
    
        <?php get_template_part('template-parts/presentation'); ?>
    
        <section class="potolok reviews">
            <div class="container-fluid2  about__contain potolok__contain">
                <h2 class="calc__heading potolok__heading">
                    <?php the_field('slider-block-head'); ?>
                </h2>
    
                <div class="potolok__box container row justify-content-between">
                    <!-- Slider swiper -->                    
                    
                    <div class="potolok__slider swiper potolok-slider col-md-6 col-12">                        
                        <div class="swiper-wrapper"> 

                        <?php if( have_rows('new_slider-main-slide') ): ?>
                        <?php while( have_rows('new_slider-main-slide') ): the_row();                              
                            $slideMainImage = get_sub_field('slider-main-image');
                        ?>

                            <div class="swiper-slide potolok-slider__slide">
                                <img class="potolok-slider__img" src="<?php echo esc_url($slideMainImage['url']); ?>" alt="<?php echo esc_attr($slideMainImage['alt']); ?>">                                
                            </div>                            
    
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
    
                        <div class="swiper-button-prev button-prev-el"></div>
                        <div class="swiper-button-next button-next-el"></div>
                        
                        <div class="swiper-pagination"></div> 
                        
                        <script>
                             var menu = [
                                
                                `<?php                                                               
                                    $paginationImage1 = get_field('pagination-image1');
                                    $paginationImage2 = get_field('pagination-image2');
                                    $paginationImage3 = get_field('pagination-image3');
                                    $paginationImage4 = get_field('pagination-image4');
                                ?>
                                <a class="item-pag__link potolok-slider__link" href="#">
                                    <img class="item-pag__img" src="<?php echo esc_url($paginationImage1['url']); ?>" alt="Превью 1">         
                                </a>`,

                                `<a class="item-pag__link potolok-slider__link" href="#">
                                    <img class="item-pag__img" src="<?php echo esc_url($paginationImage2['url']); ?>" alt="Превью 1">         
                                </a>`,

                                `<a class="item-pag__link potolok-slider__link" href="#">
                                    <img class="item-pag__img" src="<?php echo esc_url($paginationImage3['url']); ?>" alt="Превью 1">         
                                </a>`,

                                `<a class="item-pag__link potolok-slider__link" href="#">
                                    <img class="item-pag__img" src="<?php echo esc_url($paginationImage4['url']); ?>" alt="Превью 1">         
                                </a>                            
                                <?php ?> `                               
                            ]
                        </script>
                    </div>
                    
                    <div class="potolok__right potolok-right col-xxl-5 col-md-6 col-12">
                        <h3 class="potolok-right__heading">
                            <?php the_field('slider-block-subhead'); ?>
                        </h3>
    
                        <p class="potolok-right__text">
                            <?php the_field('slider-block-text'); ?>
                        </p>                        
    
                        <div class="reviews-list__video potolok__video">
                            <?php $sliderBlockImg = get_field('slider-block-image'); ?>
                            <img src="<?php echo esc_url($sliderBlockImg['url']); ?>" alt="<?php echo esc_attr($sliderBlockImg['alt']); ?>" class="reviews-list__img">
                            
                            
                        </div> 
                    </div>
                </div>
            </div>
        </section>
    
        <?php get_template_part('template-parts/news', 'posts'); ?>

        <?php if( have_rows('new_main-faq_item') ): ?>

            <section class="faq">
                <div class="container ">
                    <h2 class="faq__heading">
                        <?php the_field('main-faq-head'); ?>
                    </h2>

                    <div class="faq__accords row">
                        <div id="accordion" class="faq__full row justify-content-between">

                        <?php if( have_rows('new_main-faq_item') ): ?>
                        <?php while( have_rows('new_main-faq_item') ): the_row();
                            $mainFaqName = get_sub_field('main-faq-name');
                            $mainFaqDescr = get_sub_field('main-faq-descr');                               
                        ?>

                            <!-- Section of accordion -->
                            <div class="accordion-item">
                                <div class="accordion-header faq__subheading"><?=  $mainFaqName; ?></div>
                                
                                <div>
                                    <?= $mainFaqDescr; ?>
                                </div>
                            </div>   
                            

                        <?php endwhile; ?>
                        <?php endif; ?>
                        </div>
                    </div>            
                </div>
            </section>

        <?php else: ?>
        <section class="none"></section>
        <?php endif; ?>

        <?php ?>
    
        <?php get_template_part('template-parts/block', 'cta'); ?>
    </div>
</main>

<script>
    window.addEventListener('DOMContentLoaded', function(){  
        // Сначала объявим функцию FadeIn

        const fadeIn = (el, timeout, display) => {
            el.style.opacity = 0;
            el.style.display = display || 'block';
            el.style.transition = `opacity ${timeout}ms`;
            setTimeout(() => {
            el.style.opacity = 1;
            }, 10);
        }

        // Объявим функцию FadeOut

        const fadeOut = (el, timeout) => {
            el.style.opacity = 1;
            el.style.transition = `opacity ${timeout}ms`;
            el.style.opacity = 0;

            setTimeout(() => {
            el.style.display = 'none';
            }, timeout);
        };

        // Открытие попапа Заказать замерщика 
        var zamerField = document.querySelector('.js-zamerPopup');
        var zamerFieldOpen = document.querySelectorAll('.js-buttonZamer'); 
        var zamerClose = document.querySelector('.js-zamerClose'); 
        var flag = false;  

        zamerFieldOpen.forEach(function(zamerOpen){
            zamerOpen.addEventListener('click', function(){      
                if(!flag) {
                fadeIn(zamerField, 300, 'flex');
                        
                document.querySelector('body').classList.add('closed');

                } else {
                fadeOut(zamerField, 300);
                
                document.querySelector('body').classList.remove('closed');
                }
                
                zamerClose.addEventListener('click', function(){
                fadeOut(zamerField, 300);

                document.querySelector('body').classList.remove('closed'); 
                });              
            });
        });


        // Всплытие окна Спасибо после отправки формы заказать замерщика
        document.querySelector('#zamerForm').addEventListener( 'wpcf7mailsent', function( event ) {

        document.querySelector('.popup-thanks').classList.add('thanks-active'); 
                
        fadeOut(zamerField, 300);    
            document.querySelector('body').classList.remove('closed');  

        setTimeout(() => {
            document.querySelector('.popup-thanks').classList.remove('thanks-active'); 
        }, 2500 );  

        }, false );

        

        
    });

    var article = document.querySelectorAll('.news-stories__story');
    article.forEach(function(each){
        // console.log(each['singular_name']);
    });
</script>


<?php

get_footer(); ?>