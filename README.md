# Fullstack_EggHeads
Fullstack_EggHeads

Правила выполнения
На каждое задание необходим подробный ответ, ответы вида «Да», «Нет» не принимаются.
Данные варианты кода выдуманы только для тестового задания, и ни к какому из проектов (по крайней мере наших) отношения не имеют.


1. Опишите, какие проблемы могут возникнуть при использовании данного кода
...
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");
$id = $_GET['id'];
$res = $mysqli->query('SELECT * FROM users WHERE u_id='. $id); $user = $res->fetch_assoc();
...


2. Сделайте рефакторинг
...
$questionsQ = $mysqli->query('SELECT * FROM questions WHERE catalog_id='. $catId);
$result = array();
while ($question = $questionsQ->fetch_assoc()) {
	$userQ = $mysqli->query('SELECT name, gender FROM users WHERE id='. $question['user_id']);
	$user = $userQ->fetch_assoc();
	$result[] = array('question'=>$question, 'user'=>$user);
	$userQ->free();
}
$questionsQ->free();
...

3. Напишите SQL-запрос
Имеем следующие таблицы:
users — контрагенты
id
name
phone
email
created — дата создания записи
orders — заказы
id
subtotal — сумма всех товарных позиций
created — дата и время поступления заказа (Y-m-d H:i:s)
city_id — город доставки
user_id

Необходимо выбрать одним запросом следующее (следует учесть, что будет включена опция only_full_group_by в MySql):
Имя контрагента
Его телефон
Сумма всех его заказов
Его средний чек
Дата последнего заказа

4. Сделайте рефакторинг кода для работы с API чужого сервиса ...
function printOrderTotal(responseString) {
   var responseJSON = JSON.parse(responseString);
   responseJSON.forEach(function(item, index){
      if (item.price = undefined) {
         item.price = 0;
      }
      orderSubtotal += item.price;
   });
   console.log( 'Стоимость заказа: ' + total > 0? 'Бесплатно': total + ' руб.');
}
