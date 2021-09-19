CREATE DATABASE IF NOT EXISTS mystore;

CREATE TABLE IF NOT EXISTS mystore.contragents (id int NOT NULL PRIMARY KEY AUTO_INCREMENT, cname varchar(255) NOT NULL, idcode varchar(10));
CREATE UNIQUE INDEX contragents_ind ON mystore.contragents (id);

CREATE TABLE IF NOT EXISTS mystore.products (id int NOT NULL PRIMARY KEY AUTO_INCREMENT, pname varchar(50));
CREATE UNIQUE INDEX products_ind ON mystore.products (id);

CREATE TABLE IF NOT EXISTS mystore.prices (id int NOT NULL PRIMARY KEY AUTO_INCREMENT, product_id int, pdate date, price decimal(10.2),
FOREIGN KEY (product_id) REFERENCES products(id));
CREATE UNIQUE INDEX prices_ind ON mystore.prices (id);

CREATE TABLE IF NOT EXISTS mystore.orders (id int NOT NULL PRIMARY KEY AUTO_INCREMENT, odate date, contragent_id int, product_id int, price_id int, 
quantity decimal(10.2),  amount decimal(10.2),  
FOREIGN KEY (contragent_id) REFERENCES contragents(id), FOREIGN KEY (product_id) REFERENCES products(id), FOREIGN KEY (price_id) REFERENCES prices(id));
CREATE UNIQUE INDEX orders_ind ON mystore.orders (id);

CREATE TABLE IF NOT EXISTS mystore.payments (id int NOT NULL PRIMARY KEY AUTO_INCREMENT, pmdate date, contragent_id int, amount decimal(10.2), 
FOREIGN KEY (contragent_id) REFERENCES contragents(id));
CREATE UNIQUE INDEX payments_ind ON mystore.payments (id);

INSERT INTO mystore.contragents (cname, idcode) 
VALUES ('Watsons', '1234567890'), ('Rondo', '1493456789'), ('Yeti', '3626655551'), ('Adibos', '1564443331');

INSERT INTO mystore.products (pname) 
VALUES ('Laptop HP 1100'), ('Monitor Dell 2405'), ('Keyboard Rapoo'), ('Mouse Rapoo');

INSERT INTO mystore.prices (product_id, pdate, price) VALUES 
(1, '2021-01-01', 15000.00),
(2, '2021-01-01', 8000.00), 
(3, '2021-01-01', 500.00), 
(4, '2021-01-01', 200.00);

INSERT INTO mystore.orders (odate, contragent_id, product_id, price_id, quantity, amount) VALUES
('2021-01-02', 1, 1, 1, 2, 30000.00), 
('2021-01-02', 1, 2, 2, 2, 16000.00), 
('2021-01-02', 1, 3, 3, 2, 1000.00), 
('2021-01-02', 1, 4, 4, 2, 400.00);

INSERT INTO mystore.prices (product_id, pdate, price) VALUES 
(1, '2021-01-15', 14000.00),
(2, '2021-01-15', 7600.00), 
(3, '2021-01-15', 450.00), 
(4, '2021-01-15', 180.00);

INSERT INTO mystore.orders (odate, contragent_id, product_id, price_id, quantity, amount) VALUES
('2021-01-20', 2, 1, 5, 1, 14000.00), 
('2021-01-20', 2, 2, 6, 1, 7600.00), 
('2021-01-20', 2, 3, 7, 1, 450.00), 
('2021-01-20', 2, 4, 8, 1, 180.00);

INSERT INTO mystore.prices (product_id, pdate, price) VALUES 
(1, '2021-02-01', 14500.00), 
(2, '2021-02-01', 7900.00), 
(3, '2021-02-01', 550.00), 
(4, '2021-02-01', 210.00);

INSERT INTO mystore.orders (odate, contragent_id, product_id, price_id, quantity, amount) VALUES
('2021-02-10', 3, 1, 9, 1, 14500.00), 
('2021-02-10', 3, 2, 10, 1, 7900.00), 
('2021-02-10', 3, 3, 11, 1, 550.00), 
('2021-02-10', 3, 4, 12, 1, 210.00);

COMMIT;