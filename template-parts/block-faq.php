<?php
/**
 * Блок "Ответы на часто задаваемые вопросы"
 * 
 */
?>

<?php if( have_rows('new_block-faq_item', 'options') ): ?>

    <section class="faq">
        <div class="container ">
            <h2 class="faq__heading">
                <?php the_field('block-faq-head', 'options'); ?>
            </h2>

            <div class="faq__accords row">
                <div id="accordion" class="faq__full row justify-content-between">

                <?php if( have_rows('new_block-faq_item', 'options') ): ?>
                <?php while( have_rows('new_block-faq_item', 'options') ): the_row();
                    $blockFaqName = get_sub_field('block-faq_name', 'options');
                    $blockFaqDescr = get_sub_field('block-faq_descr', 'options');                               
                ?>

                    <!-- Section of accordion -->
                    <div class="accordion-item">
                        <div class="accordion-header faq__subheading"><?= $blockFaqName; ?></div>
                        
                        <div>
                            <?= $blockFaqDescr; ?>
                        </div>
                    </div>   
                      
    
                <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </div>            
        </div>
    </section>

<?php else: ?>
    <section class="none"></section>
<?php endif; ?>

<?php ?>