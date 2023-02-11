<?php
/*
Template Name: Наши работы
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
                        
                        <div class="container gal">
                            <ul class="prices__list list-rew row">
                                <li class="list-rew__item list-rew__item_prices col-auto">
                                    <a href="#" class="list-rew__link link-rew-active js-allWorks">
                                        Все работы
                                    </a>
                                </li>

                                <li class="list-rew__item list-rew__item_prices col-auto">
                                    <a href="#" class="list-rew__link js-mat">
                                        Матовые
                                    </a>
                                </li>
        
                                <li class="list-rew__item list-rew__item_prices col-auto">
                                    <a href="#" class="list-rew__link js-glyanz">
                                        Глянцевые
                                    </a>
                                </li>
        
                                <li class="list-rew__item list-rew__item_prices col-auto">
                                    <a href="#" class="list-rew__link js-satin">
                                        Сатиновые
                                    </a>
                                </li>
        
                                <li class="list-rew__item list-rew__item_prices col-auto">
                                    <a href="#" class="list-rew__link js-tkan">
                                        Тканевые
                                    </a>
                                </li>
        
                                <li class="list-rew__item list-rew__item_prices col-auto">
                                    <a href="#" class="list-rew__link js-svet">
                                        С подсветкой
                                    </a>
                                </li>
        
                                <li class="list-rew__item list-rew__item_prices col-auto">
                                    <a href="#" class="list-rew__link js-twoLev">
                                        Двухуровневые
                                    </a>
                                </li>
        
                                <li class="list-rew__item list-rew__item_prices col-auto">
                                    <a href="#" class="list-rew__link js-tenev">
                                        Теневые
                                    </a>
                                </li>
        
                                <li class="list-rew__item list-rew__item_prices col-auto">
                                    <a href="#" class="list-rew__link js-bescel">
                                        Бесщелевые
                                    </a>
                                </li>
        
                                <li class="list-rew__item list-rew__item_prices col-auto">
                                    <a href="#" class="list-rew__link js-fotop">
                                        Фотопечать
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>                

                <div class="reviews-page__article article-rew js-workBlock">                            
                    <div class="article-rew__page">
                        <div class="reviews__list reviews-list container row justify-content-between">

                            <?php
                            
                            $works = get_posts( array(
                                'numberposts' => -1,                            
                                'orderby'     => 'date',
                                'order'       => 'ASC',
                                'include'     => array(),
                                'exclude'     => array(),
                                'meta_key'    => '',
                                'meta_value'  =>'',
                                'post status' => 'publish',                                
                                'post_type'   => 'works',
                                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                            ) );

                            global $post; ?>

                            <?php if( $works) { ?>
                            <?php foreach( $works as $post ){
                            setup_postdata( $post );
                            ?>

                                <article class="reviews-list__review blog__item blog__item_bottom" data-article="<?php the_field('works_type'); ?>" data-echo="<?php the_field('works_echo'); ?>">
                                    <date class="reviews-list__date"><?php echo get_the_date(); ?></date>

                                    <a class="reviews-list__heading" href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>                
            
                                    <div class="reviews-list__video blog__video">
                                        <?php echo get_the_post_thumbnail( $id, 'full', array('class' => 'reviews-list__img') ); ?>                                            
                                    </div>
                                    
                                    <p class="blog__text text-top">
                                        <?php the_excerpt(); ?> 
                                    </p>
                                </article>
                                                                    
                            <?php }
                            } else { ?>
                                <p class="news__subheading">Проекты не добавлены</p>
                            <?php }                  
                            
                            wp_reset_postdata(); // сброс
                            ?>
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

    // Функционал открытия нужных проектов в портфолио и пагинации вкладок

    // Зададим переменные кнопок и статей

    var allWorks = document.querySelector('.js-allWorks') // Кнопка все публикации
    ,matWorks = document.querySelector('.js-mat') // Матовые
    ,glyanzWorks = document.querySelector('.js-glyanz') // Кнопка новости
    ,satinWorks = document.querySelector('.js-satin') // Кнопка акции
    ,tkanWorks = document.querySelector('.js-tkan')
    ,svetWorks = document.querySelector('.js-svet')
    ,twoLev = document.querySelector('.js-twoLev')
    ,tenevWorks = document.querySelector('.js-tenev')
    ,bescelWorks = document.querySelector('.js-bescel')
    ,fotopWorks = document.querySelector('.js-fotop')    

    ,postWorks = document.querySelectorAll(`[data-article]`); // Все публикации
    

    // Все матовые
    var allmatWorks = document.querySelectorAll(`[data-article='Матовые'] `);
    
    // Все глянцевые
    var allglyanzWorks = document.querySelectorAll(`[data-article='Глянцевые'] `);

    // Все сатиновые
    var allsatinWorks = document.querySelectorAll(`[data-article='Сатиновые'] `);

    // Все тканевые
    var alltkanWorks = document.querySelectorAll(`[data-article='Тканевые'] `);

    // Все с подсветкой
    var allsvetWorks = document.querySelectorAll(`[data-article='С подсветкой'] `);

    // Все двухуровневые
    var alltwoLev = document.querySelectorAll(`[data-article='Двухуровневые'] `);

    // Все теневые
    var alltenevWorks = document.querySelectorAll(`[data-article='Теневые'] `);

    // Все бесщелевые
    var allbescelWorks = document.querySelectorAll(`[data-article='Бесщелевые'] `);

    // Все фотопечать
    var allfotopWorks = document.querySelectorAll(`[data-article='Фотопечать'] `);

    // Применяем функцию filers - фильтрация вкладок в самом начале
    filers();

    function filers() { // Объявляем функцию фильтрации вкладок

        // Открытие Матовые
        matWorks.addEventListener('click', function(e){
            e.preventDefault();

            allglyanzWorks.forEach(function(eachGl){  //Отключаем глянцевые   
                eachGl.style.display = 'none';                        
            });
            
            allsatinWorks.forEach(function(eachSatin){  //Отключаем сатиновые
                eachSatin.style.display = 'none';
            });

            alltkanWorks.forEach(function(eachTkan){  //Отключаем тканевые
                eachTkan.style.display = 'none';
            });   
            
            allsvetWorks.forEach(function(eachSvet){  //Отключаем с подсветкой
                eachSvet.style.display = 'none';
            });
            
            alltwoLev.forEach(function(eachLev){  //Отключаем двухуровневые
                eachLev.style.display = 'none';
            }); 

            alltenevWorks.forEach(function(eachTen){  //Отключаем теневые
                eachTen.style.display = 'none';
            });

            allbescelWorks.forEach(function(eachBec){  //Отключаем бесщелевые
                eachBec.style.display = 'none';
            });

            allfotopWorks.forEach(function(eachPhoto){  //Отключаем фотопечать
                eachPhoto.style.display = 'none';
            });

            /***/
            
            allmatWorks.forEach(function(eachMat){  //Включаем матовые
                eachMat.style.display = 'block';
            }); 
            
            // Зададим в переменную кнопки на всех табах и отключим все кнопки "добавить ещё..."
            var btns = document.querySelectorAll('.read-more-btn');
            btns.forEach(function(allBtns){
                allBtns.style.display = 'none';
            });

            var matMoreBtn = document.createElement('button'); // Создаём кнопку Добавить матовые      

            matMoreBtn.classList.add('read-more-btn'); // Присваиваем её стили

            matMoreBtn.innerText = 'Больше работ';  // Задаём ей текст

            var CurrentMat = document.querySelector('[data-article="Матовые"]'); // Все матовые

            var matCont = document.querySelector('.article-rew__page'); // Обратимся к родителю 

            if(allmatWorks.length > 4) {  // Добавляем кнопку, если работ больше 4
                matCont.append(matMoreBtn);
            }

            for(let i=4; i<allmatWorks.length; i++) {
                allmatWorks[i].style.display = 'none'; // Скрывааем все статьи, что больше i=4                
            }   

            var countD = 4; //Установим счётчик 
    
            matMoreBtn.addEventListener('click', function(){
        
                countD += 1;

                if(countD <= allmatWorks.length) {
                    for(let i=0; i<countD; i++) {
                        allmatWorks[i].style.display = 'block'; // При клике на кнопку добавляем статьи по одной
                    }
                 
                    // Когда число добавляемых статей равняется всему числу статей, скрываем кнопку
                    if(countD == allmatWorks.length) {
                        matMoreBtn.style.display = 'none';
                    }

                    filers();
                }
            }); 
            
            document.querySelectorAll('.list-rew__link').forEach(function(eachLink){
                eachLink.classList.remove('link-rew-active');
            });

            matWorks.classList.add('link-rew-active');
        });

        // Открытие Глянцевые
        glyanzWorks.addEventListener('click', function(e){
            e.preventDefault();

            allmatWorks.forEach(function(eachMat){  //Откл матовые
                eachMat.style.display = 'none';
            }); 
            
            allsatinWorks.forEach(function(eachSatin){  //Отключаем сатиновые
                eachSatin.style.display = 'none';
            });

            alltkanWorks.forEach(function(eachTkan){  //Отключаем тканевые
                eachTkan.style.display = 'none';
            });   
            
            allsvetWorks.forEach(function(eachSvet){  //Отключаем с подсветкой
                eachSvet.style.display = 'none';
            });
            
            alltwoLev.forEach(function(eachLev){  //Отключаем двухуровневые
                eachLev.style.display = 'none';
            }); 

            alltenevWorks.forEach(function(eachTen){  //Отключаем теневые
                eachTen.style.display = 'none';
            });

            allbescelWorks.forEach(function(eachBec){  //Отключаем бесщелевые
                eachBec.style.display = 'none';
            });

            allfotopWorks.forEach(function(eachPhoto){  //Отключаем фотопечать
                eachPhoto.style.display = 'none';
            });

            /***/
            allglyanzWorks.forEach(function(eachGl){  //Включаем глянцевые   
                eachGl.style.display = 'block';                        
            });
           
            
            // Зададим в переменную кнопки на всех табах и отключим все кнопки "добавить ещё..."
            var btns = document.querySelectorAll('.read-more-btn');
            btns.forEach(function(allBtns){
                allBtns.style.display = 'none';
            });

            var glyanzMoreBtn = document.createElement('button'); // Создаём кнопку Добавить матовые      

            glyanzMoreBtn.classList.add('read-more-btn'); // Присваиваем её стили

            glyanzMoreBtn.innerText = 'Больше работ';  // Задаём ей текст

            var CurrentGlyanz = document.querySelector('[data-article="Глянцевые"]'); 

            var glyanzCont = document.querySelector('.article-rew__page'); // Обратимся к родителю 

            if(allglyanzWorks.length > 4) {  // Добавляем кнопку, если работ больше 4
                glyanzCont.append(glyanzMoreBtn);
            }

            for(let i=4; i<allglyanzWorks.length; i++) {
                allglyanzWorks[i].style.display = 'none'; // Скрывааем все статьи, что больше i=4                
            }   

            var countD = 4; //Установим счётчик 
    
            glyanzMoreBtn.addEventListener('click', function(){
        
                countD += 1;

                if(countD <= allglyanzWorks.length) {
                    for(let i=0; i<countD; i++) {
                        allglyanzWorks[i].style.display = 'block'; // При клике на кнопку добавляем статьи по одной
                    }
                 
                    // Когда число добавляемых статей равняется всему числу статей, скрываем кнопку
                    if(countD == allglyanzWorks.length) {
                        glyanzMoreBtn.style.display = 'none';
                    }

                    filers();
                }
            }); 
            
            document.querySelectorAll('.list-rew__link').forEach(function(eachLink){
                eachLink.classList.remove('link-rew-active');
            });

            glyanzWorks.classList.add('link-rew-active');
        });

        // Открытие Сатиновые
        satinWorks.addEventListener('click', function(e){
            e.preventDefault();

            allmatWorks.forEach(function(eachMat){  //Откл матовые
                eachMat.style.display = 'none';
            }); 
            
            allglyanzWorks.forEach(function(eachGl){  // глянцевые   
                eachGl.style.display = 'none';                        
            });

            alltkanWorks.forEach(function(eachTkan){  //Отключаем тканевые
                eachTkan.style.display = 'none';
            });   
            
            allsvetWorks.forEach(function(eachSvet){  //Отключаем с подсветкой
                eachSvet.style.display = 'none';
            });
            
            alltwoLev.forEach(function(eachLev){  //Отключаем двухуровневые
                eachLev.style.display = 'none';
            }); 

            alltenevWorks.forEach(function(eachTen){  //Отключаем теневые
                eachTen.style.display = 'none';
            });

            allbescelWorks.forEach(function(eachBec){  //Отключаем бесщелевые
                eachBec.style.display = 'none';
            });

            allfotopWorks.forEach(function(eachPhoto){  //Отключаем фотопечать
                eachPhoto.style.display = 'none';
            });

            /***/
            
            allsatinWorks.forEach(function(eachSatin){  //вкл сатиновые
                eachSatin.style.display = 'block';
            });
           
            
            // Зададим в переменную кнопки на всех табах и отключим все кнопки "добавить ещё..."
            var btns = document.querySelectorAll('.read-more-btn');
            btns.forEach(function(allBtns){
                allBtns.style.display = 'none';
            });

            var satinMoreBtn = document.createElement('button'); // Создаём кнопку Добавить  

            satinMoreBtn.classList.add('read-more-btn'); // Присваиваем её стили

            satinMoreBtn.innerText = 'Больше работ';  // Задаём ей текст

            var CurrentSatin = document.querySelector('[data-article="Сатиновые"]'); 

            var satinCont = document.querySelector('.article-rew__page'); // Обратимся к родителю 

            if(allsatinWorks.length > 4) {  // Добавляем кнопку, если работ больше 4
                satinCont.append(satinMoreBtn);
            }

            for(let i=4; i<allsatinWorks.length; i++) {
                allsatinWorks[i].style.display = 'none'; // Скрывааем все статьи, что больше i=4                
            }   

            var countD = 4; //Установим счётчик 
    
            satinMoreBtn.addEventListener('click', function(){
        
                countD += 1;

                if(countD <= allsatinWorks.length) {
                    for(let i=0; i<countD; i++) {
                        allsatinWorks[i].style.display = 'block'; // При клике на кнопку добавляем статьи по одной
                    }
                 
                    // Когда число добавляемых статей равняется всему числу статей, скрываем кнопку
                    if(countD == allsatinWorks.length) {
                        satinMoreBtn.style.display = 'none';
                    }

                    filers();
                }
            }); 
            
            document.querySelectorAll('.list-rew__link').forEach(function(eachLink){
                eachLink.classList.remove('link-rew-active');
            });

            satinWorks.classList.add('link-rew-active');
        });

        // Открытие Тканевые
        tkanWorks.addEventListener('click', function(e){
            e.preventDefault();

            allmatWorks.forEach(function(eachMat){  //Откл матовые
                eachMat.style.display = 'none';
            }); 
            
            allglyanzWorks.forEach(function(eachGl){  // глянцевые   
                eachGl.style.display = 'none';                        
            });

            allsatinWorks.forEach(function(eachSatin){  //сатиновые
                eachSatin.style.display = 'none';
            });  
            
            allsvetWorks.forEach(function(eachSvet){  //Отключаем с подсветкой
                eachSvet.style.display = 'none';
            });
            
            alltwoLev.forEach(function(eachLev){  //Отключаем двухуровневые
                eachLev.style.display = 'none';
            }); 

            alltenevWorks.forEach(function(eachTen){  //Отключаем теневые
                eachTen.style.display = 'none';
            });

            allbescelWorks.forEach(function(eachBec){  //Отключаем бесщелевые
                eachBec.style.display = 'none';
            });

            allfotopWorks.forEach(function(eachPhoto){  //Отключаем фотопечать
                eachPhoto.style.display = 'none';
            });

            /***/
            alltkanWorks.forEach(function(eachTkan){  //вкл тканевые
                eachTkan.style.display = 'block';
            });
                     
            
            // Зададим в переменную кнопки на всех табах и отключим все кнопки "добавить ещё..."
            var btns = document.querySelectorAll('.read-more-btn');
            btns.forEach(function(allBtns){
                allBtns.style.display = 'none';
            });

            var tkanMoreBtn = document.createElement('button'); // Создаём кнопку Добавить  

            tkanMoreBtn.classList.add('read-more-btn'); // Присваиваем её стили

            tkanMoreBtn.innerText = 'Больше работ';  // Задаём ей текст

            var CurrentTkan = document.querySelector('[data-article="Тканевые"]'); 

            var tkanCont = document.querySelector('.article-rew__page'); // Обратимся к родителю 

            if(alltkanWorks.length > 4) {  // Добавляем кнопку, если работ больше 4
                tkanCont.append(tkanMoreBtn);
            }

            for(let i=4; i<alltkanWorks.length; i++) {
                alltkanWorks[i].style.display = 'none'; // Скрывааем все статьи, что больше i=4                
            }   

            var countD = 4; //Установим счётчик 
    
            tkanMoreBtn.addEventListener('click', function(){
        
                countD += 1;

                if(countD <= alltkanWorks.length) {
                    for(let i=0; i<countD; i++) {
                        alltkanWorks[i].style.display = 'block'; // При клике на кнопку добавляем статьи по одной
                    }
                 
                    // Когда число добавляемых статей равняется всему числу статей, скрываем кнопку
                    if(countD == alltkanWorks.length) {
                        tkanMoreBtn.style.display = 'none';
                    }

                    filers();
                }
            }); 
            
            document.querySelectorAll('.list-rew__link').forEach(function(eachLink){
                eachLink.classList.remove('link-rew-active');
            });

            tkanWorks.classList.add('link-rew-active');
        });

        // Открытие с подсветкой
        svetWorks.addEventListener('click', function(e){
            e.preventDefault();

            allmatWorks.forEach(function(eachMat){  //Откл матовые
                eachMat.style.display = 'none';
            }); 
            
            allglyanzWorks.forEach(function(eachGl){  // глянцевые   
                eachGl.style.display = 'none';                        
            });

            allsatinWorks.forEach(function(eachSatin){  //сатиновые
                eachSatin.style.display = 'none';
            });  
            
            alltkanWorks.forEach(function(eachTkan){  //тканевые
                eachTkan.style.display = 'none';
            });
            
            alltwoLev.forEach(function(eachLev){  //Отключаем двухуровневые
                eachLev.style.display = 'none';
            }); 

            alltenevWorks.forEach(function(eachTen){  //Отключаем теневые
                eachTen.style.display = 'none';
            });

            allbescelWorks.forEach(function(eachBec){  //Отключаем бесщелевые
                eachBec.style.display = 'none';
            });

            allfotopWorks.forEach(function(eachPhoto){  //Отключаем фотопечать
                eachPhoto.style.display = 'none';
            });

            /***/

            allsvetWorks.forEach(function(eachSvet){  //Вкл с подсветкой
                eachSvet.style.display = 'block';
            });
                                
            
            // Зададим в переменную кнопки на всех табах и отключим все кнопки "добавить ещё..."
            var btns = document.querySelectorAll('.read-more-btn');
            btns.forEach(function(allBtns){
                allBtns.style.display = 'none';
            });

            var svetMoreBtn = document.createElement('button'); // Создаём кнопку Добавить  

            svetMoreBtn.classList.add('read-more-btn'); // Присваиваем её стили

            svetMoreBtn.innerText = 'Больше работ';  // Задаём ей текст

            var CurrentSvet = document.querySelector('[data-article="С подсветкой"]'); 

            var svetCont = document.querySelector('.article-rew__page'); // Обратимся к родителю 

            if(allsvetWorks.length > 4) {  // Добавляем кнопку, если работ больше 4
                svetCont.append(svetMoreBtn);
            }

            for(let i=4; i<allsvetWorks.length; i++) {
                allsvetWorks[i].style.display = 'none'; // Скрывааем все статьи, что больше i=4                
            }   

            var countD = 4; //Установим счётчик 
    
            svetMoreBtn.addEventListener('click', function(){
        
                countD += 1;

                if(countD <= allsvetWorks.length) {
                    for(let i=0; i<countD; i++) {
                        allsvetWorks[i].style.display = 'block'; // При клике на кнопку добавляем статьи по одной
                    }
                 
                    // Когда число добавляемых статей равняется всему числу статей, скрываем кнопку
                    if(countD == allsvetWorks.length) {
                        svetMoreBtn.style.display = 'none';
                    }

                    filers();
                }
            }); 
            
            document.querySelectorAll('.list-rew__link').forEach(function(eachLink){
                eachLink.classList.remove('link-rew-active');
            });

            svetWorks.classList.add('link-rew-active');
        });

        // Открытие Двухуровневые
        twoLev.addEventListener('click', function(e){
            e.preventDefault();

            allmatWorks.forEach(function(eachMat){  //Откл матовые
                eachMat.style.display = 'none';
            }); 
            
            allglyanzWorks.forEach(function(eachGl){  // глянцевые   
                eachGl.style.display = 'none';                        
            });

            allsatinWorks.forEach(function(eachSatin){  //сатиновые
                eachSatin.style.display = 'none';
            });  
            
            alltkanWorks.forEach(function(eachTkan){  //тканевые
                eachTkan.style.display = 'none';
            });
            
            allsvetWorks.forEach(function(eachSvet){  //с подсветкой
                eachSvet.style.display = 'none';
            });

            alltenevWorks.forEach(function(eachTen){  //Отключаем теневые
                eachTen.style.display = 'none';
            });

            allbescelWorks.forEach(function(eachBec){  //Отключаем бесщелевые
                eachBec.style.display = 'none';
            });

            allfotopWorks.forEach(function(eachPhoto){  //Отключаем фотопечать
                eachPhoto.style.display = 'none';
            });

            /***/

            alltwoLev.forEach(function(eachLev){  //вкл двухуровневые
                eachLev.style.display = 'block';
            });


            // Зададим в переменную кнопки на всех табах и отключим все кнопки "добавить ещё..."
            var btns = document.querySelectorAll('.read-more-btn');
            btns.forEach(function(allBtns){
                allBtns.style.display = 'none';
            });

            var levMoreBtn = document.createElement('button'); // Создаём кнопку Добавить  

            levMoreBtn.classList.add('read-more-btn'); // Присваиваем её стили

            levMoreBtn.innerText = 'Больше работ';  // Задаём ей текст

            var CurrentLev = document.querySelector('[data-article="Двухуровневые"]'); 

            var levCont = document.querySelector('.article-rew__page'); // Обратимся к родителю 

            if(alltwoLev.length > 4) {  // Добавляем кнопку, если работ больше 4
                levCont.append(levMoreBtn);
            }

            for(let i=4; i<alltwoLev.length; i++) {
                alltwoLev[i].style.display = 'none'; // Скрывааем все статьи, что больше i=4                
            }   

            var countD = 4; //Установим счётчик 
    
            levMoreBtn.addEventListener('click', function(){
        
                countD += 1;

                if(countD <= alltwoLev.length) {
                    for(let i=0; i<countD; i++) {
                        alltwoLev[i].style.display = 'block'; // При клике на кнопку добавляем статьи по одной
                    }
                 
                    // Когда число добавляемых статей равняется всему числу статей, скрываем кнопку
                    if(countD == alltwoLev.length) {
                        levMoreBtn.style.display = 'none';
                    }

                    filers();
                }
            }); 
            
            document.querySelectorAll('.list-rew__link').forEach(function(eachLink){
                eachLink.classList.remove('link-rew-active');
            });

            twoLev.classList.add('link-rew-active');
        });

        // Открытие теневые
        tenevWorks.addEventListener('click', function(e){
            e.preventDefault();

            allmatWorks.forEach(function(eachMat){  //Откл матовые
                eachMat.style.display = 'none';
            }); 
            
            allglyanzWorks.forEach(function(eachGl){  // глянцевые   
                eachGl.style.display = 'none';                        
            });

            allsatinWorks.forEach(function(eachSatin){  //сатиновые
                eachSatin.style.display = 'none';
            });  
            
            alltkanWorks.forEach(function(eachTkan){  //тканевые
                eachTkan.style.display = 'none';
            });
            
            alltwoLev.forEach(function(eachLev){  //Отключаем двухуровневые
                eachLev.style.display = 'none';
            }); 

            allsvetWorks.forEach(function(eachSvet){  //Вкл с подсветкой
                eachSvet.style.display = 'none';
            });

            allbescelWorks.forEach(function(eachBec){  //Отключаем бесщелевые
                eachBec.style.display = 'none';
            });

            allfotopWorks.forEach(function(eachPhoto){  //Отключаем фотопечать
                eachPhoto.style.display = 'none';
            });

            /***/
            alltenevWorks.forEach(function(eachTen){  //вкл теневые
                eachTen.style.display = 'block';
            });            
                                
            
            // Зададим в переменную кнопки на всех табах и отключим все кнопки "добавить ещё..."
            var btns = document.querySelectorAll('.read-more-btn');
            btns.forEach(function(allBtns){
                allBtns.style.display = 'none';
            });

            var tenMoreBtn = document.createElement('button'); // Создаём кнопку Добавить  

            tenMoreBtn.classList.add('read-more-btn'); // Присваиваем её стили

            tenMoreBtn.innerText = 'Больше работ';  // Задаём ей текст

            var CurrentTen = document.querySelector('[data-article="Теневые"]'); 

            var tenCont = document.querySelector('.article-rew__page'); // Обратимся к родителю 

            if(alltenevWorks.length > 4) {  // Добавляем кнопку, если работ больше 4
                tenCont.append(tenMoreBtn);
            }

            for(let i=4; i<alltenevWorks.length; i++) {
                alltenevWorks[i].style.display = 'none'; // Скрывааем все статьи, что больше i=4                
            }   

            var countD = 4; //Установим счётчик 
    
            tenMoreBtn.addEventListener('click', function(){
        
                countD += 1;

                if(countD <= alltenevWorks.length) {
                    for(let i=0; i<countD; i++) {
                        alltenevWorks[i].style.display = 'block'; // При клике на кнопку добавляем статьи по одной
                    }
                 
                    // Когда число добавляемых статей равняется всему числу статей, скрываем кнопку
                    if(countD == alltenevWorks.length) {
                        tenMoreBtn.style.display = 'none';
                    }

                    filers();
                }
            }); 
            
            document.querySelectorAll('.list-rew__link').forEach(function(eachLink){
                eachLink.classList.remove('link-rew-active');
            });

            tenevWorks.classList.add('link-rew-active');
        });

        // Открытие бесщелевые
        bescelWorks.addEventListener('click', function(e){
            e.preventDefault();

            allmatWorks.forEach(function(eachMat){  //Откл матовые
                eachMat.style.display = 'none';
            }); 
            
            allglyanzWorks.forEach(function(eachGl){  // глянцевые   
                eachGl.style.display = 'none';                        
            });

            allsatinWorks.forEach(function(eachSatin){  //сатиновые
                eachSatin.style.display = 'none';
            });  
            
            alltkanWorks.forEach(function(eachTkan){  //тканевые
                eachTkan.style.display = 'none';
            });
            
            alltwoLev.forEach(function(eachLev){  //Отключаем двухуровневые
                eachLev.style.display = 'none';
            }); 

            allsvetWorks.forEach(function(eachSvet){  //Вкл с подсветкой
                eachSvet.style.display = 'none';
            });

            alltenevWorks.forEach(function(eachTen){  //вкл теневые
                eachTen.style.display = 'none';
            });  

            allfotopWorks.forEach(function(eachPhoto){  //Отключаем фотопечать
                eachPhoto.style.display = 'none';
            });

            /***/
            allbescelWorks.forEach(function(eachBec){  // вкл бесщелевые
                eachBec.style.display = 'block';
            });                
            
            // Зададим в переменную кнопки на всех табах и отключим все кнопки "добавить ещё..."
            var btns = document.querySelectorAll('.read-more-btn');
            btns.forEach(function(allBtns){
                allBtns.style.display = 'none';
            });

            var bescelMoreBtn = document.createElement('button'); // Создаём кнопку Добавить  

            bescelMoreBtn.classList.add('read-more-btn'); // Присваиваем её стили

            bescelMoreBtn.innerText = 'Больше работ';  // Задаём ей текст

            var CurrentBescel = document.querySelector('[data-article="Бесщелевые"]'); 

            var bescelCont = document.querySelector('.article-rew__page'); // Обратимся к родителю 

            if(allbescelWorks.length > 4) {  // Добавляем кнопку, если работ больше 4
                bescelCont.append(bescelMoreBtn);
            }

            for(let i=4; i<allbescelWorks.length; i++) {
                allbescelWorks[i].style.display = 'none'; // Скрывааем все статьи, что больше i=4                
            }   

            var countD = 4; //Установим счётчик 
    
            bescelMoreBtn.addEventListener('click', function(){
        
                countD += 1;

                if(countD <= allbescelWorks.length) {
                    for(let i=0; i<countD; i++) {
                        allbescelWorks[i].style.display = 'block'; // При клике на кнопку добавляем статьи по одной
                    }
                 
                    // Когда число добавляемых статей равняется всему числу статей, скрываем кнопку
                    if(countD == allbescelWorks.length) {
                        bescelMoreBtn.style.display = 'none';
                    }

                    filers();
                }
            }); 
            
            document.querySelectorAll('.list-rew__link').forEach(function(eachLink){
                eachLink.classList.remove('link-rew-active');
            });

            bescelWorks.classList.add('link-rew-active');
        });

        // Открытие фотопечать
        fotopWorks.addEventListener('click', function(e){
            e.preventDefault();

            allmatWorks.forEach(function(eachMat){  //Откл матовые
                eachMat.style.display = 'none';
            }); 
            
            allglyanzWorks.forEach(function(eachGl){  // глянцевые   
                eachGl.style.display = 'none';                        
            });

            allsatinWorks.forEach(function(eachSatin){  //сатиновые
                eachSatin.style.display = 'none';
            });  
            
            alltkanWorks.forEach(function(eachTkan){  //тканевые
                eachTkan.style.display = 'none';
            });
            
            alltwoLev.forEach(function(eachLev){  //Отключаем двухуровневые
                eachLev.style.display = 'none';
            }); 

            allsvetWorks.forEach(function(eachSvet){  //Вкл с подсветкой
                eachSvet.style.display = 'none';
            });

            alltenevWorks.forEach(function(eachTen){  //вкл теневые
                eachTen.style.display = 'none';
            });  

            allbescelWorks.forEach(function(eachBec){  // бесщелевые
                eachBec.style.display = 'none';
            }); 

            /***/
            allfotopWorks.forEach(function(eachPhoto){  // вкл фотопечать
                eachPhoto.style.display = 'block';
            });           
            
            // Зададим в переменную кнопки на всех табах и отключим все кнопки "добавить ещё..."
            var btns = document.querySelectorAll('.read-more-btn');
            btns.forEach(function(allBtns){
                allBtns.style.display = 'none';
            });

            var fotoMoreBtn = document.createElement('button'); // Создаём кнопку Добавить  

            fotoMoreBtn.classList.add('read-more-btn'); // Присваиваем её стили

            fotoMoreBtn.innerText = 'Больше работ';  // Задаём ей текст

            var CurrentFoto = document.querySelector('[data-article="Фотопечать"]'); 

            var fotoCont = document.querySelector('.article-rew__page'); // Обратимся к родителю 

            if(allfotopWorks.length > 4) {  // Добавляем кнопку, если работ больше 4
                fotoCont.append(fotoMoreBtn);
            }

            for(let i=4; i<allfotopWorks.length; i++) {
                allfotopWorks[i].style.display = 'none'; // Скрывааем все статьи, что больше i=4                
            }   

            var countD = 4; //Установим счётчик 
    
            fotoMoreBtn.addEventListener('click', function(){
        
                countD += 1;

                if(countD <= allfotopWorks.length) {
                    for(let i=0; i<countD; i++) {
                        allfotopWorks[i].style.display = 'block'; // При клике на кнопку добавляем статьи по одной
                    }
                 
                    // Когда число добавляемых статей равняется всему числу статей, скрываем кнопку
                    if(countD == allfotopWorks.length) {
                        fotoMoreBtn.style.display = 'none';
                    }

                    filers();
                }
            }); 
            
            document.querySelectorAll('.list-rew__link').forEach(function(eachLink){
                eachLink.classList.remove('link-rew-active');
            });

            fotopWorks.classList.add('link-rew-active');
        });

        // Открытие всех работ
        allWorks.addEventListener('click', function(e){
            e.preventDefault();            

            allmatWorks.forEach(function(eachMat){  //Откл матовые
                eachMat.style.display = 'block';
            }); 
            
            allglyanzWorks.forEach(function(eachGl){  // глянцевые   
                eachGl.style.display = 'block';                        
            });

            allsatinWorks.forEach(function(eachSatin){  //сатиновые
                eachSatin.style.display = 'block';
            });  
            
            alltkanWorks.forEach(function(eachTkan){  //тканевые
                eachTkan.style.display = 'block';
            });
            
            alltwoLev.forEach(function(eachLev){  //Отключаем двухуровневые
                eachLev.style.display = 'block';
            }); 

            allsvetWorks.forEach(function(eachSvet){  //Вкл с подсветкой
                eachSvet.style.display = 'block';
            });

            alltenevWorks.forEach(function(eachTen){  //вкл теневые
                eachTen.style.display = 'block';
            });  

            allbescelWorks.forEach(function(eachBec){  // бесщелевые
                eachBec.style.display = 'block';
            });
            
            allfotopWorks.forEach(function(eachPhoto){  // вкл фотопечать
                eachPhoto.style.display = 'block';
            });           
                        
            addFilters();
            
            document.querySelectorAll('.list-rew__link').forEach(function(eachLink3){
                eachLink3.classList.remove('link-rew-active');
            });

            this.classList.add('link-rew-active');        
        });
    }  
    
    
    // Добавление всех работ

    addFilters();

    function addFilters() {
        var btns = document.querySelectorAll('.read-more-btn');
        btns.forEach(function(allBtns){
            allBtns.style.display = 'none';
        });

        var allWorksMoreBtn = document.createElement('button');            

        allWorksMoreBtn.classList.add('read-more-btn');

        allWorksMoreBtn.innerText = 'Показать больше работ';

        var allWorksCurrent = document.querySelector('[data-article]');

        var allWorksCont = document.querySelector('.article-rew__page');

        if(postWorks.length > 4) {                
            allWorksCont.append(allWorksMoreBtn);
        }

        for(let i=4; i<postWorks.length; i++) {
            postWorks[i].style.display = 'none';             
        }

        var countD = 4; //Установим счётчик - при клике на кнопку будет добавляться ещё 1 блок отзывов
        allWorksMoreBtn.addEventListener('click', function(){        
            countD += 1;

            if(countD <= postWorks.length) {
                for(let i=0; i<countD; i++) {
                    postWorks[i].style.display = 'block';

                    if(countD == postWorks.length) {
                        allWorksMoreBtn.style.display = 'none';
                    }
                } 
            }            
        }); 
    }
});    
</script>

<?php
get_footer(); ?>