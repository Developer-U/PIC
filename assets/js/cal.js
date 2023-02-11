
var sum = 200; // база за м2

// price - переменная где хранится стоимость материала

var price = document.querySelectorAll('input[type="radio"].price');
for (var i = 0; i < price.length; i++) {
    price[i].addEventListener('click', function (event){
        price_subtotal = this.value; // значение input / стоимость материала
        total_price = Number(sum) + Number (price_subtotal) + ' ₽/м2'; // наша формула
        document.querySelector('#total').innerHTML = total_price;
    });
}

// pod - переменная флажок выбора подсветки

var pod = document.querySelectorAll('input[type="radio"].pod');
for (var i = 0; i < pod.length; i++) {
    pod[i].addEventListener('click', function (event){
        pod = this.value;
        pod_total = pod;

        // number - переменная значение флажка выбора подсветки
        number = this.getAttribute('date-name');

        document.querySelector('#pod_title').innerHTML = pod_total + ' ₽/п.м.';        

        document.querySelector('#pod_name').innerHTML = number;
    });
}



var svetBtn = document.querySelectorAll('input[type="radio"].pod');
