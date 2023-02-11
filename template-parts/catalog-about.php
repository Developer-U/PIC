<?php
/**
 * Текстовый блок в 2 колонки на странице Каталога catalog.php 
 * 
 */
?>

    <section class="about post">
        <?php          
        $catAboutHead = get_field('catalog_about_head', 'options'); ?>
        
        <div class="container-fluid2  about__contain">
            <h2 class="about__heading">
                <?= $catAboutHead; ?>
            </h2>

            <div class="container about__box left-pad-zero row justify-content-between"> 
                <div class="about__text col-lg-6 col-12">
                    <?php the_field('block-about-catalog-left', 'options'); ?>
                </div>
                
                <div class="about__text col-lg-6 col-12">
                    <?php the_field('block-about-catalog-right', 'options'); ?>
                </div>                    
            </div>
        </div>
    </section>

    