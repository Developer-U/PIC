<?php
/**
 * Блок "Получите 5 бесплатных опций" 
 * 
 */
?>

    <section class="options">
        <div class="container  options__contain">
            <h2 class="options__heading">
                <?php the_field('options-head', 'options'); ?>                
            </h2>

            <ul class="options__box options-list row justify-content-between">
                <li class="options-list__item col-xl-4 col-6 row">
                    <p class="options-list__number options-list__number_one">1</p>

                    <div class="options-list__descr">
                        <h3 class="options-list__heading options-list__heading_heading1">
                            <?php the_field('options-one-name', 'options'); ?>                            
                        </h3>

                        <?php $imageOpt1 = get_field('options_img1', 'options');
                        if($imageOpt1): ?>
                        <div class="options-list__image" style="background-image: url(<?php echo esc_url($imageOpt1['url']); ?>);"></div>
                        <?php endif; ?>
                    </div>
                </li>

                <li class="options-list__item col-xl-4 col-6 row">
                    <p class="options-list__number options-list__number_two">2</p>

                    <div class="options-list__descr">
                        <h3 class="options-list__heading options-list__heading_heading2">
                            <?php the_field('options-two-name', 'options'); ?>
                        </h3>

                        <?php $imageOpt2 = get_field('options_img2', 'options');
                        if($imageOpt2): ?>
                        <div class="options-list__image" style="background-image: url(<?php echo esc_url($imageOpt2['url']); ?>);"></div>
                        <?php endif; ?>
                    </div>
                </li>

                <li class="options-list__item col-xl-4 col-6 row">
                    <p class="options-list__number options-list__number_three">3</p>

                    <div class="options-list__descr">
                        <h3 class="options-list__heading options-list__heading_heading3">
                            <?php the_field('options-three-name', 'options'); ?>                            
                        </h3>

                        <?php $imageOpt3 = get_field('options_img3', 'options');
                        if($imageOpt3): ?>
                        <div class="options-list__image" style="background-image: url(<?php echo esc_url($imageOpt3['url']); ?>);"></div>
                        <?php endif; ?>
                    </div>
                </li>

                <li class="options-list__item col-xl-4 col-6 row">
                    <p class="options-list__number options-list__number_four">4</p>

                    <div class="options-list__descr">
                        <h3 class="options-list__heading options-list__heading_heading4">
                            <?php the_field('options-four-name', 'options'); ?>                            
                        </h3>

                        <?php $imageOpt4 = get_field('options_img4', 'options');
                        if($imageOpt4): ?>
                        <div class="options-list__image" style="background-image: url(<?php echo esc_url($imageOpt4['url']); ?>);"></div>
                        <?php endif; ?>
                    </div>
                </li>

                <li class="options-list__item col-xl-4 col-6 row">
                    <p class="options-list__number options-list__number_five">5</p>

                    <div class="options-list__descr">
                        <h3 class="options-list__heading options-list__heading_heading5">
                            <?php the_field('options-five-name', 'options'); ?>
                        </h3>

                        <?php $imageOpt5 = get_field('options_img5', 'options');
                        if($imageOpt5): ?>
                        <div class="options-list__image" style="background-image: url(<?php echo esc_url($imageOpt5['url']); ?>);"></div>
                        <?php endif; ?>
                    </div>
                </li>

                <li class="options-list__item col-xl-4 col-6 row">
                    <div class="options-list__form">
                        <?php echo do_shortcode('[contact-form-7 id="319" title="Вызвать замерщика"]'); ?>
                    </div>
                </li>
            </ul>
        </div>
    </section>

<?php ?>