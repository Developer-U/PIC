jQuery (function($) {
	// Калькулятор подсчёта итоговой стоимости при изменении переменных

	/*------------------------------------------*/

	// Вначале объявим глобально переменные для итогового подсчёта

	var value = 7;   // Количество углов по умолчанию
	var valuePrOne = 100;  // Стоимость одного угла
	var valuePr = 7 * valuePrOne;  // Стоимость углов

	var value2 = 2;  // Количество труб
	var value2PrOne = 50;  // Стоимость одной трубы
	var value2Pr = 2 * value2PrOne;  // Стоимость труб

	var value3 = 10;  // Количество светильников
	var value3PrOne = 150;  // Стоимость одного светильника
	var value3Pr = 10 * value3PrOne;  // Стоимость светильников

	var value4 = 1;  // Количество люстр
	var value4PrOne = 1000;  // Стоимость одной люстры
	var value4Pr = 1 * value4PrOne;  // Стоимость всех люстр

	var square = 20 +'м/2';  // Площадь потолка с ползунка

	var price = $('input[type="radio"].price'); // price - переменная где хранится стоимость материала
	var priceEach = 100; // Объявляем переменную значения суммы нужного флажка
	var svetBtn = $('input[type="radio"].pod'); // переменная инпута выбранной подсветки

	// material - переменная значение флажка выбора материала 
	var material = price.attr('data-name');
	
	// number - переменная значение флажка выбора подсветки
	var number = svetBtn.attr('date-name');
	
	for (var i = 0; i < price.length; i++) { // С помощью цикла итерируем значения флажков материала
		$(price[i]).click(function() {
			priceEach = this.value; 
			material = this.getAttribute('data-name');			
			recount();
			
		});
	}

	var pod = $('input[type="radio"].pod'); // price - переменная где хранится стоимость Подсветки
	var podEach = 1000;
	var pod_total = podEach;

	for (var i = 0; i < pod.length; i++) { // С помощью цикла итерируем значения флажков подсветки
		$(pod[i]).click(function() {			
			podEach = this.value;
			pod_total = podEach;
			
			number = this.getAttribute('date-name');
			recount();
			
			$('#pod_title').html(pod_total + ' ₽/п.м.');        

			$('#pod_name').html(number);			
		});
	}

	// pod - переменная флажок выбора подсветки

	// var pod = document.querySelectorAll('input[type="radio"].pod');
	// for (var i = 0; i < pod.length; i++) {
	// 	pod[i].addEventListener('click', function (event){
	// 		pod = this.value;
	// 		pod_total = pod;

	// 		// number - переменная значение флажка выбора подсветки
			
	// 		recount();

	// 		document.querySelector('#pod_title').innerHTML = pod_total + ' ₽/п.м.';        

	// 		document.querySelector('#pod_name').innerHTML = number;
	// 	});
	// }

	var total_price = 3400 +'₽/м2';
	

	var total_pod;

	/*------------------------------------------*/
	

	// Сначала делаем произвольные кнопки добавления углов, труб, светильников и люстр
	// И получаем переменные - итоговое количество
    
	// 1. Количество углов

	$( 'body' ).on( 'click', 'button.js-minus1, button.js-plus1', function() {
		var qty = $('body').parent().find( 'input[title="Qty"]' ),
		val = parseInt( qty.val() ),
		
		min = parseInt( qty.attr( 'min' ) ),
		max = parseInt( qty.attr( 'max' ) ),
		step = parseInt( qty.attr( 'step' ) );       			

		
		// дальше меняем значение количества в зависимости от нажатия кнопки Плюс и минус
		if ( $( this ).is( '.plus' ) ) {
			if ( max && ( max <= val ) ) {
				qty.val( max );
			} else {				
				qty.val( val + step );

				// value - итоговое количество углов
				value = val + step;

				valuePr = Number(value) * Number(valuePrOne); // Стоимость углов

				// Каждый раз при изменении глобальных переменных в локальной функции
				// вызываем функцию пересчёта
				recount();
			}
		} else {
			if ( min && ( min >= val ) ) {
				qty.val( min );
			} else if ( val > 1 ) {
				qty.val( val - step );
				value = val - step;

				valuePr = Number(value) * Number(valuePrOne); // Стоимость углов
				
				// Каждый раз при изменении глобальных переменных в локальной функции
				// вызываем функцию пересчёта
				recount();
			}
		}
		
			
    });

	
	// 2. Количество труб

    $( 'body' ).on( 'click', 'button.js-minus2, button.js-plus2', function() {
		var qty2 = $('body').parent().find( 'input[title="Pipes"]' ),
		val2 = parseInt( qty2.val() ),
		min2 = parseInt( qty2.attr( 'min' ) ),
		max2 = parseInt( qty2.attr( 'max' ) ),
		step2 = parseInt( qty2.attr( 'step' ) );       			

		// дальше меняем значение количества в зависимости от нажатия кнопки Плюс и минус
		if ( $( this ).is( '.plus' ) ) {
			if ( max2 && ( max2 <= val2 ) ) {
				qty2.val( max2 );
			} else {
				qty2.val( val2 + step2 );

				// value2 - итоговое количество труб
				value2 = val2 + step2;
				value2Pr = Number(value2) * Number(value2PrOne);
				recount();
			}
		} else {
			if ( min2 && ( min2 >= val2 ) ) {
				qty2.val( min2 );
			} else if ( val2 > 1 ) {
				qty2.val( val2 - step2 );
				value2 = val2 - step2;
				value2Pr = Number(value2) * Number(value2PrOne);
				recount();
			}
		}	
    });


	// 3. Количество светильников

    $( 'body' ).on( 'click', 'button.js-minus3, button.js-plus3', function() {
		var qty3 = $('body').parent().find( 'input[title="light"]' ),
		val3 = parseInt( qty3.val() ),
		min3 = parseInt( qty3.attr( 'min' ) ),
		max3 = parseInt( qty3.attr( 'max' ) ),
		step3 = parseInt( qty3.attr( 'step' ) );      			

		
		if ( $( this ).is( '.plus' ) ) {
			if ( max3 && ( max3 <= val3 ) ) {
				qty3.val( max3 );
			} else {
				qty3.val( val3 + step3 );

				// value3 - итоговое количество светильников
				value3 = val3 + step3;
				value3Pr = Number(value3) * Number(value3PrOne);

				recount();
			}
		} else {
			if ( min3 && ( min3 >= val3 ) ) {
				qty3.val( min3 );
			} else if ( val3 > 1 ) {
				qty3.val( val3 - step3 );
				value3 = val3 - step3;
				value3Pr = Number(value3) * Number(value3PrOne);
				recount();
			}
		}	
    });


	// 4. Количество люстр

    $( 'body' ).on( 'click', 'button.js-minus4, button.js-plus4', function() {
		var qty4 = $('body').parent().find( 'input[title="bra"]' ),
		val4 = parseInt( qty4.val() ),
		min4 = parseInt( qty4.attr( 'min' ) ),
		max4 = parseInt( qty4.attr( 'max' ) ),
		step4 = parseInt( qty4.attr( 'step' ) ); 
		
		if ( $( this ).is( '.plus' ) ) {
			if ( max4 && ( max4 <= val4 ) ) {
				qty4.val( max4 );
			} else {
				qty4.val( val4 + step4 );

				// value4 - итоговое количество люстр
				value4 = val4 + step4;
				value4Pr = Number(value4) * Number(value4PrOne);
				recount();				
			}
		} else {
			if ( min4 && ( min4 >= val4 ) ) {
				qty4.val( min4 );
			} else if ( val4 > 0 ) {
				qty4.val( val4 - step4 );
				value4 = val4 - step4;
				value4Pr = Number(value4) * Number(value4PrOne);
				recount();
			}
		}	
    });

	
	
	// Подключаем ionSlider (! он работает только на jQuery!) Документация http://ionden.com/a/plugins/ion.rangeSlider/start.html
	// Задаём ему параметры

	var $range = $(".js-range-slider");

	$range.ionRangeSlider({
		min: 0,
		max: 60,
		from: 20,
		
		onFinish: function (data) {
		// Это коллбэк-функция, которая вызывается, когда мы уже выбрали нужное значение
		// в ползунке и мышка остановилась (все 4 функции смотри по ссылке выше)

		
		// 1. square - переменная площадь потолка
		square = data.from + 'м/2';	
		
		recount();
		},     
	});

	
	// Собственно, сама функция пересчёта
	const recount = () => {
		
		// Расчёт итоговой цены потолка за кв.м
		total_price = Number(priceEach) + Number(valuePr) + Number(value2Pr) + Number(value3Pr) + Number(value4Pr) + ' ₽/м2'; 
		// console.log(total_price);
		$('#total').html(total_price);

		// Расчёт итоговой цены подсветки за пог.м
		total_pod = Number(podEach) + ' ₽/п.м';
		// console.log(total_price);
		$('#pod_title').html(total_pod);
	}

	// Присвоим форме ID
	var zakazForm = document.querySelector('#zakazForm form');
	zakazForm.setAttribute('id','formCalc')

	

	$('#formCalc').on('submit', function(e) {
		e.preventDefault();

		// Получаем значение поля Имя клиента из формы Сontact Form7
		var client_name_field = document.querySelector('#client_calc_name');
		var client_name = client_name_field.value;
		console.log(client_name);

		// Получаем значение поля Телефон клиента из формы Сontact Form7
		var client_phone_field = document.querySelector('#client_calc_phone');
		var client_phone = client_phone_field.value;

		let data = {
			square,	
			material,
			number,		            
			value,
			value2,
			value3,
			value4,
			client_name,
			client_phone,
			total_price,
            action: 'calc-ajax'            
        }

		$.ajax({
			url: '/wp-content/themes/e-store/post.php',
			method: 'post',
			dataType: 'json',
			data: data,
			success: function(data){
			  console.log(data);
			}
		});
	});

	

});