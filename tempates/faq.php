<?php
/*
Template Name: Вопрос-ответ
*/
get_header();
?>

    <main class="main container-fluid2  row">
    
        <?php get_sidebar(); ?>

        <div class="main-content col">
            <section class="faq-page">
                <?php estore_add_breadcrumbs( );?>

                <div class="container-fluid2 hero__cont row justify-content-between align-items-stretch">
                    <article class="about-page__main faq-page__main">
                        <h1 class="pages-heading">
                            <?php the_title(); ?>
                        </h1> 
                        
                        <div class="faq-page__accords">
                            <div id="accordion3" class="faq-page__accord">

                            <?php if( have_rows('add_faq_accordion_item') ): ?>
                            <?php while( have_rows('add_faq_accordion_item') ): the_row();
                            $faqAccHead = get_sub_field('faq_accordion_head');
                            $faqAccText = get_sub_field('faq_accordion_text');
                            ?>

                                <!-- Section -->
                                <h3 class="faq__subheading"><?= $faqAccHead; ?></h3>
                
                                <div>
                                    <?= $faqAccText; ?>
                                </div>
                
                            <?php endwhile; ?>
                            <?php endif; ?>
                            </div>
                        </div>
                    </article>
        
                    <div class="about-page__cta faq-cta">
                        <h3 class="faq-cta__heading">
                            Уважаемый посетитель
                        </h3>
        
                       <p class="faq-cta__text">
                            Если у&nbsp;Вас еще остались вопросы, можете задать их&nbsp;через форму 
                            обратной связи. Мы&nbsp;ответим на&nbsp;указанный e-mail.
                       </p>

                        <div class="faq-cta__form">
                            <?php echo do_shortcode('[contact-form-7 id="501" title="Форма задать вопрос (с файлом)"]'); ?>
                        </div>
                    </div>            
                </div>
            </section>

            <div class="margin-top">
                <?php get_template_part('template-parts/block', 'cta'); ?>
            </div>            
        </div>
    </main>

    <script>
         window.addEventListener('DOMContentLoaded', function(){

            let fields = document.querySelectorAll('.field__file');
            console.log(fields);
            Array.prototype.forEach.call(fields, function (input) {
            let label = input.nextElementSibling,
                labelVal = document.querySelector('.field__file-fake').innerText;                
        
                input.addEventListener('change', function (e) {
                    let countFiles = '';
                    if (this.files && this.files.length >= 1)
                    countFiles = this.files.length;
            
                    if (countFiles) {
                        document.querySelector('.field__file-fake').innerText = 'Файл прикреплён';
                        document.querySelector('.field__file-fake').classList.add('field__file-fake-get');
                        document.querySelector('.field__file-button').classList.add('field__file-button-get');
                    }  else {
                        document.querySelector('.field__file-fake').innerText = labelVal;
                    }
                    
                });
            });
        });
    </script>
<?php get_footer(); ?>