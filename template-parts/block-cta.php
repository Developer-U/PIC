<?php
/**
 * Блок "У вас остались вопросы?"
 * 
 */
?>

    <section class="cta">
        <div class="container  cta__contain">
            <div class="cta__box cta-box row justify-content-between">
                <div class="cta-box__img"></div>

                <div class="cta-box__text">
                    <h2 class="cta-box__heading">
                        <?php the_field('block-cta-head', 'options'); ?>
                    </h2>

                    <p class="cta-box__descr">
                        <?php the_field('block-cta-descr', 'options'); ?>
                    </p>
                </div>

                <div class="cta-box__cta row justify-content-between align-items-end">
                    <!-- <form class="cta-box__form col-xxl-6 col-12" action="#" method = "POST">
                        <input type="tel" class="hero-cta__input" placeholder="+ 7 ( _ _ _ )  _ _ _   _ _   _ _">
    
                        <button class="hero-cta__button cta-box__btn" type="submit">оставить заявку</button> 
                    </form>

                    <p class="cta-box__agree col-xxl-6 col-12">
                        Нажимая «Оставить завку», я соглашаюсь c&nbsp;обработкой персональных данных на 
                        условиях Политики конфиденциальности.
                    </p> -->
                    <?php echo do_shortcode('[contact-form-7 id="196" title="Форма в блоке CTA"]'); ?>
                </div>
            </div>
        </div>
    </section>

<?php ?>