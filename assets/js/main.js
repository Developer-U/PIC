window.addEventListener('DOMContentLoaded', function(){  

  document.querySelectorAll('.js-scroll').forEach(el => {
    new SimpleBar(el), {
      autoHide: false,
      scrollbarMaxSize: 300
    }
  });


  // Анимация открытия списка городов

  const listOfCity = document.querySelector('.left-top__choose');
  const cityOpen = document.querySelector('.left-top__link');

  var tl = gsap.timeline({paused:true}); 

  tl.to(listOfCity, {duration:0.7, ease: "power3.in", opacity:1, display: 'block'});

  cityOpen.onclick = function(e){
    e.preventDefault();
    tl.play();
  }

  document.querySelectorAll('.left-top__one').forEach(function(oneItem){
    oneItem.onclick = function() {
      tl.reverse();
    }    
  });


  // Анимация открытия поля поиска
  const searchField = document.querySelector('.for-form');
  const searchFieldOpen = document.getElementById('searchOpen');


  var tl2 = gsap.timeline({paused:true}); 

  // Определим параметры анимации всплывания поля поиска в зависимости
  // от ширины экрана устройства:

  // Ширина активного окна устройства:
  var availableScreenWidth = window.screen.availWidth;

  if(availableScreenWidth >= '992' && availableScreenWidth < '1199') {
    tl2.fromTo(searchField, {display: 'none', x: '202%'}, {duration:1.2, ease: "power3.in", display: 'block', x: '70%'});
  } else if (availableScreenWidth < '992') {    
    tl2.fromTo(searchField, {display: 'none', x: '202%'}, {duration:1.2, ease: "power3.in", display: 'block', x: 0});
  }
  searchFieldOpen.onclick = function(){
    tl2.play();
  }

  document.querySelector('.search-box__close').addEventListener('click', function() {
    tl2.reverse();
  });

  // Создаём плавность анимации появления мобильного меню
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

  

  // Открытие попапа Заказать замерщика  

  var zamerField = document.querySelector('.js-zamerPopup');
  var zamerFieldOpen = document.querySelectorAll('.js-buttonZamer'); 
  var zamerClose = document.querySelector('.js-zamerClose'); 
  var flag = false;  

  zamerFieldOpen.forEach(function(zamerOpen){
    zamerOpen.addEventListener('click', function(){      
      if(!flag) {
        fadeIn(zamerField, 300, 'flex');
             
        document.querySelector('body').classList.add('closed');
  
      } else {
        fadeOut(zamerField, 300);
       
        document.querySelector('body').classList.remove('closed');
      }
      
      zamerClose.addEventListener('click', function(){
        fadeOut(zamerField, 300);
   
        document.querySelector('body').classList.remove('closed'); 
      });
  
      zakazGo.addEventListener('click', function(){
        fadeOut(zamerField, 300);
     
        document.querySelector('body').classList.remove('closed'); 
      });
      
    });
  });

  
  
  
  // Открытие бургерного меню
  var menu = document.querySelector('.main-menu')
    ,burger = document.querySelector('.burger')
    ,burgerClose = document.querySelector('.burger.open');
 

  burger.addEventListener('click', function(){      
    if(!flag) {
        fadeIn(menu, 300, 'block');
        flag = true; 
    } else {
        fadeOut(menu, 300);
        flag = false;        
    }       

    burger.classList.toggle('open');

    // Скрытие меню при нажатии на один из пунктов меню

    document.querySelectorAll('.main-menu__link').forEach(function(oneItem){
      oneItem.addEventListener('click', function(){       

          fadeOut(menu, 300);
          flag = false;                
          burger.classList.remove('open');
      });
    });

    document.querySelectorAll('.mobile-menu__link').forEach(function(oneLink){
      oneLink.addEventListener('click', function(){     

          fadeOut(menu, 300);
          flag = false;                
          burger.classList.remove('open');
      });
    });
    
  });

  // Появление фильтров в разделе "Каталог" основного меню в мобильной версии

  const filterList = document.querySelector('.main-menu__contain')
       ,openFilterList = document.querySelector('.js-openFilters');

  openFilterList.addEventListener('click', function(e){ 
    e.preventDefault();     
    filterList.classList.toggle('opened');

    document.querySelectorAll('.main-menu__link').forEach(function(oneLink){
      oneLink.addEventListener('click', function(){
          fadeOut(filterList, 300);
        
      });
    });
  });


  // Табы в блоке выбора потолков на главной странице

  // Проитерируем кнопки выбора табов
  document.querySelectorAll('.prices-list__link').forEach(function(tabsBtn){
    tabsBtn.addEventListener('click', function(event){
      event.preventDefault();

      // Зададим константу атрибута data-path у кнопок
      const path = event.currentTarget.dataset.path;

      // Проитерируем все ссылки и при клике снимем все активные значения
      document.querySelectorAll('.prices-list__link').forEach(function(oneTab){
        oneTab.classList.remove('link-active');
      });

      // Соответствующей кнопке зададим активное значение
      document.querySelector(`[data-path='${path}']`).classList.add('link-active');      
        

      // Итерируем табы и закрываем все открытые табы
      document.querySelectorAll('.prices-article').forEach(function(tabContent){
        tabContent.classList.remove('prices-article-active');

        // Зададим в переменную первый Таб (в стилях делаем первый элемент открытым)        
        var firstPriceTab = document.querySelector('.prices-article:first-of-type');

        // Соответственно при клике на любую кнопку его сразу закрываем
        firstPriceTab.style.display = 'none';

        // Закинем в переменную текущий Таб с соответствующим атрибутом data-target       
        var currentTab = document.querySelector(`[data-target="${path}"]`);

        // console.log(currentTab.getAttribute('data-target') );

        // console.log(firstPriceTab.getAttribute('data-target') );

        // Зададим условие: если атрибут data-target текущего таба соответствует первому Табу, то есть
        // если это и есть первый Таб, открываем его, если нет - держим закрытым и открываем соответствующий
        if(currentTab.getAttribute('data-target') == firstPriceTab.getAttribute('data-target')) {
          firstPriceTab.style.display = 'flex';
        } else {
          firstPriceTab.style.display = 'none';
  
          currentTab.classList.add('prices-article-active');
        }

      });      

      
    });

  });

  

  // Код пагинации на странице Видеоотзывы (Отзывы)

  document.querySelectorAll('.js-links2').forEach(function(pagLink){
    pagLink.addEventListener('click', function(event2){
      event2.preventDefault();
      const path2 = event2.currentTarget.dataset.path2;

      document.querySelectorAll('.js-links2').forEach(function(oneLink){
        oneLink.classList.remove('black');
      });

      document.querySelector(`[data-path2='${path2}']`).classList.add('black');

      document.querySelectorAll('.article-rew').forEach(function(pagArticle){
        pagArticle.classList.remove('article-rew-active');
      });

      document.querySelector(`[data-target2="${path2}"]`).classList.add('article-rew-active');
    });

  });

  // Табы переключения типов отзывов на странице Отзывы

  document.querySelectorAll('.list-rew__link').forEach(function(tabs3Btn){
    tabs3Btn.addEventListener('click', function(event){
      event.preventDefault();
      const path3 = event.currentTarget.dataset.path3;

      document.querySelectorAll('.list-rew__link').forEach(function(oneTab3){
        oneTab3.classList.remove('link-rew-active');
      });

      document.querySelector(`[data-path3='${path3}']`).classList.add('link-rew-active');

      document.querySelectorAll('.reviews-page__page').forEach(function(tabContent3){
        tabContent3.classList.remove('reviews-page-active');
      });

      document.querySelector(`[data-target3="${path3}"]`).classList.add('reviews-page-active');
    });

  });


   // Код пагинации на странице Наши клиенты (Отзывы)

   document.querySelectorAll('.js-links4').forEach(function(pagLink4){
    pagLink4.addEventListener('click', function(event4){
      event4.preventDefault();
      const path4 = event4.currentTarget.dataset.path4;

      document.querySelectorAll('.js-links4').forEach(function(oneLink4){
        oneLink4.classList.remove('black');
      });

      document.querySelector(`[data-path4='${path4}']`).classList.add('black');

      document.querySelectorAll('.article-text-rew').forEach(function(pagArticle){
        pagArticle.classList.remove('article-rew-active');
      });

      document.querySelector(`[data-target4="${path4}"]`).classList.add('article-rew-active');
    });

  });


  // Открытие попапа Login/Password Логин пароль

  var loginField = document.querySelector('.js-loginPopup');
  var loginToOpen = document.querySelectorAll('.js-openLogin'); 
  var loginClose = document.querySelector('.js-loginClose'); 
  var flag = false;            
  
  loginToOpen.forEach(function(openLogBtn){
    openLogBtn.addEventListener('click', function(e){ 
      e.preventDefault();     
      if(!flag) {
      fadeIn(loginField, 300, 'flex');
              
      document.querySelector('body').classList.add('closed');

      } else {
      fadeOut(loginField, 300);
      
      document.querySelector('body').classList.remove('closed');
      }
      
      loginClose.addEventListener('click', function(){
        fadeOut(loginField, 300);

        document.querySelector('body').classList.remove('closed'); 
      });

      loginField.addEventListener('click', function(event){
        if(this == event.target) {
          fadeOut(loginField, 300);

          document.querySelector('body').classList.remove('closed');
        }         
      });
  });
  });
  


  jQuery (function($) { 

    // Ползунок цены в калькуляторе

    $("#range").ionRangeSlider({
      min: 0,
      max: 377,
      from: 60
    });

    // Аккордеоны 

    $( "#accordion" ).accordion({
      collapsible: true,      
      heightStyle: 'content',     
	    header: '> .accordion-item > .accordion-header',
      animate: 700
    });

    $( "#accordion2" ).accordion({
      collapsible: true,
      active: false,
      heightStyle: 'content',
      animate: 700
    });

    $( "#accordion3" ).accordion({
      collapsible: true,     
      heightStyle: 'content',
      animate: 700
    });

    $( "#accordion4" ).accordion({
      collapsible: true,
      // active:2,      
      heightStyle: 'content',     
	    header: '> .accordion-item > .accordion-header',
      animate: 600
    });

    $( "#accordion5" ).accordion({
      collapsible: true,
      active: 2,      
      heightStyle: 'content',     
	    header: '> .accordion-item > .accordion-header',
      animate: 600
    });

    $( "#accordion6" ).accordion({
      collapsible: true,      
      heightStyle: 'content',     
	    header: '> .accordion-item > .accordion-header',
      animate: 700
    });

    $( "#accordion7" ).accordion({
      collapsible: true,      
      heightStyle: 'content',     
	    header: '> .accordion-item > .accordion-header',
      animate: 700
    });

  });

});