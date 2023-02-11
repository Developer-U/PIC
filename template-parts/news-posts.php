<?php
/**
 * Блок "Новости и статьи"
 * 
 */
?>

    <section class="news reviews">
        <div class="container-fluid2  about__contain news__contain">
            <h2 class="calc__heading news__heading">
                <?php the_field('posts-news-head', 'options'); ?>
            </h2>

            <div class="news__box container row justify-content-between">
                <div class="news__articles">

                    <?php
                    // выведем из типа постов articles только новости
                    $news = get_posts( array(
                        'numberposts' => 3,
                        'category'    => 0,
                        'orderby'     => 'date',
                        'order'       => 'ASC',
                        'include'     => array(),
                        'exclude'     => array(),
                        'meta_key'    => '',
                        'meta_value'  => 'Новость',
                        'post_type'   => 'articles',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );

                    global $post; ?>

                    <?php if( $news) { ?>
                    <?php foreach( $news as $post ){
                        setup_postdata( $post ); ?>

                        <article class="news__article" >
                            <date class="reviews-list__date news__date"><?php echo get_the_date(); ?></date>

                            <a class="news__subheading" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>

                            <div class="news__text">
                                <?php the_excerpt(); ?>
                            </div>
                        </article>
                    <?php }                         
                    
                    } else { ?>
                        <p class="news__subheading">Посты не добавлены</p>
                    <?php }                  
                    
                    wp_reset_postdata(); // сброс
                    ?> 

                </div>

                <div class="news__stories news-stories row">

                <?php
                    // выведем из типа постов articles только статьи
                    $articles = get_posts( array(
                        'numberposts' => 3,
                        'category'    => 0,
                        'orderby'     => 'date',
                        'order'       => 'ASC',
                        'include'     => array(),
                        'exclude'     => array(),
                        'meta_key'    => '',
                        'meta_value'  => 'Статья',
                        'post_type'   => 'articles',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );

                    global $post; ?>

                    <?php if( $articles) { ?>
                    <?php foreach( $articles as $post ){
                        setup_postdata( $post ); ?>


                    <article class="news-stories__story col-md-4 col-12">
                        <figure class="news-stories__image">
                            <?php $article_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>

                            <img src="<?= $article_img_url; ?>" alt="Изображение статьи" class="reviews-list__img">
                        </figure>

                        <h3 class="news__subheading">
                            <?php the_title(); ?>
                        </h3>

                        <p class="news__text">
                            <?php the_excerpt(); ?>
                        </p>

                        <a href="<?php the_permalink(); ?>" class="news-stories__link">Подробнее</a>
                    </article>

                    <script>
                        window.addEventListener('DOMContentLoaded', function(){
                            // Все статьи 
                            var allArticles = document.querySelectorAll(`[data-article='Статья'] `);
                            
                            // Все новости
                            var allNews = document.querySelectorAll(`[data-article='Новость'] `);

                            // Все акции
                            var allActions = document.querySelectorAll(`[data-article='Акция'] `);

                            allNews.forEach(function(eachNews){  //Отключаем новости       
                                eachNews.style.display = 'block';                        
                            });
                            
                            allActions.forEach(function(eachAction){  //Отключаем акции
                                eachAction.style.display = 'none';
                            });

                            allArticles.forEach(function(eachArticle){  //Включаем статьи
                                eachArticle.style.display = 'none';
                                }); 
                        });
                    </script>

                    <?php }                         
                    
                    } else { ?>
                        <p class="news__subheading">Статьи не добавлены</p>
                    <?php }                  
                    
                    wp_reset_postdata(); // сброс
                    ?>
                </div>
            </div>
        </div>
    </section>



<?php ?>