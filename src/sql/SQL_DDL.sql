SELECT * FROM mystore.contragents;
SELECT * FROM mystore.products;
SELECT * FROM mystore.prices;

SELECT prd.id prd_id, prd.pname, prc.id prc_id, prc.pdate, prc.price 
FROM mystore.products prd
LEFT JOIN mystore.prices prc ON prd.id = prc.product_id 
ORDER BY prc.pdate, prd.id;

SELECT o.id order_id, o.odate order_date, c.cname contragent_name, c.idcode contragent_idcode, 
prd.pname product_name, prc.price, prc.pdate price_date, o.quantity, o.amount   
FROM mystore.orders o
JOIN mystore.contragents c on o.contragent_id = c.id
JOIN mystore.products prd on o.product_id = prd.id
JOIN mystore.prices prc on o.price_id = prc.id
ORDER BY o.odate, c.cname;

CREATE OR REPLACE VIEW mystore.v_orders AS 
SELECT o.id order_id, o.odate order_date, c.cname contragent_name, c.idcode contragent_idcode, 
prd.pname product_name, prc.price, prc.pdate price_date, o.quantity, o.amount   
FROM mystore.orders o
JOIN mystore.contragents c on o.contragent_id = c.id
JOIN mystore.products prd on o.product_id = prd.id
JOIN mystore.prices prc on o.price_id = prc.id
ORDER BY o.odate, c.cname;

SELECT * FROM mystore.v_orders
WHERE order_date >= '2021-01-20';

SELECT * FROM mystore.v_orders
WHERE contragent_name IN 
(SELECT cname FROM mystore.contragents WHERE cname LIKE '%on%');

SELECT DATE_FORMAT(order_date, "%Y-%m") period, contragent_name, SUM(amount) total_sales 
FROM mystore.v_orders
GROUP BY DATE_FORMAT(order_date, "%Y %M"), contragent_name
ORDER BY DATE_FORMAT(order_date, "%Y-%m"), SUM(amount) DESC;

SELECT prd.id prd_id, prd.pname, AVG(prc.price) avg_price
FROM mystore.products prd
LEFT JOIN mystore.prices prc ON prd.id = prc.product_id 
GROUP BY prd.id, prd.pname
HAVING AVG(prc.price) > 1000;
