// 4. Сделайте рефакторинг кода для работы с API чужого сервиса ...

function printOrderTotal2(responseString) {
    try {
        let responseJSON = JSON.parse(responseString);
        let orderSubtotal = 0;
        responseJSON.forEach((item, index) => {
            let price = parseFloat(item.price);
            orderSubtotal += price;
        });
        console.log( 'Стоимость заказа: ' + (orderSubtotal > 0 ? orderSubtotal + ' руб.': 'Бесплатно'));
    } catch (e) {
        console.error(e);
    }
}

let Json = JSON.stringify([{"price": 5}, {"price": -17}, {"price": 25}]);
printOrderTotal2(Json);