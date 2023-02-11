<?php
/*
Template Name: Блог
*/
get_header();
?>

    <main class="main container-fluid2  row">
    
        <?php get_sidebar(); ?>

        <div class="main-content col">
            <section class="reviews-page">
                <?php estore_add_breadcrumbs( );?>

                <div class="container-fluid2 hero__cont row justify-content-between align-items-stretch">
                    <div class="reviews-page__main">
                        <h1 class="pages-heading">
                            <?php the_title(); ?>
                        </h1> 
                        
                        <div class="reviews-page__box row">
                            <ul class="reviews-page__list list-rew row">
                                <li class="list-rew__item col-auto">
                                    <a href="#" class="list-rew__link link-rew-active js-all">
                                        Все публикации
                                    </a>
                                </li>
        
                                <li class="list-rew__item col-auto">
                                    <a href="#" class="list-rew__link js-articles">
                                        Статьи
                                    </a>
                                </li>
        
                                <li class="list-rew__item col-auto">
                                    <a href="#" class="list-rew__link js-news">
                                        Новости
                                    </a>
                                </li>
        
                                <li class="list-rew__item col-auto">
                                    <a href="#" class="list-rew__link js-bonus" >
                                        Акции
                                    </a>
                                </li>
                            </ul>
                        </div>        
                        
                        <div class="reviews-page__article article-rew article-rew-active">                            
                            <div class="article-rew__page">
                                <div class="reviews__list reviews-list container row justify-content-between js-first">

                                    <?php
                                    // параметры по умолчанию
                                    $blog_posts = get_posts( array(
                                        'numberposts' => 0,                            
                                        'orderby'     => 'date',
                                        'order'       => 'ASC',
                                        'include'     => array(),
                                        'exclude'     => array(),
                                        'meta_key'    => '',
                                        'meta_value'  =>'',
                                        'post_type'   => 'articles',
                                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                                    ) );

                                    global $post; ?>

                                    <?php if( $blog_posts) { ?>
                                    <?php foreach( $blog_posts as $post ){
                                    setup_postdata( $post );
                                    ?>

                                        <article class="reviews-list__review blog__item blog__item_bottom" data-article="<?php the_field('article_type'); ?>" data-echo="<?php the_field('article_echo'); ?>">
                                            <date class="reviews-list__date"><?php echo get_the_date(); ?></date>

                                            <a class="reviews-list__heading" href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>                
                    
                                            <div class="reviews-list__video blog__video">
                                                <?php echo get_the_post_thumbnail( $id, 'thumbnail', array('class' => 'reviews-list__img') ); ?>                                            
                                            </div>
                                            
                                            <p class="blog__text text-top">
                                                <?php the_excerpt(); ?> 
                                            </p>
                                        </article>
                                                                            
                                    <?php }
                                    } else { ?>
                                        <p class="news__subheading">Посты не добавлены</p>
                                    <?php }                  
                                    
                                    wp_reset_postdata(); // сброс
                                    ?>
                                </div>
                            </div>
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

    // Функционал открытия нужных публикаций в Блоге и пагинации вкладок

    // Зададим переменные кнопок и статей

    var allArt = document.querySelector('.js-all') // Кнопка все публикации
    ,articlesArt = document.querySelector('.js-articles') // Кнопка статьи
    ,newsArt = document.querySelector('.js-news') // Кнопка новости
    ,actionsArt = document.querySelector('.js-bonus') // Кнопка акции
    ,postArticle = document.querySelectorAll(`[data-article]`) // Все публикации
    ,postMoreBtn = document.querySelector('.js-postMore'); // Кнопка добавить публикации (все)
    

    // Все статьи 
    var allArticles = document.querySelectorAll(`[data-article='Статья'] `);
    
    // Все новости
    var allNews = document.querySelectorAll(`[data-article='Новость'] `);

    // Все акции
    var allActions = document.querySelectorAll(`[data-article='Акция'] `);

    // Применяем функцию filers - фильтрация вкладок в самом начале
    filers();

    function filers() { // Объявляем функцию фильтрации вкладок

        // Открытие статей
        articlesArt.addEventListener('click', function(e){
            e.preventDefault();

            allNews.forEach(function(eachNews){  //Отключаем новости       
                eachNews.style.display = 'none';                        
            });
            
            allActions.forEach(function(eachAction){  //Отключаем акции
                eachAction.style.display = 'none';
            });

            allArticles.forEach(function(eachArticle){  //Включаем статьи
                eachArticle.style.display = 'block';
            });               
            
            // Зададим в переменную кнопки на всех табах и отключим все кнопки "добавить ещё..."
            var btns = document.querySelectorAll('.read-more-btn');
            btns.forEach(function(allBtns){
                allBtns.style.display = 'none';
            });

            var articlesMoreBtn = document.createElement('button'); // Создаём кнопку Добавить статьи           

            articlesMoreBtn.classList.add('read-more-btn'); // Присваиваем её стили

            articlesMoreBtn.innerText = 'Больше статей';  // Задаём ей текст

            var CurrentArticles = document.querySelector('[data-article="Статья"]'); // Все статьи

            var articlesCont = document.querySelector('.article-rew__page'); // Обратимся к родителю статей

            if(allArticles.length > 4) {  // Добавляем кнопку, если статей больше 4
                articlesCont.append(articlesMoreBtn);
            }

            for(let i=4; i<allArticles.length; i++) {
                allArticles[i].style.display = 'none'; // Скрывааем все статьи, что больше i=4                
            }   

            var countA = 4; //Установим счётчик 
    
            articlesMoreBtn.addEventListener('click', function(){
        
                countA += 1;

                if(countA <= allArticles.length) {
                    for(let i=0; i<countA; i++) {
                        allArticles[i].style.display = 'block'; // При клике на кнопку добавляем статьи по одной
                    }
                    
                    // console.log(countD);
                    // console.log(allArticles);

                    // Когда число добавляемых статей равняется всему числу статей, скрываем кнопку
                    if(countA == allArticles.length) {
                        articlesMoreBtn.style.display = 'none';
                    }

                    filers();
                }
            }); 
            
            document.querySelectorAll('.list-rew__link').forEach(function(eachLink){
                eachLink.classList.remove('link-rew-active');
            });

            articlesArt.classList.add('link-rew-active');
        });


        // Открытие Новостей
        newsArt.addEventListener('click', function(e){
            e.preventDefault();            

            allArticles.forEach(function(eachArticle2){
                eachArticle2.style.display = 'none';
            });

            allActions.forEach(function(eachAction2){
                eachAction2.style.display = 'none';
            });

            allNews.forEach(function(eachNews2){         
                eachNews2.style.display = 'block';                    
            });

            var btns = document.querySelectorAll('.read-more-btn');
            btns.forEach(function(allBtns){
                allBtns.style.display = 'none';
            });                       
            
            var newsMoreBtn = document.createElement('button');            

            newsMoreBtn.classList.add('read-more-btn');

            newsMoreBtn.innerText = 'Больше новостей';

            var CurrentNews = document.querySelector('[data-article="Новость"]');

            var newsCont = document.querySelector('.article-rew__page');
            
            if(allNews.length > 4) {                
                newsCont.append(newsMoreBtn);
            }
            
            for(let i=4; i<allNews.length; i++) {
                allNews[i].style.display = 'none';
            }            

            var countB = 4; //Установим счётчик 
    
            newsMoreBtn.addEventListener('click', function(){
        
                countB += 1;

                if(countB <= allNews.length) {
                    for(let i=0; i<countB; i++) {
                        allNews[i].style.display = 'block';
                    } 

                    if(countB == allNews.length) {
                        newsMoreBtn.style.display = 'none';
                    }

                    filers();
                }
            }); 
            
            document.querySelectorAll('.list-rew__link').forEach(function(eachLink2){
                eachLink2.classList.remove('link-rew-active');
            });

            this.classList.add('link-rew-active');
        });


        // Открытие Акций
        actionsArt.addEventListener('click', function(e){
            e.preventDefault();            

            allArticles.forEach(function(eachArticle3){
                eachArticle3.style.display = 'none';
            });

            allNews.forEach(function(eachNews3){
                eachNews3.style.display = 'none';
            });

            allActions.forEach(function(eachAction3){         
                eachAction3.style.display = 'block';                      
            });           

            var btns = document.querySelectorAll('.read-more-btn');
            btns.forEach(function(allBtns){
                allBtns.style.display = 'none';
            });

            var actionsMoreBtn = document.createElement('button');            

            actionsMoreBtn.classList.add('read-more-btn');

            actionsMoreBtn.innerText = 'Больше акций';

            var actionsCurrent = document.querySelector('[data-article="Акция"]');

            var actionsCont = document.querySelector('.article-rew__page');

            if(allActions.length > 4) {                
                actionsCont.append(actionsMoreBtn);
            }

            for(let i=4; i<allActions.length; i++) {
                allActions[i].style.display = 'none'; 
            }   

            var countC = 4; //Установим счётчик 
    
            actionsMoreBtn.addEventListener('click', function(){
        
                countC += 1;

                if(countC <= allActions.length) {
                    for(let i=0; i<countC; i++) {
                        allActions[i].style.display = 'block';
                    }
                    
                    if(countC == allActions.length) {
                        actionsMoreBtn.style.display = 'none';
                    }

                    filers();
                }
            });               
            
            
            document.querySelectorAll('.list-rew__link').forEach(function(eachLink3){
                eachLink3.classList.remove('link-rew-active');
            });

            this.classList.add('link-rew-active');           
            
        });

        // Открытие всех публикаций
        allArt.addEventListener('click', function(e){
            e.preventDefault();            

            allArticles.forEach(function(eachArticle){  
                eachArticle.style.display = 'block';                  
            });
                
            allNews.forEach(function(eachNews2){         
                eachNews2.style.display = 'block';                  
            });

            allActions.forEach(function(eachAction3){         
                eachAction3.style.display = 'block';                       
            });            
                        
            addFilters();
            
            document.querySelectorAll('.list-rew__link').forEach(function(eachLink3){
                eachLink3.classList.remove('link-rew-active');
            });

            this.classList.add('link-rew-active');        
        });
    }  
    
    
    // Добавление Блоков статей (все публикации)

    addFilters();

    function addFilters() {
        var btns = document.querySelectorAll('.read-more-btn');
        btns.forEach(function(allBtns){
            allBtns.style.display = 'none';
        });

        var postsMoreBtn = document.createElement('button');            

        postsMoreBtn.classList.add('read-more-btn');

        postsMoreBtn.innerText = 'Больше публикаций';

        var postsCurrent = document.querySelector('[data-article]');

        var postsCont = document.querySelector('.article-rew__page');  

        if(postArticle.length > 4) {                
            postsCont.append(postsMoreBtn);
        }

        for(let i=4; i<postArticle.length; i++) {
            postArticle[i].style.display = 'none';             
        }

        var countD = 4; //Установим счётчик - при клике на кнопку будет добавляться ещё 1 блок отзывов
        postsMoreBtn.addEventListener('click', function(){        
            countD += 1;

            if(countD <= postArticle.length) {
                for(let i=0; i<countD; i++) {
                    postArticle[i].style.display = 'block';

                    if(countD == postArticle.length) {
                        postsMoreBtn.style.display = 'none';
                    }
                } 
            }            
        }); 
    }
});    
</script>

<?php get_footer(); ?>