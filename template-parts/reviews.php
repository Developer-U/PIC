<?php
/**
 * Блок "Отзывы"
 * 
 */
?>

<?php if( get_field('reviews-head', 'options') ):
    $revHead = get_field('reviews-head', 'options');
    $rev1Date= get_field('reviews1-date', 'options');
    $rev2Date= get_field('reviews2-date', 'options');
    $rev3Date= get_field('reviews3-date', 'options');
    $rev1Head= get_field('reviews1-head', 'options');
    $rev2Head= get_field('reviews2-head', 'options');
    $rev3Head= get_field('reviews3-head', 'options');
    $rev1Image= get_field('reviews1-img', 'options');
    $rev2Image= get_field('reviews2-img', 'options');
    $rev3Image= get_field('reviews3-img', 'options');
    
    ?>
    

    <section class="reviews">
        <div class="container-fluid2  about__contain reviews__contain">
            <h2 class="calc__heading reviews__heading">
                <?= $revHead; ?>                
            </h2>

            <div class="reviews__list reviews-list__main reviews-list container row justify-content-between">
                <div class="reviews-list__left col-md-5 col-12">
                    <article class="reviews-list__review">
                        <date class="reviews-list__date"><?= $rev1Date; ?> </date>

                        <h3 class="reviews-list__heading">
                            <?= $rev1Head; ?> 
                        </h3>

                        <div class="reviews-list__video">
                            <img src="<?php echo esc_url($rev1Image['url']); ?>" alt="<?php echo esc_attr($rev1Image['alt']); ?>" class="reviews-list__img">
                            
                            <svg class="reviews-list__icon">
                                <use xlink:href="images/icons/sprite.svg#video"></use>                                                   
                            </svg>
                        </div>                        
                    </article>

                    <article class="reviews-list__review reviews-list__review_two">
                        <date class="reviews-list__date"><?= $rev2Date; ?></date>

                        <h3 class="reviews-list__heading">
                            <?= $rev2Head; ?>
                        </h3>

                        <div class="reviews-list__video reviews-list__video_two">
                            <img src="<?php echo esc_url($rev2Image['url']); ?>" alt="<?php echo esc_attr($rev2Image['alt']); ?>" class="reviews-list__img">
                            
                            <svg class="reviews-list__icon">
                                <use xlink:href="images/icons/sprite.svg#video"></use>                                                   
                            </svg>
                        </div>                        
                    </article>
                </div>

                <div class="reviews-list__right col-md-7 col-12">
                    <article class="reviews-list__wide">
                        <div class="reviews-list__video reviews-list__video_wide">
                            <img src="<?php echo esc_url($rev3Image['url']); ?>" alt="<?php echo esc_attr($rev3Image['alt']); ?>" class="reviews-list__img">
                            
                            <svg class="reviews-list__icon">
                                <use xlink:href="images/icons/sprite.svg#video"></use>                                                   
                            </svg>
                        </div>
                        
                        <date class="reviews-list__date"><?= $rev3Date; ?></date>

                        <h3 class="reviews-list__heading reviews-list__heading_wide">
                            <?= $rev3Head; ?>
                        </h3>                                                
                    </article>

                    <a href="/reviews" class="reviews-list__btn">все отзывы</a>
                </div>
            </div>
        </div>
    </section>

<?php else: ?>
    <section class="none"></section>
<?php endif; ?>
<?php ?>