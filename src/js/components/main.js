import gsap from "gsap";


window.addEventListener('DOMContentLoaded', function(){
  
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


  // Открытие бургерного меню
  var menu = document.querySelector('.main-menu')
  ,burger = document.querySelector('.burger')
  ,burgerClose = document.querySelector('.burger.open')
  ,flag = false; 


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
  

  // Скроллинг
  document.querySelectorAll('.js-scroll').forEach(el => {
    new SimpleBar(el), {
      autoHide: false,
      scrollbarMaxSize: 300
    }
  });


  // Анимация открытия списка городов

  const listOfCity = document.querySelector('.left-top__choose');
  const cityOpen = document.querySelector('.left-top__link');
  const cityClose = document.querySelector('.left-top__btn');

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
    
    cityClose.onclick = function() {
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

  if(availableScreenWidth >= '768' && availableScreenWidth < '1199') {
    tl2.fromTo(searchField, {display: 'none', right: '-202%'}, {duration:1.2, ease: "power3.in", display: 'block', right: '80px'});
  } else if (availableScreenWidth < '768') {    
    tl2.fromTo(searchField, {display: 'none', right: '-202%'}, {duration:1.2, ease: "power3.in", display: 'block', right: 0});
  }
  searchFieldOpen.onclick = function(){
    tl2.play();
  }

  document.querySelector('.search-box__close').addEventListener('click', function() {
    tl2.reverse();
  });

  
 
  // Табы в блоке Готовые решения / Solutions

  // Проитерируем кнопки выбора табов
  document.querySelectorAll('.solutions-list__link').forEach(function(tabsBtn5){
    tabsBtn5.addEventListener('click', function(event){
      event.preventDefault();

      
      const path5 = event.currentTarget.dataset.path5;

      
      document.querySelectorAll('.solutions-list__link').forEach(function(oneTab5){
        oneTab5.classList.remove('link-active');
      });

      document.querySelector(`[data-path5='${path5}']`).classList.add('link-active');      
        

      // Итерируем табы и закрываем все открытые табы
      document.querySelectorAll('.solutions__art').forEach(function(tabContent5){
        tabContent5.classList.remove('solutions-article-active');
                
        var firstSolTab = document.querySelector('.solutions__art:first-of-type');
       
        firstSolTab.style.display = 'none';
      
        var currentSolTab = document.querySelector(`[data-target5="${path5}"]`);

        
        if(currentSolTab.getAttribute('data-target5') == firstSolTab.getAttribute('data-target5')) {
          firstSolTab.style.display = 'flex';
        } else {
          firstSolTab.style.display = 'none';
  
          currentSolTab.classList.add('solutions-article-active');
        }

      });
    });

  });

  // Открытие попапов с кнопки "Подробнее" в Solutions

// Проитерируем кнопки выбора табов
document.querySelectorAll('.solutions-gallery__btn').forEach(function(solBtn){
  solBtn.addEventListener('click', function(event){
    event.preventDefault();
    
    const btn = event.currentTarget.dataset.btn;

    var tl3 = gsap.timeline({paused:true}); 

            
    var currentSolArt = document.querySelector(`[data-targetSol="${btn}"]`);      

    tl3.to(currentSolArt, {duration:1, delay:0,  ease: "circ.out", x: 0}, '<0.5');

    tl3.play(); 

    document.querySelectorAll('.one-sol-more__close').forEach(function(closeBtn){
      closeBtn.addEventListener('click', function(event){
        event.preventDefault();
    
        tl3.reverse();
      });
    });
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


  // Всплытие окна Спасибо после отправки формы
  document.addEventListener( 'wpcf7mailsent', function( event ) {    
            
      document.querySelector('.popup-thanks').classList.add('thanks-active'); 
      
      setTimeout(() => {
        document.querySelector('.popup-thanks').classList.remove('thanks-active'); 
      }, 2500 );  

  }, false );  

  var noLink = document.querySelectorAll('.woocommerce-product-gallery__image a');

  noLink.forEach(function(noEachLink){
    noEachLink.setAttribute('href', '');

    noEachLink.addEventListener('click', function(e){
      e.preventDefault();
    });
  });    
 

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
      });
  });


  // Всплытие окна Спасибо после отправки формы заказать замерщика
  document.querySelector('#zamerForm').addEventListener( 'wpcf7mailsent', function( event ) {

  document.querySelector('.popup-thanks').classList.add('thanks-active'); 
          
  fadeOut(zamerField, 300);    
      document.querySelector('body').classList.remove('closed');  

  setTimeout(() => {
      document.querySelector('.popup-thanks').classList.remove('thanks-active'); 
  }, 2500 );  

  }, false );


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
  
  

});

jQuery (function($) {
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

  

  var priceCurrency = $('.woocommerce-Price-currencySymbol');
  priceCurrency.append('/м2');

});