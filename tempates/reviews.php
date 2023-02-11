<?php
/*
Template Name: Отзывы
*/
get_header();
?>

    <main class="main container-fluid2  row">
    
        <?php get_sidebar(); ?>

        <div class="main-content col">
            <section class="reviews-page">
                <?php estore_add_breadcrumbs( );?>

                <div class="container-fluid2 hero__cont row justify-content-between align-items-stretch">

                    <div class="reviews-page__main">
                        <h1 class="pages-heading">
                            <?php the_title(); ?>
                        </h1> 
                        
                        <div class="reviews-page__box row">
                            <ul class="reviews-page__list list-rew row">

                            <?php                                
                                $revTypeName1 = get_field('reviews_type_name1'); 
                                $revTypeName2 = get_field('reviews_type_name2');
                                $revTypeName3 = get_field('reviews_type_name3');                             
                            ?>

                                <li class="list-rew__item col-auto">
                                    <a href="#" class="list-rew__link" data-path3="one">
                                        <?= $revTypeName1 ?>
                                    </a>
                                </li>
                                <li class="list-rew__item col-auto">
                                    <a href="#" class="list-rew__link" data-path3="two">
                                        <?= $revTypeName2 ?>
                                    </a>
                                </li>
                                <li class="list-rew__item col-auto">
                                    <a href="#" class="list-rew__link" data-path3="three">
                                        <?= $revTypeName3 ?>
                                    </a>
                                </li>
                            </ul>

                            <button id="js-openRew" class="reviews-page__btn">оставить отзыв</button>
                        </div>                        

                        <article class="reviews-page__page" data-target3="one">
                            <h2 class="visually-hidden">Видеоотзывы</h2>

                            <div class="reviews-page__article article-rew">                                
                                <div class="article-rew__page">                                

                                    <?php if( have_rows('add_reviews_page_list') ): ?>
                                    <?php while( have_rows('add_reviews_page_list') ): the_row();
                                        $revDate = get_sub_field('rev_date');
                                        $rev_page_head = get_sub_field('rev_page_head');
                                        $rev_page_video = get_sub_field('rev_page_video'); 

                                        $revDate2 = get_sub_field('rev_date2');
                                        $rev_page_head2 = get_sub_field('rev_page_head2');
                                        $rev_page_video2 = get_sub_field('rev_page_video2');

                                        $revDate3 = get_sub_field('rev_date3');
                                        $rev_page_head3 = get_sub_field('rev_page_head3');
                                        $rev_page_video3 = get_sub_field('rev_page_video3');
                                    ?>

                                        <div class="reviews__list reviews-list container row justify-content-between">
                                            <div class="reviews-list__left col-md-5 col-12">
                                                <article class="reviews-list__review">
                                                    <date class="reviews-list__date"><?= $revDate; ?></date>
                            
                                                    <h3 class="reviews-list__heading">
                                                        <?= $rev_page_head; ?>
                                                    </h3>
                            
                                                    <div class="reviews-list__video">                                                        
                                                        <?php
                                                        if(!empty($rev_page_video)) {
                                                            
                                                        ?>
                                                            <video controls class="reviews-list__img">
                                                                <source src="<?php echo esc_url($rev_page_video['url']); ?>" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>

                                                        <?php } ?>                                                        

                                                    </div>                        
                                                </article>
                            
                                                <article class="reviews-list__review reviews-list__review_two">
                                                    <date class="reviews-list__date"><?= $revDate2; ?></date>
                            
                                                    <h3 class="reviews-list__heading">
                                                        <?= $rev_page_head2; ?>
                                                    </h3>
                            
                                                    <div class="reviews-list__video reviews-list__video_two">                                                        
                                                        <?php
                                                        if(!empty($rev_page_video2)) {
                                                            
                                                        ?>
                                                            <video controls class="reviews-list__img">
                                                                <source src="<?php echo esc_url($rev_page_video2['url']); ?>" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video> 
                                                                                                                                                                    
                                                        <?php } ?>
                                                    </div>                        
                                                </article>
                                            </div>
                            
                                            <div class="reviews-list__right col-md-7 col-12">
                                                <article class="reviews-list__wide">
                                                    <div class="reviews-list__video reviews-list__video_wide">
                                                        <?php
                                                            if(!empty($rev_page_video3)) {
                                                            
                                                        ?>
                                                            <video controls class="reviews-list__img">
                                                                <source src="<?php echo esc_url($rev_page_video3['url']); ?>" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>   
                                                                                                                                                                    
                                                        <?php } ?> 
                                                    </div>
                                                    
                                                    <date class="reviews-list__date"><?= $revDate3; ?></date>
                            
                                                    <h3 class="reviews-list__heading reviews-list__heading_wide">
                                                        <?= $rev_page_head3; ?>
                                                    </h3>                                                
                                                </article>
                                            </div>
                                        </div>                      

                                        
                                    <?php endwhile; ?>
                                    <?php endif; ?> 
                                </div>                    
                            </div>
                        </article>

                        <article class="reviews-page__page" data-target3="two">
                            <h2 class="visually-hidden">Наши клиенты</h2>

                            <div class="reviews-page__article article-text-rew article-rew-active" data-target4="one">                               
                                <div class="reviews-page__box">
                                    <ul class="reviews-page__child text-reviews row">

                                        <?php if( have_rows('add_text_review') ): ?>
                                        <?php while( have_rows('add_text_review') ): the_row();
                                        $textRevDate = get_sub_field('text_rev_date');
                                        $textRevTitle = get_sub_field('text_rev_title');
                                        $textRevCont = get_sub_field('text_rev_cont');
                                        ?>  

                                            <li class="text-reviews__item">
                                                <date class="reviews-list__date"><?= $textRevDate; ?></date>
                                    
                                                <h3 class="reviews-list__heading">
                                                    <?= $textRevTitle; ?>
                                                </h3>
                    
                                                <p class="text-reviews__text">
                                                    <?= $textRevCont; ?>
                                                </p>
                    
                                                <!-- Slider swiper -->
                                                <div class="for-slider">
                                                    <div class="text-reviews__slider swiper swiper-container text-reviews-slider">                        
                                                        <div class="swiper-wrapper text-reviews__wrapper"> 

                                                        <?php if( have_rows('add_text_review_slide') ): ?>
                                                        <?php while( have_rows('add_text_review_slide') ): the_row();
                                                        $textRevSlide = get_sub_field('text_rev_slide');                                                      
                                                        ?> 

                                                            <div class="swiper-slide text-reviews__slide">
                                                                <a href="<?php echo esc_url( $textRevSlide['url'] ); ?>" class="text-reviews__large" data-fancybox="slides">
                                                                    <img class="potolok-slider__img" src="<?php echo esc_url( $textRevSlide['url'] ); ?>" alt="<?php echo esc_attr( $textRevSlide['alt'] ); ?>">                                
                                                                </a>                                                                
                                                            </div>                                                            
                        
                                                        <?php endwhile; ?>
                                                        <?php endif; ?>      
                                                        </div>
                        
                                                        <div class="swiper-button-prev button-prev-el2"></div>
                                                        <div class="swiper-button-next button-next-el2"></div>
                                                    </div>
                                                </div>                                                
                                            </li>                                           

                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </article>

                        <article class="reviews-page__page reviews-page__article" data-target3="three">
                            <h2 class="visually-hidden">Отзовики</h2>

                            <div class="reviews-page__box reviews-page__cont">
                                <p class="reviews-page__descr">
                                    <?php the_field('otzovik_text'); ?>
                                </p>

                                <ul class="reviews-page__logos row">

                                    <?php if(have_rows('add_otzovik')): ?>
                                    <?php while(have_rows('add_otzovik')): the_row();
                                    $otzovLogo = get_sub_field('otzovik_logo');
                                    $otzovName = get_sub_field('otzovik_name');
                                    $otzovLink = get_sub_field('otzovik_link');
                                    ?>
                                    
                                    <li class="reviews-page__logo">
                                        <a class="reviews-page__link" href="<?= $otzovLink; ?>">
                                            <img src="<?php echo esc_url($otzovLogo['url']); ?>" alt="<?php echo esc_attr($otzovLogo['alt']); ?>" class="reviews-page__image">

                                            <p class="reviews-page__name">
                                                <?= $otzovName; ?>
                                            </p>
                                        </a>
                                    </li>
                                    
                                    <?php endwhile; ?>
                                    <?php endif; ?> 
                                </ul>
                            </div>
                        </article>
                    </div>           
                </div>
            </section>

            <div class="margin-top">
                <?php get_template_part('template-parts/block', 'cta'); ?>
            </div>                      
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

            // Открытие попапа Оставить отзыв

            var reviewsField = document.querySelector('.js-reviewsPopup');
            const reviewsToOpen = document.getElementById('js-openRew'); 
            var reviewsClose = document.querySelector('.js-reviewsClose'); 
            var flag = false;            
            
            reviewsToOpen.addEventListener('click', function(e){ 
                e.preventDefault();     
                if(!flag) {
                fadeIn(reviewsField, 300, 'flex');
                        
                document.querySelector('body').classList.add('closed');

                } else {
                fadeOut(reviewsField, 300);
                
                document.querySelector('body').classList.remove('closed');
                }
                
                reviewsClose.addEventListener('click', function(){
                fadeOut(reviewsField, 300);

                document.querySelector('body').classList.remove('closed'); 
                });
            });

            // Всплытие окна Спасибо после отправки формы Оставить отзыв
            document.querySelector('#reviewsForm').addEventListener( 'wpcf7mailsent', function( event ) {

                document.querySelector('.popup-thanks').classList.add('thanks-active'); 
                        
                fadeOut(reviewsField, 300);    
                    document.querySelector('body').classList.remove('closed');  
                
                setTimeout(() => {
                    document.querySelector('.popup-thanks').classList.remove('thanks-active'); 
                }, 2500 );  
                
            }, false );


            // Табы переключения типов отзывов на странице Отзывы

            // Зададим в переменную первую ссылку
            var firstRewLink = document.querySelector('.list-rew__item:first-of-type .list-rew__link');            
            firstRewLink.classList.add('link-active');

            document.querySelectorAll('.list-rew__link').forEach(function(tabs3Btn){
                tabs3Btn.addEventListener('click', function(event){
                    event.preventDefault();
                    const path3 = event.currentTarget.dataset.path3;

                    document.querySelectorAll('.list-rew__link').forEach(function(oneTab3){
                        oneTab3.classList.remove('link-active');

                        firstRewLink.classList.remove('link-active');
                    });

                    // Определим текущую ссылку
                    var currentLink =  document.querySelector(`[data-path3='${path3}']`);                   
                    
                    // И сразу при клике сделаем её активной
                    currentLink.classList.add('link-active');
                    
                    // Зададим условие: если текущая ссылка равна первой, то первую делаем активной      
                    if(currentLink.getAttribute('data-path3') == firstRewLink.getAttribute('data-path3')) {
                        firstRewLink.classList.add('link-active');
                    }

                    // Итерируем табы и закрываем все открытые табы
                    document.querySelectorAll('.reviews-page__page').forEach(function(tabContent3){
                        tabContent3.classList.remove('reviews-page-active');

                        // Зададим в переменную первый Таб (в стилях делаем первый элемент открытым)        
                        var firstRevTab = document.querySelector('.reviews-page__page:first-of-type');  

                        // Соответственно при клике на любую кнопку его сразу закрываем
                        firstRevTab.style.display = 'none';

                        // Закинем в переменную текущий Таб с соответствующим атрибутом data-target       
                        var currentTab = document.querySelector(`[data-target3="${path3}"]`);

                        // Зададим условие: если атрибут data-target текущего таба соответствует первому Табу, то есть
                        // если это и есть первый Таб, открываем его, если нет - держим закрытым и открываем соответствующий
                        if(currentTab.getAttribute('data-target3') == firstRevTab.getAttribute('data-target3')) {
                            firstRevTab.style.display = 'block';
                        } else {
                            firstRevTab.style.display = 'none';
                    
                            currentTab.classList.add('reviews-page-active');
                        }         

                    }); 
                });
            });


            // Добавление видеоотзывов
              
            var revArticle = document.getElementsByClassName('reviews-list');
                        
            var revArtBtn = document.createElement('button'); // Создаём кнопку Добавить видеоотзывы           

            revArtBtn.classList.add('read-more-btn'); // Присваиваем её стили

            revArtBtn.innerText = 'Больше отзывов';  // Задаём ей текст

            var parentCont = document.querySelector('.article-rew__page'); // Обратимся к родителю            

            if(revArticle.length > 1) {  // Добавляем кнопку, если блоков отзывов больше 1
                parentCont.append(revArtBtn);
            }

            for(let i=1; i<revArticle.length; i++) {
                revArticle[i].style.display = 'none'; // Скрывааем все статьи, что больше i=1             
            }            

            var countA = 1; //Установим счётчик - при клике на кнопку будет добавляться ещё 1 блок отзывов

            revArtBtn.addEventListener('click', function(){
                var revArticle = document.getElementsByClassName('reviews-list');

                countA += 1;

                console.log(countA);
            console.log(revArticle.length);

                if(countA <= revArticle.length) {
                    for(let i=0; i<countA; i++) {
                        revArticle[i].style.display = 'flex';

                        // Когда число добавляемых блоков отзывов равняется всему числу блоков, скрываем кнопку
                        if(countA == revArticle.length) {
                            revArtBtn.style.display = 'none';
                    }
                    }
                }
            });   
            
            
            // Добавление текстовых отзывов
              
            var revLetter = document.getElementsByClassName('text-reviews__item');
                        
            var revLetterBtn = document.createElement('button'); // Создаём кнопку      

            revLetterBtn.classList.add('read-more-btn'); // Присваиваем её стили

            revLetterBtn.innerText = 'Больше отзывов';  // Задаём ей текст

            var parentCont = document.querySelector('[data-target3="two"]'); // Обратимся к родителю            

            if(revLetter.length > 4) {  // Добавляем кнопку, если отзывов больше 4
                parentCont.append(revLetterBtn);
            }

            for(let i=4; i<revLetter.length; i++) {
                revLetter[i].style.display = 'none'; // Скрывааем все статьи, что больше i=1             
            }

            var countD = 4; //Установим счётчик - при клике на кнопку будет добавляться ещё 1 отзыв
            revLetterBtn.addEventListener('click', function(){
                var revLetter = document.getElementsByClassName('text-reviews__item');

                countD += 1;

                if(countD <= revLetter.length) {
                    for(let i=0; i<countD; i++) {
                        revLetter[i].style.display = 'block';

                        // Когда число добавляемых отзывов равняется всему числу всех отзывов, скрываем кнопку
                        if(countD == revLetter.length) {
                            revLetterBtn.style.display = 'none';
                    }
                    }
                }
            });             

            
            
            // Подключаем API You Tube для одновременного включения нескольких видео
            
            var player1st;
            var player2nd;
            var player3rd;
            function onYouTubePlayerAPIReady() { 
                player1st = new YT.Player('frame1st', {events: {'onStateChange': onPlayerStateChange}}); 
                player2nd = new YT.Player('frame2nd', {events: {'onStateChange': onPlayerStateChange}});
                player3rd = new YT.Player('frame3rd', {events: {'onStateChange': onPlayerStateChange}});
                }

            //function onYouTubePlayerAPIReady() { player2nd = new YT.Player('frame2nd', {events: {'onStateChange': onPlayerStateChange}}); }
            function onPlayerStateChange(event) {
            alert(event.target.getPlayerState());
            }
        });
    </script> 

<?php get_footer(); ?>