-- Entrées table POSTS --

INSERT INTO `posts` (`pos_libelle`)
VALUES ('Directeur'),('Responsable de rayon'),('Vendeur');

-- Entrées table EMPLOYEES --

INSERT INTO `employees` (`emp_pos_id`, `emp_lastname`, `emp_firstname`, `emp_address`, `emp_zipcode`, `emp_city`, `emp_mail`, `emp_phone`, `emp_salary`, `emp_enter_date`, `emp_gender`, `emp_children`)
VALUES (1, 'Dujardin', 'Jean', '7 rue des peupliers', '77920', 'Fontainebleau', 'johnduj@gmail.com', '0633456789', '3800', '2015-01-02', 'M', '3');

INSERT INTO `employees` (`emp_superior_id`, `emp_pos_id`, `emp_lastname`, `emp_firstname`, `emp_address`, `emp_zipcode`, `emp_city`, `emp_mail`, `emp_phone`, `emp_salary`, `emp_enter_date`, `emp_gender`, `emp_children`)
VALUES (1, 2, 'Clooney', 'Georges', '6800 Richman street', '88790', 'New York', 'georgiotheking@gmail.com', '5558790', '2480', '2016-04-3', 'M', '2'), (2, 3, 'Lellouche', 'Gilles', '78 rue du cinema', '75008', 'Paris', 'gillou@gmail.com', '0678985409', '1560', '2017-08-21', 'M', '1');

-- Entrées table CATEGORIES --

INSERT INTO `categories` (`cat_name`)
VALUES ('Aspirateur');

INSERT INTO `categories` (`cat_name`, `cat_parent_id`)
VALUES ('Aspirateur traineau', 1),('Aspirateur balai', 1);

-- Entrées table SUPPLIERS --

INSERT INTO `suppliers` (`sup_name`, `sup_city`, `sup_countries_id`, `sup_address`, `sup_zipcode`, `sup_contact`, `sup_phone`, `sup_mail`)
VALUES ('ELECTROLUX', 'Saint-Denis', 'SE', '10 Avenue du Stade de France', '93210', 'Thierry Bé', '0675432134', 'thierryb@electrolux.fr'), ('DYSON', 'Paris', 'GB', '9 Villa Pierre Ginier', '75018', 'Maxime Patte', '0765432167', 'maxime.patte@dyson.fr');

-- Entrées table PRODUCTS --

INSERT INTO `products` (`pro_cat_id`, `pro_price`, `pro_ref`, `pro_ean`, `pro_stock`, `pro_stock_alert`, `pro_color`, `pro_name`, `pro_desc`, `pro_publish`, `pro_sup_id`, `pro_add_date`)
VALUES (2, 199.99, 'US3931', '3456987687543', 2, 1, 'bleu marine', 'Ultrasilencer 2200W', 'Depression 31kpa, filtre HEPA 13 lavable, brosse double position', 1, 1, '2017-03-15'),(3, 499.99, 'V8AC', '2897695673569', 8, 2, 'rouge', 'V8 Animal Complete', 'Depression 28kpa, batterie sans fil 22V, autonomie 30min', 1, 2, '2016-04-06');

-- Entrées table CUSTOMERS --

INSERT INTO `customers` (`cus_lastname`, `cus_firstname`, `cus_address`, `cus_zipcode`, `cus_city`, `cus_countries_id`, `cus_mail`, `cus_phone`, `cus_password`, `cus_add_date`)
VALUES ('Archibald', 'Lewinner', '1 rue Victoire', '31000', 'Toulouse', 'FR', 'a.lewinner@yahoo.fr', '0698765432', 'alewinner', '2020-08-12'), ('Tanguy', 'Labernique', '7 chemin des crustacés', '33000', 'Bordeaux', 'FR', 'tanguyber@gmail.com', '0634455667', 'tlabernique', '2021-03-06');

-- Entrées table ORDERS --

INSERT INTO `orders` (`ord_order_date`, `ord_payment_date`, `ord_ship_date`, `ord_reception_date`, `ord_status`, `ord_cus_id`)
VALUES ('2021-04-10', '2021-04-10', '2021-04-12', '2021-04-13', 'livré', 2), ('2021-04-20', '2021-04-20', '2021-04-24', '2021-04-25', 'en cours de préparation', 1);

-- Entrées table ORDERS_DETAILS --

INSERT INTO `orders_details` (`ode_unit_price`, `ode_discount`, `ode_quantity`, `ode_ord_id`, `ode_pro_id`)
VALUES (199.99, 0, 1, 1, 45),(499.99, 0, 1, 2, 46);