<?php
/**
 * Блок "Готовые интерьерные решения"
 * 
 */
?>

<?php if( have_rows('new_solution_item', 'options') ): ?>
    <section class="solutions">
        <div class="container ">
            <h2 class="calc__heading solutions__heading">
                <?php the_field('solutions-head', 'options'); ?>                
            </h2>

            <ul class="solutions__list solutions-list row">

                <?php if( have_rows('new_solution_item', 'options') ): ?>
                <?php while( have_rows('new_solution_item', 'options') ): the_row();
                    $solutionItemName = get_sub_field('solution_item', 'options');
                    $solutionItemPath = get_sub_field('solution_path', 'options');                               
                ?>

                <li class="prices-list__item solutions-list__item col-auto">
                    <a href="#" class="prices-list__link solutions-list__link" data-path5="<?= $solutionItemPath; ?>"><?= $solutionItemName; ?></a>
                </li>
                
                <?php endwhile; ?>
                <?php endif; ?>

                <li class="prices-list__item solutions-list__item col-auto">
                    <button class="solution-list__btn">
                        <span class="solutions-list__span">
                            Показать ещё
                        </span>                        
                    </button>
                </li>
            </ul>

            <?php if( have_rows('new_solution_article', 'options') ): ?>
            <?php while( have_rows('new_solution_article', 'options') ): the_row();                              
                $solItemTarget = get_sub_field('solution_target', 'options');
            ?>

            <article class="solutions__art" data-target5="<?= $solItemTarget; ?>">
                <h2 class="visually-hidden">Готовые решения</h2>

                <ul class="solutions__gallery solutions-gallery row align-items-stretch">

                <?php if( have_rows('new_solution_gal_item', 'options') ): ?>
                <?php while( have_rows('new_solution_gal_item', 'options') ): the_row();
                    $solGalImage = get_sub_field('solution_gal_image', 'options');               
                    $solGalHead = get_sub_field('solution_gal_head', 'options');
                    $solGalNewPrice = get_sub_field('solution_gal_new_price', 'options');
                    $solGalOldPrice = get_sub_field('solution_gal_old_price', 'options');
                    $solGalBtnId = get_sub_field('solution_gal_btn_id', 'options');
                    $solGalArtId = get_sub_field('solution_article_id', 'options');
                    $solGalArtDescr = get_sub_field('solution_article_descr', 'options');
                ?>

                    <li class="solutions-gallery__item col-xxl-3 col-lg-4 col-md-6 col-12">
                        <div class="solutions-gallery__top">
                            <figure class="solutions-gallery__image">
                                <img class="solutions-gallery__img" src="<?php echo esc_url($solGalImage['url']); ?>" alt="<?php echo esc_attr($solGalImage['alt']); ?>">
                            </figure>

                            <div class="solutions-gallery__box box-solutions">
                                <h4 class="box-solutions__heading">
                                    <?= $solGalHead; ?>
                                </h4>

                                <ul class="box-solutions__params card-params">

                                <?php if( have_rows('new_solution_params', 'options') ): ?>
                                <?php while( have_rows('new_solution_params', 'options') ): the_row();
                                    $solParam = get_sub_field('solution_param', 'options');               
                                    $solKey = get_sub_field('solution_key', 'options');
                                ?>

                                    <li class="card-params__item row justify-content-between">
                                        <p class="card-params__text col-auto"><?= $solParam; ?></p>
                                        <span class="card-params__dotted col"></span>
                                        <p class="card-params__digit col-auto"><?= $solKey; ?></p>
                                    </li>

                                    <?php endwhile; ?>
                                    <?php endif; ?>
                                </ul>

                                <div class="box-solutions__price pricing row align-items-end">
                                    <p class="pricing__name col-auto">цена</p>
                                    <p class="pricing__price col-auto"><?= $solGalNewPrice; ?></p>
                                    <p class="pricing__old col-auto"><del><?= $solGalOldPrice; ?></del></p>
                                </div>
                            </div>
                        </div>

                        <span class="solutions-gallery__button">
                            <button class="solutions-gallery__btn" data-btn="<?= $solGalBtnId; ?>">Подробнее</button>
                        </span> 
                        
                        <article class="solutions-gallery__article one-sol-more" data-targetSol="<?= $solGalBtnId; ?>">  
                            <button class="one-sol-more__close" aria-label="Закрыть"></button>  

                            <h2 class="about__heading one-sol-more__heading">
                                <?= $solGalHead; ?>
                            </h2>

                            <div class="one-sol-more__cont row">
                                <figure class="one-sol-more__image col-5">
                                    <img class="solutions-gallery__img" src="<?php echo esc_url($solGalImage['url']); ?>" alt="<?php echo esc_attr($solGalImage['alt']); ?>">
                                </figure>

                                <div class="one-sol-more__block col-md-6 col-12">
                                    <p class="one-sol-more__descr js-scroll">
                                        <?= $solGalArtDescr; ?>
                                    </p>

                                    <button class="prices-article__btn one-sol-more__btn js-solOpen" data-btn2="<?= $solGalBtnId; ?>">заказать</button>
                                </div>
                            </div>
                            
                            <!-- Попап Заказать соответствующее готовое решение -->
                            <div class="popup js-solPopup" >
                                <div class="popup__contain">
                                    <button class="popup__close js-solClose">
                                        <svg class="popup__img">
                                            <use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icons/sprite.svg#close"></use>                                                   
                                        </svg>
                                    </button>

                                    <h3 class="popup__heading">
                                        Заказать <?= $solGalHead; ?>
                                    </h3>                                    

                                    <div id="solutionForm" class="popup__form">
                                        <?php echo do_shortcode('[contact-form-7 id="937" title="Заказать готовое решение"]'); ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </li>

                    
                    
                <?php endwhile; ?>
                <?php endif; ?>
                </ul>
            </article>

            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

<?php else: ?>
    <section class="none"></section>
<?php endif; ?>

<?php ?>

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

        // Открытие попапа 
        var solField = document.querySelectorAll('.js-solPopup');
        var solFieldOpen = document.querySelectorAll('.js-solOpen'); 
        var solClose = document.querySelectorAll('.js-solClose'); 
        var flag = false;  

        solFieldOpen.forEach(function(solOpen){
            solOpen.addEventListener('click', function(){
                
                solField.forEach(function(solPopupEvery) {
                    if(!flag) {
                    fadeIn(solPopupEvery, 300, 'flex');
                            
                    document.querySelector('body').classList.add('closed');

                    } else {
                    fadeOut(solPopupEvery, 300);
                    
                    document.querySelector('body').classList.remove('closed');
                    }
                    
                    solClose.forEach(function(everyClose){
                        everyClose.addEventListener('click', function(){
                        fadeOut(solPopupEvery, 300);

                        document.querySelector('body').classList.remove('closed'); 
                        });   
                    });

                    solPopupEvery.addEventListener('click', function(event){
                        if(this == event.target) {
                            fadeOut(solPopupEvery, 300);

                            document.querySelector('body').classList.remove('closed');
                       
                        }
                    });                   


                    // Присвоим форме ID
                    var solutionForm = document.querySelectorAll('#solutionForm form');
                    solutionForm.forEach(function(eachForm){
                        eachForm.setAttribute('id','solForm');

                        // Всплытие окна Спасибо после отправки формы заказать замерщика
                        eachForm.addEventListener( 'wpcf7mailsent', function( event ) {

                        document.querySelector('.popup-thanks').classList.add('thanks-active'); 
                                
                        fadeOut(solPopupEvery, 300);    
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
</script>