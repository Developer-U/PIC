<?php
/*
Template Name: Цены
*/
get_header();
?>

    <main class="main container-fluid2  row">
    
        <?php get_sidebar(); ?>

        <div class="main-content col">
            <section class="reviews-page">
                <?php estore_add_breadcrumbs( );?>

                <div class="container-fluid2 about__contain border-bottom-none blog__contain row justify-content-between align-items-stretch">
                    <div class="reviews-page__main job">
                        <h1 class="pages-heading prices__heading">
                            <?php the_title(); ?>
                        </h1>
                        
                        <div class="container prices">
                            <ul class="prices__list list-rew row">

                            <?php if( have_rows('add_product', 'options') ): ?>
                            <?php while( have_rows('add_product', 'options') ): the_row(); 
                            $productId = get_sub_field('product_id', 'options');
                            $productName = get_sub_field('product_name', 'options');
                            ?>

                                <li class="list-rew__item list-rew__item_prices col-auto">
                                    <a href="#" class="list-rew__link js-pricesLink" data-pathprice="<?= $productId; ?>">
                                        <?= $productName; ?>
                                    </a>
                                </li>
        
                            <?php endwhile; ?>
                            <?php endif; ?>
                            </ul>

                            <?php if( have_rows('add_product_table', 'options') ): ?>
                            <?php while( have_rows('add_product_table', 'options') ): the_row(); 
                            $tableProdId = get_sub_field('product_table_id', 'options');                            
                            ?>
        
                                <article class="prices__boxes js-scroll js-tablePrices" data-targetprice="<?= $tableProdId; ?>">
                                    <h2 class="visually-hidden">Таблица цен</h2>

                                    <table class="prices__table prices-table">
                                        <tr class="prices-table__row">
                                            <td class="prices-table__cell prices-table__cell_first prices-table__cell_bold">
                                                Материал
                                            </td>
                
                                            <td class="prices-table__cell prices-table__cell_second prices-table__cell_bold">
                                                Страна
                                            </td>
                
                                            <td class="prices-table__cell prices-table__cell_third prices-table__cell_bold">
                                                Толщина, мм
                                            </td>
                
                                            <td class="prices-table__cell prices-table__cell_fourth prices-table__cell_bold">
                                                Гарантия
                                            </td>
                
                                            <td class="prices-table__cell prices-table__cell_fifth prices-table__cell_bold">
                                                Цена с установкой, ₽/м2
                                            </td>
                                        </tr>

                                        <?php if( have_rows('add_product_table_row', 'options') ): ?>
                                        <?php while( have_rows('add_product_table_row', 'options') ): the_row(); 
                                        $prodMater = get_sub_field('product_material', 'options');
                                        $prodCountry = get_sub_field('product_country', 'options');
                                        $prodThick = get_sub_field('product_thick', 'options');
                                        $prodVar = get_sub_field('product_varranty', 'options');
                                        $prodPrice = get_sub_field('product_price', 'options');
                                        $prodOldPrice = get_sub_field('product_old_price', 'options');
                                        ?>
                        
                                        <tr class="prices-table__row">
                                            <td class="prices-table__cell prices-table__cell_first">
                                                <?= $prodMater; ?>
                                            </td>
                
                                            <td class="prices-table__cell prices-table__cell_second">
                                                <?= $prodCountry; ?>
                                            </td>
                
                                            <td class="prices-table__cell prices-table__cell_third">
                                                <?= $prodThick ?>
                                            </td>
                
                                            <td class="prices-table__cell prices-table__cell_fourth">
                                                <?= $prodVar ?>
                                            </td>
                
                                            <td class="prices-table__cell prices-table__cell_fifth">
                                                <span class="prices-table__price row align-items-center">
                                                    <p class="prices-table__new col-auto"><?= $prodPrice; ?></p>
                                                    <p class="prices-table__old col"><del><?= $prodOldPrice; ?></del></p>
                                                </span>
                                            </td>
                                        </tr>
                
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                    </table>
                                </article>

                            <?php endwhile; ?>
                            <?php endif; ?>                            
                        </div>
                    </div>
                </div>
            </section>

            <?php get_template_part('template-parts/calc'); ?> 

            <?php get_template_part('template-parts/options'); ?> 

            <section class="about">
                <div class="container-fluid2  about__contain">
                    <h2 class="about__heading">
                        <?php the_field('block-prices-main-head'); ?>
                    </h2>

                    <div class="container about__box left-pad-zero row justify-content-between">
                        <p class="about__text col-lg-6 col-12">
                            <?php the_field('block-prices-main-left'); ?>
                        </p>

                        <p class="about__text col-lg-6 col-12">
                            <?php the_field('block-prices-main-right'); ?>                    
                        </p>
                    </div>
                </div>
            </section>

            <?php get_template_part('template-parts/block', 'faq'); ?>
    
            <?php get_template_part('template-parts/block', 'cta'); ?>
        </div>
    </main>

<script>
    window.addEventListener('DOMContentLoaded', function(){
        const firstPrLink = document.querySelector('.list-rew__item:first-of-type .js-pricesLink');
                firstPrLink.classList.add('link-active');

            // Проитерируем кнопки выбора табов
        document.querySelectorAll('.js-pricesLink').forEach(function(btnPrice){
            btnPrice.addEventListener('click', function(event){
                event.preventDefault();
                
                const pathprice = event.currentTarget.dataset.pathprice;

                
                               
                document.querySelectorAll('.list-rew__item .js-pricesLink').forEach(function(oneTabPr){
                    oneTabPr.classList.remove('link-active');
                    firstPrLink.classList.remove('link-active');
                });

                document.querySelector(`[data-pathprice='${pathprice}']`).classList.add('link-active');      
                    

                // Итерируем табы и закрываем все открытые табы
                document.querySelectorAll('.js-tablePrices').forEach(function(tablePrice){
                    tablePrice.classList.remove('price-table-active');
                            
                    var firsttablePrice = document.querySelector('.js-tablePrices:first-of-type');                    
                
                    firsttablePrice.style.display = 'none';
                
                    var currenttablePrice = document.querySelector(`[data-targetprice="${pathprice}"]`);                    
                    
                    if(currenttablePrice.getAttribute('data-targetprice') == firsttablePrice.getAttribute('data-targetprice')) {
                        firsttablePrice.style.display = 'block';
                    } else {
                        firsttablePrice.style.display = 'none';
            
                        currenttablePrice.classList.add('price-table-active');
                    }

                });
            });
        });
    });
</script>
<?php
get_footer(); ?>