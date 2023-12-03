-- Active: 1701592836285@@127.0.0.1@3306@sample
-- 1 Напишите запрос, который выводит все строки из таблицы Покупателей, для которых номер продавца равен 1001.
SELECT *
FROM cust
WHERE snum = 1001;

-- 2 Напишите запрос, который выводит таблицу Продавцов со столбцами в следующем порядке: city, sname, snum, comm.
SELECT city, sname, snum, comm
FROM sal;

-- 3 Напишите запрос, который выводит оценку (rating), сопровождаемую именем каждого покупателя в городе San Jose.
SELECT rating, cname
FROM cust
WHERE city = 'San Jose';

-- 4 Напишите запрос, который выводит значение номера продавца всех продавцов из таблицы Заказов без каких бы то ни было повторений.
SELECT DISTINCT snum
FROM ord;

-- 5 Напишите запрос, который может выдать вам поля sname и city для всех продавцов в Лондоне с комиссионными строго больше 0.11
SELECT sname, city
FROM sal
WHERE city LIKE 'London' AND comm > 0.11;

-- 6 Напишите запрос к таблице Покупателей, который может вывести данные обо всех покупателях с рейтингом меньше или равным 200, если они не находятся в Риме
SELECT *
FROM cust
WHERE rating <= 200 AND city != 'Rome';

-- 7 Запросите двумя способами все заказы на 3 и 5 октября 1990 г.
SELECT *
FROM ord
WHERE odate = '03-OCT-90' OR odate = '05-OCT-90';

SELECT *
FROM ord
WHERE odate IN ('03-OCT-90', '05-OCT-90');

-- 8 Напишите запрос, который может вывести всех покупателей, чьи имена начинаются с буквы, попадающей в диапазон от A до G.
SELECT *
FROM cust
WHERE cname REGEXP '^[A-G]';

-- 9 Напишите запрос, который выберет всех продавцов, имена которых содержат букву e.
SELECT *
FROM sal
WHERE sname LIKE '%e%';

-- 10 Напишите запрос, который сосчитал бы сумму всех заказов на 3 октября 1990 г.
SELECT SUM(amt) AS total_amount
FROM ord
WHERE odate = '03-OCT-90';

-- 11 Напишите запрос, который сосчитал бы сумму всех заказов для продавца с номером 1001
SELECT SUM(amt) AS total_amount
FROM ord
WHERE snum = 1001;

-- 12 Напишите запрос, который выбрал бы наибольший заказ для каждого продавца.
SELECT snum, MAX(amt) AS max_amount
FROM ord
GROUP BY snum;

-- 13 Напишите запрос, который выбрал бы покупателя, чье имя является первым в алфавитном порядке среди имен, заканчивающихся на букву s.
SELECT *
FROM cust
WHERE cname LIKE '%s'
ORDER BY cname
LIMIT 1;

-- 14 Напишите запрос, который выбрал бы средние комиссионные в каждом городе.
SELECT city, AVG(comm) AS avg_commission
FROM sal
GROUP BY city;

-- 15 Напишите запрос, который вывел бы для каждого заказа на 3 октября его номер, стоимость заказа в евро (1$=0.8 евро), имя продавца и размер комиссионных, полученных продавцом за этот заказ.
SELECT ord.onum, ord.amt * 0.8 AS euro_amount, sal.sname, sal.comm
FROM ord
JOIN sal ON ord.snum = sal.snum
WHERE odate = '03-OCT-90';

-- 16 Напишите запрос, который выводит номера заказов в возрастающем порядке, а также имена продавцов и покупателей заказов, продавец которых находится в Лондоне или Риме.
SELECT ord.onum, sal.sname AS seller_name, cust.cname AS customer_name
FROM ord
JOIN sal ON ord.snum = sal.snum
JOIN cust ON ord.cnum = cust.cnum
WHERE sal.city IN ('London', 'Rome')
ORDER BY ord.onum ASC;

-- 17 Запросите имена продавцов в алфавитном порядке, суммарные значения их заказов, совершенных до 5 октября, и полученные комиссионные.
SELECT sal.sname AS seller_name, SUM(ord.amt) AS total_order_amount, sal.comm AS commission
FROM sal
JOIN ord ON sal.snum = ord.snum
WHERE ord.odate < '05-Oct-90'
GROUP BY sal.sname, sal.comm
ORDER BY sal.sname ASC;

-- 18 Выведите номера заказов, их стоимость и имена продавцов и покупателей, если продавцы и покупатели находятся в городах, чьи названия начинаются с букв из диапазона от L до R.
SELECT ord.onum, ord.amt, sal.sname AS seller_name, cust.cname AS customer_name
FROM ord
JOIN sal ON ord.snum = sal.snum
JOIN cust ON ord.cnum = cust.cnum
WHERE sal.city REGEXP '^[L-R]' AND cust.city REGEXP '^[L-R]'
ORDER BY ord.onum;

-- 19 Запросите все пары покупателей, обслуживаемые одним и тем же продавцом. Исключите комбинации покупателей с самими собой, а также пары в обратном порядке.
SELECT c1.cname AS customer1_name, c2.cname AS customer2_name, s.sname AS seller_name
FROM cust c1, cust c2, sal s
WHERE c1.snum = c2.snum AND c1.cnum < c2.cnum AND c1.snum = s.snum
ORDER BY c1.cname, c2.cname;

-- 20 С помощью подзапроса выведите имена всех покупателей, чьи продавцы имеют комиссионные меньше 0.13.
SELECT cname
FROM cust
WHERE snum IN (SELECT snum FROM sal WHERE comm < 0.13);

-- 21 Напишите команду, создающую копию таблицы Продавцов с одновременным копированием данных из SAMPLE.SAL. Убедитесь в сходности структур таблиц при помощи команды DESC и идентичности данных в таблице-оригинале и таблице-копии.
CREATE TABLE copy_sal AS (SELECT * FROM SAMPLE.SAL);

DESC sal;
DESC copy_sal;

SELECT * FROM sal;
SELECT * FROM copy_sal;

DROP TABLE copy_sal;

-- 22 Напишите последовательность команд, которая вставляет две новые записи в вашу таблицу Продавцов, выводит таблицу после вставки, удаляет одну запись о новом продавце и вновь выводит таблицу.
INSERT INTO sal (snum, sname, city, comm) VALUES (101, 'Yaroslav', 'Kemerovo', 0.12);
INSERT INTO sal (snum, sname, city, comm) VALUES (102, 'Yaroslav', 'Kemerovo', 0.15);
SELECT * FROM sal;
DELETE FROM sal WHERE snum = 102;
DELETE FROM sal WHERE snum = 101;
-- 23 Напишите последовательность команд, которая вставляет две строки в вашу таблицу Продавцов, увеличивает в 2 раза комиссионные у всех продавцов и выводит содержимое таблицы после каждого изменения.
INSERT INTO sal (snum, sname, city, comm) VALUES (101, 'Yaroslav', 'Kemerovo', 0.12);
INSERT INTO sal (snum, sname, city, comm) VALUES (102, 'Yaroslav', 'Kemerovo', 0.15);

SELECT * FROM sal;

UPDATE sal SET comm = comm * 2;
UPDATE sal SET comm = comm / 2;

DELETE FROM sal WHERE snum = 102;
DELETE FROM sal WHERE snum = 101;