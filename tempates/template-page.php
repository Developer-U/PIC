<?php
/*
Template Name: Стандартная страница
*/
get_header();
?>

<main class="main container-fluid2  row">
   
    <?php get_sidebar(); ?>

    <div class="main-content col ">
        <div class="container post">
            <?php estore_add_breadcrumbs();?>

            <h1 class="pages-heading">
                <?php the_title();?>
            </h1>

            <?php the_content(); ?>
        </div>
        
    </div>
</main>

<?php

get_footer(); ?>