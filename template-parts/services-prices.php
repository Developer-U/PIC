<?php
/**
 * Блок "Цены на услуги"
 * 
 */
?>

    <section class="repair__types types-repair">
        <div class="container-fluid2 about__contain row types-rapair__cont">
            <h2 class="types-repair__heading types-repair-left">
                <?php the_field('service-price-head', 'options'); ?>
            </h2>

            <h2 class="types-repair__heading col">
                <?php the_field('service-price-price-head', 'options'); ?>
            </h2>
        </div>

        <div class="container-fluid2 about__contain">
            <ul class="types-repair__list">

            <?php if(have_rows('add_service_price_item', 'options')): ?>
            <?php while(have_rows('add_service_price_item', 'options')): the_row();  
            $servicePrName = get_sub_field('service-price-name', 'options'); 
            $servicePrPrice = get_sub_field('service-price-price', 'options');?>

                <li class="types-repair__item row justify-content-between">
                    <p class="types-repair__text col-auto"><?= $servicePrName; ?></p>
                    <span class="card-params__dotted col"></span>
                    <p class="types-repair__digit col-auto"><?= $servicePrPrice; ?> ₽</p>
                </li>
                
            <?php endwhile; ?>
            <?php endif; ?>   
            </ul>
        </div>
    </section>

