<?php
/*
Template Name: Вакансии
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
                        <h1 class="pages-heading blog__heading">
                            <?php the_title(); ?>
                        </h1>
                        
                        <div class="job__box row container justify-content-between">

                        <?php if( have_rows('add_vacancy_store') ): ?>
                        <?php while( have_rows('add_vacancy_store') ): the_row(); 
                        $vacancyStoreName = get_sub_field('vacancy_store_name');
                        ?>

                            <article class="job__article col-xxl-6 col-12">
                                <h3 class="job__heading">
                                    <?= $vacancyStoreName; ?>
                                </h3>
        
                                <div class="job__full">

                                <?php if( have_rows('add_vacancy') ): ?>
                                <?php while( have_rows('add_vacancy') ): the_row(); 
                                $vacancyName = get_sub_field('vacancy_name');                                
                                $vacancyText = get_sub_field('vacancy_text');
                                $vacancyPrice = get_sub_field('vacancy_price');
                                $vacancyItem = get_sub_field('vacancy_item');
                                $vacancyBtn = get_sub_field('vacancy_btn');
                                ?>

                                    <!-- Section -->
                                    <div class="accordion-item js-vacAccord" data-targetVac="<?= $vacancyItem; ?>">
                                        <div class="accordion-header job__subheading row">
                                            <h3 class="job__post"><?= $vacancyName; ?></h3>

                                            <p class="job__price col-auto">Зарплата: <?= $vacancyPrice; ?> ₽</p>                                    
                                        </div>
                                        
                                        <div>
                                            <?= $vacancyText; ?>
        
                                            <button class="job__btn" data-btnVac="<?= $vacancyBtn; ?>">ОТПРАВИТЬ РЕЗЮМЕ</button>
                                        </div>

                                        <!-- Попап отправить резюме++ -->
                                        <div class="popup js-vacancyPopup" >
                                            <div class="popup__contain">
                                                <button class="popup__close js-vacancyClose">
                                                    <svg class="popup__img">
                                                        <use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icons/sprite.svg#close"></use>                                                   
                                                    </svg>
                                                </button>

                                                <h3 class="popup__heading">
                                                    Откликнуться на вакансию
                                                </h3>

                                                <div id="vacancyForm" class="popup__form">
                                                    <?php echo do_shortcode('[contact-form-7 id="592" title="Отклик на вакансию"]'); ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                <?php endwhile; ?>
                                <?php endif; ?>
                                </div>
                            </article>
        
                        <?php endwhile; ?>
                        <?php endif; ?>
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
            var firstAccord = document.querySelector('.job__full:first-of-type');
            firstAccord.setAttribute('id','accordion4');

            var secondAccord = document.querySelector('.job__article:nth-of-type(2) .job__full');
           
            secondAccord.setAttribute('id','accordion5');

            // Сначала объявим функцию FadeIn

            const fadeIn = (el, timeout, display) => {
            el.style.opacity = 0;
            el.style.display = display || 'block';
            el.style.transition = `opacity ${timeout}ms`;
            setTimeout(() => {
                el.style.opacity = 1;
            }, 10);
            }
        
            // Объявим функцию FadeOut
        
            const fadeOut = (el, timeout) => {
            el.style.opacity = 1;
            el.style.transition = `opacity ${timeout}ms`;
            el.style.opacity = 0;
        
            setTimeout(() => {
                el.style.display = 'none';
            }, timeout);
            }; 


            
            // Открытие попапа Отправить резюме
            var vacField = document.querySelector('.js-vacancyPopup');
            var vacFieldOpen = document.querySelectorAll('.job__btn'); 
            var vacClose = document.querySelector('.js-vacancyClose'); 
            var flag = false;  

            vacFieldOpen.forEach(function(vacOpen){
                vacOpen.addEventListener('click', function(event){                     
                    const pathvac = event.currentTarget.dataset.btnvac;

                    var vacName = document.querySelector(`[data-targetvac = "${pathvac}"] .job__post `);                    

                    if(!flag) {
                    fadeIn(vacField, 300, 'flex');
                            
                    document.querySelector('body').classList.add('closed');

                    } else {
                        fadeOut(vacField, 300);
                        
                        document.querySelector('body').classList.remove('closed');
                    }
                    
                    vacClose.addEventListener('click', function(){
                        fadeOut(vacField, 300);

                        document.querySelector('body').classList.remove('closed'); 
                    });

                    vacField.addEventListener('click', function(event){
                        if(this == event.target) {
                            fadeOut(vacField, 300);

                            document.querySelector('body').classList.remove('closed');
                        }                     
                    }); 
                    
                    
                    // Присвоим форме ID
                    var vacantForm = document.querySelector('#vacancyForm form');
                    vacantForm.setAttribute('id','vacForm');

                    // Получаем тип вакансии
                    var vacancy_type_field = vacName;
                        var vacancy_type = vacancy_type_field.innerText;
                        // console.log(vacancy_type);


                    $('#vacForm').on('submit', function(e) {
                        e.preventDefault();

                        // Получаем значение поля Имя клиента из формы Сontact Form7
                        var vacancy_client_name = document.querySelector('#vacancy_client_name');
                        var vacancy_name = vacancy_client_name.value;

                        // Получаем значение поля Телефон клиента из формы Сontact Form7
                        var vacancy_client_phone_field = document.querySelector('#vacancy_client_phone');
                        var vacancy_client_phone = vacancy_client_phone_field.value;                        

                        // Получаем значение поля Телефон клиента из формы Сontact Form7
                        var vacancy_file_field = document.querySelector('.vacancy_file');
                        var vacancy_file = vacancy_file_field.value;                        

                        let data = {
                            vacancy_name,
                            vacancy_client_phone,
                            vacancy_type,
                            vacancy_file,
                            action: 'vacancy-ajax'            
                        }

                        $.ajax({
                            url: '/wp-content/themes/e-store/vacancy-post.php',
                            method: 'post',
                            dataType: 'json',
                            data: data,
                            success: function(data){
                            console.log(data);
                            }
                        });
                    });
                });
            });


            // Функционал прикрепить файл input file

            let fields = document.querySelectorAll('.field__file');
            // console.log(fields);
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

            // Всплытие окна Спасибо после отправки формы
            document.querySelector('#vacancyForm').addEventListener( 'wpcf7mailsent', function( event ) {

            document.querySelector('.popup-thanks').classList.add('thanks-active'); 
                    
            fadeOut(vacField, 300);    
                document.querySelector('body').classList.remove('closed');  

            setTimeout(() => {
                document.querySelector('.popup-thanks').classList.remove('thanks-active'); 
            }, 2500 );  

            }, false );
        });
    </script>
    
<?php
get_footer(); ?>