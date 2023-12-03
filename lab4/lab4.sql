-- Active: 1701592836285@@127.0.0.1@3306@sample
-- 1 �������� ������, ������� ������� ��� ������ �� ������� �����������, ��� ������� ����� �������� ����� 1001.
SELECT *
FROM cust
WHERE snum = 1001;

-- 2 �������� ������, ������� ������� ������� ��������� �� ��������� � ��������� �������: city, sname, snum, comm.
SELECT city, sname, snum, comm
FROM sal;

-- 3 �������� ������, ������� ������� ������ (rating), �������������� ������ ������� ���������� � ������ San Jose.
SELECT rating, cname
FROM cust
WHERE city = 'San Jose';

-- 4 �������� ������, ������� ������� �������� ������ �������� ���� ��������� �� ������� ������� ��� ����� �� �� �� ���� ����������.
SELECT DISTINCT snum
FROM ord;

-- 5 �������� ������, ������� ����� ������ ��� ���� sname � city ��� ���� ��������� � ������� � ������������� ������ ������ 0.11
SELECT sname, city
FROM sal
WHERE city LIKE 'London' AND comm > 0.11;

-- 6 �������� ������ � ������� �����������, ������� ����� ������� ������ ��� ���� ����������� � ��������� ������ ��� ������ 200, ���� ��� �� ��������� � ����
SELECT *
FROM cust
WHERE rating <= 200 AND city != 'Rome';

-- 7 ��������� ����� ��������� ��� ������ �� 3 � 5 ������� 1990 �.
SELECT *
FROM ord
WHERE odate = '03-OCT-90' OR odate = '05-OCT-90';

SELECT *
FROM ord
WHERE odate IN ('03-OCT-90', '05-OCT-90');

-- 8 �������� ������, ������� ����� ������� ���� �����������, ��� ����� ���������� � �����, ���������� � �������� �� A �� G.
SELECT *
FROM cust
WHERE cname REGEXP '^[A-G]';

-- 9 �������� ������, ������� ������� ���� ���������, ����� ������� �������� ����� e.
SELECT *
FROM sal
WHERE sname LIKE '%e%';

-- 10 �������� ������, ������� �������� �� ����� ���� ������� �� 3 ������� 1990 �.
SELECT SUM(amt) AS total_amount
FROM ord
WHERE odate = '03-OCT-90';

-- 11 �������� ������, ������� �������� �� ����� ���� ������� ��� �������� � ������� 1001
SELECT SUM(amt) AS total_amount
FROM ord
WHERE snum = 1001;

-- 12 �������� ������, ������� ������ �� ���������� ����� ��� ������� ��������.
SELECT snum, MAX(amt) AS max_amount
FROM ord
GROUP BY snum;

-- 13 �������� ������, ������� ������ �� ����������, ��� ��� �������� ������ � ���������� ������� ����� ����, ��������������� �� ����� s.
SELECT *
FROM cust
WHERE cname LIKE '%s'
ORDER BY cname
LIMIT 1;

-- 14 �������� ������, ������� ������ �� ������� ������������ � ������ ������.
SELECT city, AVG(comm) AS avg_commission
FROM sal
GROUP BY city;

-- 15 �������� ������, ������� ����� �� ��� ������� ������ �� 3 ������� ��� �����, ��������� ������ � ���� (1$=0.8 ����), ��� �������� � ������ ������������, ���������� ��������� �� ���� �����.
SELECT ord.onum, ord.amt * 0.8 AS euro_amount, sal.sname, sal.comm
FROM ord
JOIN sal ON ord.snum = sal.snum
WHERE odate = '03-OCT-90';

-- 16 �������� ������, ������� ������� ������ ������� � ������������ �������, � ����� ����� ��������� � ����������� �������, �������� ������� ��������� � ������� ��� ����.
SELECT ord.onum, sal.sname AS seller_name, cust.cname AS customer_name
FROM ord
JOIN sal ON ord.snum = sal.snum
JOIN cust ON ord.cnum = cust.cnum
WHERE sal.city IN ('London', 'Rome')
ORDER BY ord.onum ASC;

-- 17 ��������� ����� ��������� � ���������� �������, ��������� �������� �� �������, ����������� �� 5 �������, � ���������� ������������.
SELECT sal.sname AS seller_name, SUM(ord.amt) AS total_order_amount, sal.comm AS commission
FROM sal
JOIN ord ON sal.snum = ord.snum
WHERE ord.odate < '05-Oct-90'
GROUP BY sal.sname, sal.comm
ORDER BY sal.sname ASC;

-- 18 �������� ������ �������, �� ��������� � ����� ��������� � �����������, ���� �������� � ���������� ��������� � �������, ��� �������� ���������� � ���� �� ��������� �� L �� R.
SELECT ord.onum, ord.amt, sal.sname AS seller_name, cust.cname AS customer_name
FROM ord
JOIN sal ON ord.snum = sal.snum
JOIN cust ON ord.cnum = cust.cnum
WHERE sal.city REGEXP '^[L-R]' AND cust.city REGEXP '^[L-R]'
ORDER BY ord.onum;

-- 19 ��������� ��� ���� �����������, ������������� ����� � ��� �� ���������. ��������� ���������� ����������� � ������ �����, � ����� ���� � �������� �������.
SELECT c1.cname AS customer1_name, c2.cname AS customer2_name, s.sname AS seller_name
FROM cust c1, cust c2, sal s
WHERE c1.snum = c2.snum AND c1.cnum < c2.cnum AND c1.snum = s.snum
ORDER BY c1.cname, c2.cname;

-- 20 � ������� ���������� �������� ����� ���� �����������, ��� �������� ����� ������������ ������ 0.13.
SELECT cname
FROM cust
WHERE snum IN (SELECT snum FROM sal WHERE comm < 0.13);

-- 21 �������� �������, ��������� ����� ������� ��������� � ������������� ������������ ������ �� SAMPLE.SAL. ��������� � ��������� �������� ������ ��� ������ ������� DESC � ������������ ������ � �������-��������� � �������-�����.
CREATE TABLE copy_sal AS (SELECT * FROM SAMPLE.SAL);

DESC sal;
DESC copy_sal;

SELECT * FROM sal;
SELECT * FROM copy_sal;

DROP TABLE copy_sal;

-- 22 �������� ������������������ ������, ������� ��������� ��� ����� ������ � ���� ������� ���������, ������� ������� ����� �������, ������� ���� ������ � ����� �������� � ����� ������� �������.
INSERT INTO sal (snum, sname, city, comm) VALUES (101, 'Yaroslav', 'Kemerovo', 0.12);
INSERT INTO sal (snum, sname, city, comm) VALUES (102, 'Yaroslav', 'Kemerovo', 0.15);
SELECT * FROM sal;
DELETE FROM sal WHERE snum = 102;
DELETE FROM sal WHERE snum = 101;
-- 23 �������� ������������������ ������, ������� ��������� ��� ������ � ���� ������� ���������, ����������� � 2 ���� ������������ � ���� ��������� � ������� ���������� ������� ����� ������� ���������.
INSERT INTO sal (snum, sname, city, comm) VALUES (101, 'Yaroslav', 'Kemerovo', 0.12);
INSERT INTO sal (snum, sname, city, comm) VALUES (102, 'Yaroslav', 'Kemerovo', 0.15);

SELECT * FROM sal;

UPDATE sal SET comm = comm * 2;
UPDATE sal SET comm = comm / 2;

DELETE FROM sal WHERE snum = 102;
DELETE FROM sal WHERE snum = 101;