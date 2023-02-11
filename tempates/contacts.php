<?php
/*
Template Name: Контакты
*/
get_header();
?>

    <main class="main container-fluid2  row">
    
        <?php get_sidebar(); ?>

        <div class="main-content col">
            <section class="reviews-page">
                <?php estore_add_breadcrumbs( );?>

                <div class="container-fluid2 about__contain blog__contain contacts row justify-content-between align-items-stretch">
                    <div class="reviews-page__main contacts__main">
                        <h1 class="pages-heading contacts__heading">
                            <?php the_title(); ?>
                        </h1> 
        
                        <div class="blog__main blog-main container row">
                            <div class="contacts__left col-lg-8 col-12">                                
                                <?php the_content(); ?>                               
                              
                                <ul class="contacts__list contacts-list row">
                                    <li class="contacts-list__item col-xl-6 col-12">
                                        <h3 class="contacts-list__heading">
                                            Линия консультаций
                                        </h3>
        
                                        <p class="contacts-list__text">
                                            По любому вопросу вы можете обратиться к нашему боту в телеграмм, вайбер или скайп, 
                                            он адресует ваше сообщение доступному сотруднику
                                        </p>
                                    </li>
        
                                    <li class="contacts-list__item col-xl-6 col-12">
                                        <h3 class="contacts-list__heading">
                                            Email
                                        </h3>
        
                                        <a href="mailto:<?php the_field('email_title', 'options'); ?>" class="contacts-list__link"><?php the_field('email_title', 'options'); ?></a>
                                    </li>
        
                                    <li class="contacts-list__item col-xl-6 col-12">
                                        <div class="contacts-list__box">
                                            <h3 class="contacts-list__heading">
                                                Телефоны
                                            </h3>
            
                                            <a class="contacts-list__link" href="tel:+7<?php the_field('phone_link_24', 'options'); ?>"><?php the_field('phone_num_24', 'options'); ?> - круглосуточно.</a>
        
                                            <p class="contacts-list__text">
                                                Если звонок по заказу - пожалуйста звоните с номера, который указан как контактный 
                                                телефон при оформлении заказа. Это очень ускорит решение вашего вопроса.
                                            </p>
                                        </div>   
        
                                        <div class="contacts-list__box">
                                            <a class="contacts-list__link" href="tel:+7<?php the_field('phone_contacts_link', 'options'); ?>"><?php the_field('phone_contacts_num', 'options'); ?> - с 9.00 до 21.00</a>
        
                                            <p class="contacts-list__text">
                                                Смс, телеграмм, вибер, воцап&nbsp;&mdash; по&nbsp;срокам&nbsp;получения&nbsp;заказа
                                            </p>
                                        </div>                              
                                    </li>
        
                                    <li class="contacts-list__item col-xl-6 col-12">
                                        <div class="contacts-list__box">
                                            <h3 class="contacts-list__heading">
                                                Back-офис
                                            </h3>
            
                                            <p class="contacts-list__link"><?php the_field('back_office_address', 'options'); ?></p>
        
                                            <p class="contacts-list__text">
                                                Cамовывоз из офиса не осуществляется, здесь находятся подразделения, которые обслуживают 
                                                основные процессы проекта - закупки, бухгалтерия, логистика.
                                            </p>
                                        </div>  
                                    </li>
                                </ul>
                            </div>
        
                            <div class="contacts__right col">
                                <h3 class="contacts-list__heading contacts-list__heading_right">
                                    Наши страницы в&nbsp;соцсетях
                                </h3>
        
                                <ul class="contacts__social contacts-social row justify-content-between">
                                    <li class="contacts-social__item">
                                        <a href="<?php the_field('vk_link', 'options'); ?>" class="footer-social__link">
                                            <svg class="footer-social__img contacts-social__img">
                                                <use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icons/sprite.svg#vk"></use>                                                   
                                            </svg>
                                        </a>
                                    </li>
                
                                    <li class="contacts-social__item">
                                        <a href="https://t.me/<?php the_field('telegram_link', 'options'); ?>" class="footer-social__link">
                                            <svg class="footer-social__img contacts-social__img">
                                                <use xlink:href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/icons/sprite.svg#telegram"></use>                                                   
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
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

<?php
get_footer(); ?>