DROP DATABASE IF EXISTS Oto;

CREATE DATABASE Oto CHARACTER SET "utf8";

USE Oto ;

CREATE TABLE `BRANDS` (
    `bra_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `bra_label` varchar(50) NOT NULL,
    `bra_country` varchar(50) NOT NULL
)
ENGINE = innoDB;

CREATE TABLE `VEHICLES` (
    `veh_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `veh_condition` boolean NOT NULL,
    `veh_type` boolean NOT NULL,
    `fk_bra_id` int,
    `veh_label` varchar(50) NOT NULL,
    `veh_motorisation` varchar(50) NOT NULL,
    `veh_energy` varchar(20) NOT NULL,
    `veh_kilometers` int NOT NULL,
    `veh_description` varchar(255) NOT NULL,
    `veh_price` decimal(7,2),
    `veh_locked` boolean DEFAULT NULL ,
    `veh_add_date` DATETIME,
    `veh_modif_date` DATETIME DEFAULT NULL,
    FOREIGN KEY (`fk_bra_id`) REFERENCES `brands`(`bra_id`) ON DELETE SET NULL
)
ENGINE = innoDB;

CREATE TABLE `SALES_REPRESENTANTS` (
    `rep_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `rep_surname` varchar(50) NOT NULL,
    `rep_name` varchar(50) NOT NULL
)
ENGINE = innoDB;

CREATE TABLE `CUSTOMERS` (
    `cus_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `cus_client_type` boolean NOT NULL,
    `cus_surname` varchar(50) NOT NULL,
    `cus_name` varchar(50) NOT NULL,
    `cus_address` varchar(255) NOT NULL,
    `cus_postalcode` int NOT NULL,
    `cus_city` varchar(50) NOT NULL,
    `cus_country` varchar(50) NOT NULL,
    `cus_phone` int NOT NULL,
    `cus_email` varchar(50),
    `cus_comment` varchar(255) ,
    `cus_add_date` DATETIME,
    `cus_modif_date` DATETIME DEFAULT NULL
)
ENGINE = innoDB;

CREATE TABLE `ORDERS` (
    `ord_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `ord_date` DATETIME NOT NULL,
    `fk_rep_id` int,
    `fk_cus_id` int,
    `order_total` decimal (7,2) NOT NULL,
    `ord_required_date` DATETIME NOT NULL,
    `ord_completion_date` DATETIME DEFAULT NULL,
    `ord_payment_method` boolean,
    `ord_payment_status` boolean,
    FOREIGN KEY (`fk_cus_id`) REFERENCES `customers`(`cus_id`) ON DELETE SET NULL,
    FOREIGN KEY (`fk_rep_id`) REFERENCES `sales_representants`(`rep_id`) ON DELETE SET NULL
)
ENGINE = innoDB;

CREATE TABLE `SPARE_PARTS` (
    `spa_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `spa_reference` varchar(10) NOT NULL,
    `spa_supplier` varchar(50) NOT NULL,
    `spa_brand` varchar(50) NOT NULL,
    `spa_label` varchar(30) NOT NULL,
    `spa_description` varchar(255),
    `spa_unit_price` decimal(7,2),
    `spa_sales_unit` int NOT NULL,
    `spa_stock` int DEFAULT 0,
    `spa_locked` boolean DEFAULT NULL,
    `spa_add_date` DATETIME,
    `spa_modif_date` DATETIME DEFAULT NULL
)
ENGINE = innoDB;

CREATE TABLE `OPTIONS` (
    `opt_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `opt_reference` varchar(10) NOT NULL,
    `opt_supplier` varchar(50) NOT NULL,
    `opt_brand` varchar(50) NOT NULL,
    `opt_label` varchar(30) NOT NULL,
    `opt_description` varchar(255),
    `opt_unit_price` decimal(7,2),
    `opt_sales_unit` int NOT NULL,
    `spa_stock` int DEFAULT 0,
    `opt_locked` boolean DEFAULT NULL,
    `opt_add_date` DATETIME,
    `opt_modif_date` DATETIME DEFAULT NULL
)
ENGINE = innoDB;

CREATE TABLE `WORKSHOP_SERVICES` (
    `wor_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `wor_service` varchar(50) NOT NULL,
    `wor_service_price` int DEFAULT NULL,
    `fk_spa_id` int,
    `fk_opt_id` int,
    FOREIGN KEY (`fk_spa_id`) REFERENCES `spare_parts`(`spa_id`) ON DELETE SET NULL,
    FOREIGN KEY (`fk_opt_id`) REFERENCES `options`(`opt_id`) ON DELETE SET NULL
)
ENGINE = innoDB;

CREATE TABLE `ORDER_DETAILS` (
    `ord_det_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `fk_ord_id` int,
    `fk_veh_id` int,
    `fk_opt_id` int,
    `fk_spa_id` int,
    `fk_wor_id` int,
    `ord_det_quantity` int NOT NULL,
    `ord_det_discount` decimal(3,2) NOT NULL,
    `ord_det_total_line` decimal(3,2) NOT NULL,
    FOREIGN KEY (`fk_wor_id`) REFERENCES `workshop_services`(`wor_id`) ON DELETE SET NULL,
    FOREIGN KEY (`fk_veh_id`) REFERENCES `vehicles`(`veh_id`) ON DELETE SET NULL,
    FOREIGN KEY (`fk_spa_id`) REFERENCES `spare_parts`(`spa_id`) ON DELETE SET NULL,
    FOREIGN KEY (`fk_opt_id`) REFERENCES `options`(`opt_id`) ON DELETE SET NULL,
    FOREIGN KEY (`fk_ord_id`) REFERENCES `orders`(`ord_id`) ON DELETE SET NULL
)
ENGINE = innoDB;








