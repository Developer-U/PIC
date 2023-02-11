<?php
/**
 * Блок "Цена на потолки" Pricing.php
 * 
 */
?>

    <section class="prices">
        <div class="container-fluid2  about__contain about__contain_prices prices__contain">
            <div class="prices__box row align-items-end justify-content-between">
                <h2 class="prices__heading prices__heading_null">
                    <?php the_field('pricing-head', 'options'); ?>                
                </h2>                

                <ul class="prices__list prices-list prices__list_null row">

                    <?php if( have_rows('new_pricing_item', 'options') ): ?>
                    <?php while( have_rows('new_pricing_item', 'options') ): the_row();
                        $priceItemName = get_sub_field('pricing_item', 'options');
                        $riceItemPath = get_sub_field('pricing_path', 'options');                               
                    ?>

                    <li class="prices-list__item col-auto">
                        <a href="#" class="prices-list__link" data-path="<?= $riceItemPath; ?>"><?= $priceItemName; ?></a>
                    </li>                  

                    <?php endwhile; ?>
                    <?php endif; ?>
                </ul>                
            </div>

            <?php if( have_rows('new_pricing_article', 'options') ): ?>
            <?php while( have_rows('new_pricing_article', 'options') ): the_row();
                $priceArtHead = get_sub_field('pricing_article_head', 'options');
                $priceArtDescr = get_sub_field('pricing_article_descr', 'options');
                $riceItemTarget = get_sub_field('pricing_target', 'options');
                $priceBtn = get_sub_field('pricing_btn', 'options');
                $pricePopup = get_sub_field('pricing_popup', 'options');                
                $priceNew = get_sub_field('pricing_new_price', 'options');
                $priceOld = get_sub_field('pricing_old_price', 'options');
                $priceImg1 = get_sub_field('pricing_img1', 'options');
                $priceImg2 = get_sub_field('pricing_img2', 'options');
                $priceImg3 = get_sub_field('pricing_img3', 'options');  
            ?>

            <article class="prices__article prices-article row justify-content-between" data-target="<?= $riceItemTarget; ?>">
                <div class="prices-article__left row justify-content-between">
                    <div class="prices-article__texts">
                        <h3 class="prices-article__heading">
                            <?= $priceArtHead; ?>
                        </h3>
    
                        <p class="prices-article__descr">
                            <?= $priceArtDescr; ?>
                        </p>
                    </div>

                    <div class="prices-article__price">
                        <p class="prices-article__name">Цена с&nbsp;установкой</p>
                        <p class="prices-article__digit"><?= $priceNew; ?></p>
                        <p class="prices-article__old"><del><?= $priceOld; ?></del></p>
    
                        <button class="prices-article__btn js-needOpen" data-btn="<?= $priceBtn; ?>">заказать</button>
                    </div>

                    <div class="prices-article__images row justify-content-end">
                        <figure class="prices-article__image">
                            <img class="prices-article__imgs" src="<?php echo esc_url($priceImg1['url']); ?>" alt="<?php echo esc_attr($priceImg1['alt']); ?>">
                        </figure>
                        
                        <figure class="prices-article__image">
                            <img class="prices-article__imgs" src="<?php echo esc_url($priceImg2['url']); ?>" alt="<?php echo esc_attr($priceImg2['alt']); ?>">
                        </figure>                        
                    </div>
                </div>

                <div class="prices-article__right">
                    <figure class="prices-article__big">
                        <img class="prices-article__img" src="<?php echo esc_url($priceImg3['url']); ?>" alt="<?php echo esc_attr($priceImg3['alt']); ?>">
                    </figure>

                    <!-- Slider for mobile version -->
                    <div class="prices-article__slider prices-slider swiper swiper-container">                        
                        <div class="swiper-wrapper">                      
                            <div class="swiper-slide prices-slider__slide">
                                <img class="prices-slider__img" src="<?php echo esc_url($priceImg1['url']); ?>" alt="<?php echo esc_attr($priceImg1['alt']); ?>">                                
                            </div>

                            <div class="swiper-slide prices-slider__slide">
                                <img class="prices-slider__imgs" src="<?php echo esc_url($priceImg2['url']); ?>" alt="<?php echo esc_attr($priceImg2['alt']); ?>">                                
                            </div>
                                
                            <div class="swiper-slide prices-slider__slide">
                                <img class="prices-slider__imgs" src="<?php echo esc_url($priceImg3['url']); ?>" alt="<?php echo esc_attr($priceImg3['alt']); ?>">                                
                            </div>
                        </div>
                        
                        <div class="swiper-pagination"></div>                    
                    </div>
                </div>

                <!-- Попап Заказать соответствующий потолок -->
                <div class="popup js-needPopup" >
                    <div class="popup__contain">
                        <button class="popup__close js-needClose">
                            <svg class="popup__img">
                                <use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icons/sprite.svg#close"></use>                                                   
                            </svg>
                        </button>

                        <h3 class="popup__heading">
                            Заказать <?= $priceArtHead ?>
                        </h3>

                        <h4 class="popup__subheading">
                            Заполните форму и мы&nbsp;свяжемся с&nbsp;Вами
                        </h4>

                        <div class="popup__form">
                            <?php echo do_shortcode('[contact-form-7 id="322" title="Попап заказать нужный потолок"]'); ?>
                        </div>
                    </div>
                </div>
            </article>

            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

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

        // Проитерируем кнопки выбора табов
        document.querySelectorAll('.prices-list__link').forEach(function(tabsBtn){
            tabsBtn.addEventListener('click', function(event){
            event.preventDefault();       

            // Зададим константу атрибута data-path у кнопок
            const path = event.currentTarget.dataset.path;

            // Проитерируем все ссылки и при клике снимем все активные значения
            document.querySelectorAll('.prices-list__link').forEach(function(oneTab){
                oneTab.classList.remove('link-active');
            });

            // Соответствующей кнопке зададим активное значение
            document.querySelector(`[data-path='${path}']`).classList.add('link-active');      
                

            // Итерируем табы и закрываем все открытые табы
            document.querySelectorAll('.prices-article').forEach(function(tabContent){
                tabContent.classList.remove('prices-article-active');

                // Зададим в переменную первый Таб (в стилях делаем первый элемент открытым)        
                var firstPriceTab = document.querySelector('.prices-article:first-of-type');

                // Соответственно при клике на любую кнопку его сразу закрываем
                firstPriceTab.style.display = 'none';

                // Закинем в переменную текущий Таб с соответствующим атрибутом data-target       
                var currentTab = document.querySelector(`[data-target="${path}"]`);

                // console.log(currentTab.getAttribute('data-target') );

                // console.log(firstPriceTab.getAttribute('data-target') );

                // Зададим условие: если атрибут data-target текущего таба соответствует первому Табу, то есть
                // если это и есть первый Таб, открываем его, если нет - держим закрытым и открываем соответствующий
                if(currentTab.getAttribute('data-target') == firstPriceTab.getAttribute('data-target')) {
                firstPriceTab.style.display = 'flex';
                } else {
                firstPriceTab.style.display = 'none';
        
                currentTab.classList.add('prices-article-active');
                }


                // После клика на кнопку Заказать и определения текущего таба переопределяем атрибут текущего таба       
                
                var articleAttr = currentTab.getAttribute('data-target');  // Получаем атрибут data-target открытого таба
            });     

            
            });

            // Табы в блоке выбора потолков на главной странице в блоке Потолки цена

        // Сначала зададим все переменные для начального значения

        var needField = document.querySelectorAll('.js-needPopup'); // сам попап 
        var needFieldOpen = document.querySelectorAll('.js-needOpen'); // Кнопки открытия попапов
        var needClose = document.querySelectorAll('.js-needClose'); // Кнопки закрытия попапов 
        var firstPriceTab = document.querySelector('.prices-article:first-of-type');       
        var flag = false;


        // Присвоим начальное значение атрибута data-target у текущего таба при загрузке страницы  
        var articleAttr = firstPriceTab.getAttribute('data-target');  // Получаем атрибут data-target открытого таба

        // Далее итерируем табы, попапы и кнопки и ставим им атрибуты равные полученному data-target

        needFieldOpen.forEach(function(eachNeedBtn){  // начинаем с функции итерации всех кнопок         
            eachNeedBtn.setAttribute('data-btn', articleAttr); // присвоим текущей кнопке атрибут равный атрибуту таба  
                    

            eachNeedBtn.addEventListener('click', function(e){  // Далее функция открытия попапа - всё далее в ней  
            e.preventDefault(); 
        
            needField.forEach(function(eachPopup) {  // Итерируем каждый попап
                eachPopup.setAttribute('data-popup', articleAttr); // Присвоим попапу атрибут равный атрибуту таба                

                if(!flag) {
                fadeIn(eachPopup, 300, 'flex');
                        
                document.querySelector('body').classList.add('closed');
            
                } else {
                fadeOut(eachPopup, 300);
                
                document.querySelector('body').classList.remove('closed');
                }

                needClose.forEach(function(eachOff) {  // Итерируем каждый попап
                eachOff.setAttribute('data-off', articleAttr); // Присвоим попапу атрибут равный атрибуту таба
                
                eachOff.addEventListener('click', function(){
                    fadeOut(eachPopup, 300);
                    
                    document.querySelector('body').classList.remove('closed');
                });
                
                // Всплытие окна Спасибо после отправки формы
                document.querySelector('#wpcf7-f322-o2').addEventListener( 'wpcf7mailsent', function( event ) {
                
                document.querySelector('.popup-thanks').classList.add('thanks-active'); 
                        
                fadeOut(eachPopup, 300);            
                document.querySelector('body').classList.remove('closed');
                
                setTimeout(() => {
                    document.querySelector('.popup-thanks').classList.remove('thanks-active'); 
                }, 2500 );  

                }, false );
                
            }); 
            });

            
            
        }); 
        }); 

        });
    });
    </script>
<?php ?>