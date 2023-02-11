<?php
/**
 * Блок "Презентация готовых объектов"
 * 
 */
?>

<?php if( get_field('presentation-head', 'options') ):
    $presHead = get_field('presentation-head', 'options');
    $pres1Date= get_field('presentation1-date', 'options');
    $pres2Date= get_field('presentation2-date', 'options');
    $pres3Date= get_field('presentation3-date', 'options');
    $pres1Head= get_field('presentation1-head', 'options');
    $pres2Head= get_field('presentation2-head', 'options');
    $pres3Head= get_field('presentation3-head', 'options');
    $pres1Image= get_field('presentation1-img', 'options');
    $pres2Image= get_field('presentation2-img', 'options');
    $pres3Image= get_field('presentation3-img', 'options');
    
    ?>

    <section class="reviews">
        <div class="container-fluid2  about__contain reviews__contain">
            <h2 class="calc__heading reviews__heading">
                <?= $presHead; ?>
            </h2>

            <div class="reviews__list reviews-list reviews-list__main container row justify-content-between">
                <div class="reviews-list__left col-md-7 col-12">
                    <article class="reviews-list__wide">
                        <div class="reviews-list__video reviews-list__video_wide">
                            <img src="<?php echo esc_url($pres1Image['url']); ?>" alt="<?php echo esc_attr($pres1Image['alt']); ?>" class="reviews-list__img">
                            
                            <svg class="reviews-list__icon">
                                <use xlink:href="images/icons/sprite.svg#video"></use>                                                   
                            </svg>
                        </div>
                        
                        <date class="reviews-list__date"><?= $pres1Date; ?></date>

                        <h3 class="reviews-list__heading reviews-list__heading_wide">
                            <?= $pres1Head; ?>
                        </h3>                                                
                    </article>
                </div>

                <div class="reviews-list__right col-md-5 col-12">
                    <article class="reviews-list__review">
                        <date class="reviews-list__date"><?= $pres2Date; ?></date>

                        <h3 class="reviews-list__heading">
                            <?= $pres2Head; ?>
                        </h3>

                        <div class="reviews-list__video">
                            <img src="<?php echo esc_url($pres2Image['url']); ?>" alt="<?php echo esc_attr($pres2Image['alt']); ?>" class="reviews-list__img">
                            
                            <svg class="reviews-list__icon">
                                <use xlink:href="images/icons/sprite.svg#video"></use>                                                   
                            </svg>
                        </div>                        
                    </article>

                    <article class="reviews-list__review reviews-list__review_two">
                        <date class="reviews-list__date"><?= $pres3Date; ?></date>

                        <h3 class="reviews-list__heading">
                            <?= $pres3Head; ?>
                        </h3>

                        <div class="reviews-list__video reviews-list__video_two">
                            <img src="<?php echo esc_url($pres3Image['url']); ?>" alt="<?php echo esc_attr($pres3Image['alt']); ?>" class="reviews-list__img">
                            
                            <svg class="reviews-list__icon">
                                <use xlink:href="images/icons/sprite.svg#video"></use>                                                   
                            </svg>
                        </div>                        
                    </article>
                </div>                
            </div>
        </div>
    </section>

<?php else: ?>
    <section class="none"></section>
<?php endif; ?>
<?php ?>