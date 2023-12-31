CREATE TABLE users (
	user_id int AUTO_INCREMENT PRIMARY KEY,
    user_name varchar(255),
    user_password varchar(255),
    user_phone varchar(255),
    user_address varchar(255)
);

CREATE TABLE admin (
	admin_name varchar(255) PRIMARY KEY,
    admin_password varchar(255)
);

CREATE TABLE pet (
	pet_id int AUTO_INCREMENT PRIMARY KEY,
    pet_description varchar(255),
    pet_category_id varchar(255),
    pet_img varchar(255),
    user_id int
);

CREATE TABLE pet_product (
	pet_prod_id varchar(255) PRIMARY KEY,
    pet_prod_name varchar(255),
    pet_prod_detail varchar(255),
    pet_prod_price double,
    pet_prod_origin varchar(255),
    pet_prod_image varchar(255),
    pet_prod_quantity int
);

CREATE TABLE pet_category (
	pet_category_id varchar(10) PRIMARY KEY,
    pet_category_name varchar(255),
    user_id int
);

CREATE TABLE orders(
	order_id varchar(10) PRIMARY KEY,
    order_date date,
    order_total int,
    order_numberOfItem int,
    user_id int,
    pet_prod_id varchar(255)
);

CREATE TABLE order_detail (
	order_id varchar(10),
    pet_prod_id varchar(255),
    order_detail_quantity int,
    total double,
    user_id int
);

CREATE TABLE service(
	service_id varchar(10) PRIMARY KEY,
    service_name varchar(255),
    service_detail varchar(255),
    service_fee double,
    service_date date,
    user_id int,
    pet_id int
);

CREATE TABLE contact(
	stt int AUTO_INCREMENT PRIMARY KEY,
    mess varchar(255),
    name varchar(50),
    email varchar(255)
);

ALTER TABLE order_detail
ADD FOREIGN KEY (user_id) REFERENCES users(user_id);

ALTER TABLE orders
ADD FOREIGN KEY (user_id) REFERENCES users(user_id);

ALTER TABLE pet
ADD FOREIGN KEY (user_id) REFERENCES users(user_id);

ALTER TABLE service
ADD FOREIGN KEY (user_id) REFERENCES users(user_id);

ALTER TABLE pet_category
ADD FOREIGN KEY (user_id) REFERENCES users(user_id);

ALTER TABLE order_detail
ADD FOREIGN KEY (order_id) REFERENCES orders(order_id);

ALTER TABLE order_detail
ADD FOREIGN KEY (pet_prod_id) REFERENCES pet_product(pet_prod_id);

ALTER TABLE orders
ADD FOREIGN KEY (pet_prod_id) REFERENCES pet_product(pet_prod_id);

ALTER TABLE pet
ADD FOREIGN KEY (pet_category_id) REFERENCES pet_category(pet_category_id);

ALTER TABLE service
ADD FOREIGN KEY (pet_id) REFERENCES pet(pet_id);

ALTER TABLE users
ADD user_email varchar(255);

ALTER TABLE users
ADD UNIQUE (user_email);

ALTER TABLE pet ADD pet_date DATETIME;

ALTER TABLE pet ADD pet_status int(3);

ALTER TABLE `orders` CHANGE `order_date` `order_date` DATETIME NULL DEFAULT NULL;

ALTER TABLE service
ADD CONSTRAINT pet_id
FOREIGN KEY (pet_id) REFERENCES pet(pet_id);

ALTER TABLE service
DROP FOREIGN KEY pet_id;

ALTER TABLE pet
ADD pet_id varchar(50);

ALTER TABLE service DROP FOREIGN KEY pet_id;

ALTER TABLE `service` CHANGE `service_id` `service_id` INT NOT NULL AUTO_INCREMENT;

ALTER TABLE pet_product ADD stt INT AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE pet_product ADD ngay_sua_doi datetime;

ALTER TABLE pet_product
ADD CONSTRAINT unique_pet_id UNIQUE (pet_prod_id);

ALTER TABLE orders ADD stt_order INT AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE orders ADD ngay_sua_doi_order datetime;

ALTER TABLE orders ADD CONSTRAINT unique_order_id UNIQUE (order_id);

ALTER TABLE admin ADD stt_admin INT AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE admin ADD ngay_sua_doi_order datetime;

ALTER TABLE admin ADD CONSTRAINT unique_admin_name UNIQUE (admin_name);

ALTER TABLE pet ADD stt_pet INT AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE pet ADD ngay_sua_doi_pet datetime;

ALTER TABLE pet ADD CONSTRAINT unique_pet_id UNIQUE (pet_id);

ALTER TABLE pet ADD pet_id varchar(50);

ALTER TABLE pet_category ADD ngay_sua_doi_pet datetime;

ALTER TABLE users ADD ngay_sua_doi_users datetime;

ALTER TABLE pet_product ADD pet_category_id int;

ALTER TABLE pet_product ADD CONSTRAINT pet_category_id
FOREIGN KEY (pet_category_id)
REFERENCES pet_category (pet_category_id);

ALTER TABLE pet ADD CONSTRAINT user_id
FOREIGN KEY (user_id)
REFERENCES users (user_id);

ALTER TABLE contact ADD ngay_gui datetime;

INSERT into admin (admin_name, admin_password) VALUES ("admin","admin"); 

INSERT INTO pet_category (pet_category_id, pet_category_name) VALUES 
('1', 'cat'),
('2', 'dog'),
('3','other');

