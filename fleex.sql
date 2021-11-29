DROP DATABASE IF EXISTS fleex;
CREATE DATABASE IF NOT EXISTS fleex;
use fleex;


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `orders`
  ADD PRIMARY KEY (order_id),
  MODIFY order_id int(11) NOT NULL AUTO_INCREMENT,
  ADD CONSTRAINT `user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);



CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL
);

ALTER TABLE `products`
  ADD PRIMARY KEY (product_id),
  MODIFY product_id int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO products  (name, price)
VALUES ("Queen Panel Bed", 10.99);
INSERT INTO products  (name, price)
VALUES ("King Panel Bed",  12.99);
INSERT INTO products  (name, price)
VALUES ("Single Panel Bed",  12.99);
INSERT INTO products  (name, price)
VALUES ("Twin Panel Bed",  22.99);
INSERT INTO products  (name, price)
VALUES ("Fridge",  88.99);
INSERT INTO products  (name, price)
VALUES ("Dresser",  32.99);
INSERT INTO products  (name, price)
VALUES ("Couch",  45.99);
INSERT INTO products  (name, price)
VALUES ("Table",  33.99);

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
);

ALTER TABLE `order_item`
  ADD PRIMARY KEY (order_item_id),
  MODIFY order_item_id int(11) NOT NULL AUTO_INCREMENT,
  ADD CONSTRAINT `order_id_FK` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `product_id_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);


  





