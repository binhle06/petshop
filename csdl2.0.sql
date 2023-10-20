CREATE TABLE users (
    user_id int AUTO_INCREMENT PRIMARY KEY,
    user_name varchar(255),
    user_password varchar(255),
    user_phone varchar(255),
    user_address varchar(255),
    user_date_add DATETIME,
    user_email varchar(255) UNIQUE,
    ngay_sua_doi_users DATETIME
);

CREATE TABLE admin (
    admin_stt int AUTO_INCREMENT PRIMARY KEY,
    admin_name varchar(255) UNIQUE,
    admin_password varchar(255),
    admin_date_add DATETIME
);

CREATE TABLE pet_category (
    pet_category_id int AUTO_INCREMENT PRIMARY KEY,
    pet_category_name varchar(255),
    pet_category_date_add DATETIME,
    pet_category_change DATETIME
);

CREATE TABLE pet (
    pet_id int AUTO_INCREMENT PRIMARY KEY,
    pet_description varchar(255),
    pet_category_id int,
    pet_img varchar(255),
    user_id int,
    pet_date_add DATETIME,
    ngay_sua_doi_pet DATETIME,
    pet_status int(3),
    pet_name varchar(50),
    CONSTRAINT FK_pet_category FOREIGN KEY (pet_category_id) REFERENCES pet_category(pet_category_id),
    CONSTRAINT FK_user_id FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE pet_product (
    pet_prod_stt int AUTO_INCREMENT PRIMARY KEY,
    pet_prod_id varchar(255) UNIQUE,
    pet_prod_name varchar(255),
    pet_prod_detail varchar(255),
    pet_prod_price double,
    pet_prod_origin varchar(255),
    pet_prod_image varchar(255),
    pet_prod_quantity int,
    pet_prod_date_add DATETIME,
    pet_prod_date_change DATETIME,
    pet_category_id int,
    CONSTRAINT FK_pet_category_id FOREIGN KEY (pet_category_id) REFERENCES pet_category(pet_category_id)
);

CREATE TABLE orders (
    order_stt int AUTO_INCREMENT PRIMARY KEY,
    order_id varchar(10) UNIQUE,
    order_date DATETIME,
    order_total int,
    order_numberOfItem int,
    user_id int,
    pet_prod_id varchar(255),
    ngay_sua_doi_order DATETIME,
    CONSTRAINT FK_user_id_orders FOREIGN KEY (user_id) REFERENCES users(user_id),
    CONSTRAINT FK_pet_prod_id_orders FOREIGN KEY (pet_prod_id) REFERENCES pet_product(pet_prod_id)
);

CREATE TABLE service (
    service_stt int AUTO_INCREMENT PRIMARY KEY,
    service_id varchar(10) UNIQUE,
    service_name varchar(255),
    service_detail varchar(255),
    service_fee double,
    service_date DATETIME,
    user_id int,
    pet_id int,
    CONSTRAINT FK_user_id_service FOREIGN KEY (user_id) REFERENCES users(user_id),
    CONSTRAINT FK_pet_id_service FOREIGN KEY (pet_id) REFERENCES pet(pet_id)
);

CREATE TABLE contact (
    stt int AUTO_INCREMENT PRIMARY KEY,
    mess varchar(255),
    name varchar(50),
    email varchar(255),
    ngay_gui DATETIME
);

ALTER TABLE orders ADD order_status bit DEFAULT 0;

INSERT into admin (admin_name, admin_password) VALUES ("admin","admin"); 

INSERT INTO pet_category (pet_category_id, pet_category_name, pet_category_date_add, pet_category_change) VALUES 
(1, 'cat', NOW(), NOW()),
(2, 'dog', NOW(), NOW()),
(3, 'other', NOW(), NOW());
