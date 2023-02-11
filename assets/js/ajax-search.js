jQuery(function($) {
    $('.left-top__form input[name="s"]').on('keyup', function(){

        // Задаём переменную поиска по вводу на клавиатуре
        var search= $('.left-top__form input[name="s"]').val(); 
        
        

        // Ограничим чтобы поиск начинался после ввода 3-х символов, а не сразу
        
        if(search.length < 3) {
            return false;
        }

        // console.log(search);

        let data = {
            s:search,
            action: 'search-ajax',
            nonce: search_form.nonce
        }

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            data:data,
            type: 'POST',
            dataType: 'json',
            beforeSend: function(xhr) {
                $('.result-search .result-search-list').fadeOut(); // Скроем блок результатов
                $('.result-search .result-search-list').empty(); // Очистим блок результатов
                $('.result-search .preloader').show(); // Покажем загрузчик
            },
            sucсess: function(data) {
                // console.log(data);
                $('.result-search').html(data.out);

                $('.result-search .preloader').hide(); // Скроем загрузчик
                $('.result-search .result-search-list').fadeIn().html(data); // Покажем блок результатов и добавим в него полученные данные
					

                var heightResult = $('.for-form.result-search').height();
                $('.for-form').css('height', heightResult);
            }
        });

        
    });
});