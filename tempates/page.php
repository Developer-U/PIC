<?php
/*
* Template Name: тестовая страница
*/
get_header(); ?>

<section class="calc">
    <div class="container">
        <div class="calc__contain">
            <h2 class="calc__heading">
                <?php the_field('calc-head', 'options'); ?>
            </h2>

            <form class="calc__form" action="#" method = "POST">
                <label class="calc__name" for="range">
                    Площадь
                    <input id="range" type="text" class="js-range-slider" name="my_range" value="" />
                    <span class="calc__total">60</span>
                </label>

                <div class="calc__radio row justify-content-between">
                    <div class="calc__checks">
                        <h3 class="calc__subheading">
                            Материал
                        </h3>

                        <div class="calc__boxes calc-items row">
                            <fieldset class="calc-items__box1">
                                <h4 class="calc-items__heading">ПВХ</h4>

                                <input id="radio-1"  type="radio" name="first" value="100" checked class="price">
                                <label for="radio-1">MSD Premium (белый)</label>

                                <input id="radio-2" type="radio" name="first" value="120" class="price">
                                <label for="radio-2">MSD Premium (цветной)</label>

                                <input id="radio-3" type="radio" name="first" value="130" class="price">
                                <label for="radio-3">Pongs (белый)</label>

                                <input id="radio-4"  type="radio" name="first" value="140" class="price">
                                <label for="radio-4">Pongs (цветной)</label>

                                <input id="radio-5" type="radio" name="first" value="150" class="price">
                                <label for="radio-5">Фотопечать</label>
                            </fieldset>

                            <fieldset class="calc-items__box2">
                                <h4 class="calc-items__heading">Ткань</h4>

                                <input id="radio-6" type="radio" name="first" value="190" class="price">
                                <label for="radio-6">Descor</label>

                                <input id="radio-7" type="radio" name="first" value="200" class="price">
                                <label for="radio-7">Фотопечать</label>
                            </fieldset>

                            <fieldset class="calc-items__box3">
                                <h4 class="calc-items__heading">Сатиновые</h4>

                                <input id="radio-8" type="radio" name="first" value="260" class="price">
                                <label for="radio-8">MSD Premium (белый)</label>

                                <input id="radio-9"  type="radio" name="first" value="210" class="price">
                                <label for="radio-9">MSD Premium (цветной)</label>

                                <input id="radio-10" type="radio" name="first" value="180" class="price">
                                <label for="radio-10">Pongs (белый)</label>

                                <input id="radio-11"type="radio" name="first" value="190" class="price">
                                <label for="radio-11">Pongs (цветной)</label>
                            </fieldset>

                            <fieldset class="calc-items__box4">
                                <h4 class="calc-items__heading">С подсветкой</h4>

                                <input id="radio-12" type="radio" name="fourth" value="0" class="pod" date-name="Не нужна" data-num="one">
                                <label for="radio-12">Не нужна</label>

                                <input id="radio-13" type="radio" name="fourth" value="1000" class="pod" date-name="Парящие" data-num="two" checked>
                                <label for="radio-13">Парящие</label>

                                <input id="radio-14" type="radio" name="fourth"class="pod" value="1200" date-name="С подсветкой через полотно" data-num="three">
                                <label for="radio-14">С подсветкой через полотно</label>

                                <input id="radio-15" type="radio" name="fourth" class="pod" value="1500" date-name="Световые линии" data-num="four">
                                <label for="radio-15">Световые линии</label>

                                <input id="radio-16"  type="radio" name="fourth" class="pod" value="2000" date-name="Контурные потолки" data-num="five">
                                <label for="radio-16">Контурные потолки</label>
                            </fieldset>
                        </div>
                    </div>

                    <div class="calc__params">
                        <label for="corners" class="calc__label calc__label_first">
                            Количество углов:
                            <input id="corners" type="number" title="Qty" min="0" max="100" step="1" value="7">
                            <button class="calc__btn minus js-minus1" type="button" >-</button>
                            <button class="calc__btn plus js-plus1" type="button" >+</button>
                        </label>

                        <label for="pipes" class="calc__label calc__label_second">
                            Трубы:
                            <input id="pipes" type="number" title="Pipes" min="0" max="100" step="1" value="2">
                            <button class="calc__btn minus js-minus2" type="button" >-</button>
                            <button class="calc__btn plus js-plus2" type="button" >+</button>
                        </label>

                        <label for="light" class="calc__label calc__label_third">
                            Светильники:
                            <input id="light" type="number" title="light" min="0" max="100" step="1" value="10">
                            <button class="calc__btn minus js-minus3" type="button" >-</button>
                            <button class="calc__btn plus js-plus3" type="button" >+</button>
                        </label>

                        <label for="bra" class="calc__label calc__label_fourth">
                            Люстры:
                            <input id="bra" type="number" title="bra" min="0" max="100" step="1" value="1">
                            <button class="calc__btn minus js-minus4" type="button" >-</button>
                            <button class="calc__btn plus js-plus4" type="button" >+</button>
                        </label>
                    </div>
                </div>

                <div class="calc__result calc-result row justify-content-between align-items-stretch">
                    <div class="calc-result__left">
                        <div class="calc-result__levels row justify-content-between align-items-center">
                            <p class="calc-result__item">
                                Ориентировочная стоимость вашего потолка, без учёта скидок
                            </p>

                            <p class="calc-result__price" id="total"> 3400 ₽/м2</p>
                        </div>

                        <div class="calc-result__levels row justify-content-between align-items-center">
                            <p id="pod_name" class="calc-result__item">
                                Подсветка (парящие)
                            </p>

                            <p class="calc-result__price" id="pod_title">1000 ₽/п.м.</p>
                        </div>
                    </div>

                    <button class="calc-result__btn" >
                        заказать
                    </button>
                </div>

                <p class="calc__descr">
                    Минимальная стоимость заказа — 9&nbsp;000&nbsp;руб
                </p>
            </form>
        </div>
    </div>
</section>


<?php get_footer(); ?>
