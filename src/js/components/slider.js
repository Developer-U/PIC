window.addEventListener('DOMContentLoaded', function(){ 

  // Слайдер в блоке расчета цен в мобильной версии
  new Swiper('.prices-slider', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    spaceBetween: 16,
    slidesPerView: 3,
    centeredSlides: true,
    freeMode: true,
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    }  
  });


  // Слайдер потолков на главной

  

  new Swiper('.potolok-slider', {    
    direction: 'horizontal',
    loop: true,
    slidesPerView: 3,   
    spaceBetween: 16,  
    centeredSlides: true,  
    speed: 700, 
    lazy: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }, 
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },      
    
    
    keyboard: {       
      enabled: true,       
      pageUpDown: true,
    },

    freeMode: {
        enabled: true,
    },

    breakpoints: {
      // when window width is >= 768px
      768: {
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
            renderBullet: function (index, className) {
              return '<span class="' + className + '">' + (menu[index]) + '</span>';
            },
        }, 
        centeredSlides: false,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        }, 
        spaceBetween: 30,  
        slidesPerView: 1,
      }
    }
  });

  // Слайдер в блоке текстовых отзывов на странице Отзывы
  new Swiper('.text-reviews-slider', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    spaceBetween: 16,
    slidesPerView: 2, 
    observer: true,
    observeParents: true,
    parallax:true, 
    infinite:true,    
  
    navigation: {   
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    
    breakpoints: {    
      768: {
        slidesPerView: 3,
      },

      1400: {
        slidesPerView: 4,
      }
    }
  });

});