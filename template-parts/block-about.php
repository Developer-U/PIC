<?php
/**
 * Блок с текстом "Натяжные потолки в Санкт-Петербурге"
 * 
 */
?>

    <section class="about">
        <div class="container-fluid2  about__contain">
            <h2 class="about__heading">
                <?php the_field('block-about-head', 'options'); ?>
            </h2>

            <div class="container about__box left-pad-zero row justify-content-between">
                <p class="about__text col-lg-6 col-12">
                    <?php the_field('block-about-left', 'options'); ?>
                </p>

                <p class="about__text col-lg-6 col-12">
                    <?php the_field('block-about-right', 'options'); ?>                    
                </p>
            </div>
        </div>
    </section>

<?php ?>