-- users — контрагенты
-- id
-- name
-- phone
-- email
-- created — дата создания записи
-- orders — заказы
-- id
-- subtotal — сумма всех товарных позиций
-- created — дата и время поступления заказа (Y-m-d H:i:s)
-- city_id — город доставки
-- user_id
--
-- Необходимо выбрать одним запросом следующее (следует учесть, что будет включена опция only_full_group_by в MySql):
-- Имя контрагента
-- Его телефон
-- Сумма всех его заказов
-- Его средний чек
-- Дата последнего заказа


SELECT users.name, users.phone, SUM(orders.subtotal) as subtotal, avg(orders.subtotal) as average, MAX(orders.created)
FROM test.users as users
LEFT JOIN test.orders as orders on orders.user_id = users.id
group by users.name,  users.phone
order by users.name,  users.phone asc;