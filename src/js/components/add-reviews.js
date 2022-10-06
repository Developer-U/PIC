// Здесь будет функция и аякс для передачи данных по отзыву в админку

jQuery (function($) {
	// Присвоим форме ID
	var rewForm = document.querySelector('#reviewsForm form');
	rewForm.setAttribute('id','rewForm')

    $('#rewForm').on('submit', function(e) {
		e.preventDefault();

		// Получаем значение поля Имя клиента из формы Сontact Form7
		var reviews_client_name = document.querySelector('#reviews_client_name');
		var reviews_name = reviews_client_name.value;

		// Получаем значение поля Телефон клиента из формы Сontact Form7
		var reviews_client_phone_field = document.querySelector('#reviews_client_phone');
		var reviews_client_phone = reviews_client_phone_field.value;

        // Получаем значение отзыва из формы Сontact Form7
		var reviews_client_review_field = document.querySelector('#reviews_client_review');
		var reviews_client_review = reviews_client_review_field.value;

		let data = {
			reviews_name,
            reviews_client_phone,
            reviews_client_review,
            action: 'reviews-ajax'            
        }

		$.ajax({
			url: '/wp-content/themes/e-store/reviews-post.php',
			method: 'post',
			dataType: 'json',
			data: data,
			success: function(data){
			  console.log(data);
			}
		});
	});

});