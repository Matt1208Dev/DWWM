--------------------------------------------------------------
-- INSERT pour table CATEGORIES --
--------------------------------------------------------------

-- Si la catégorie parente de la nouvelle entrée n'existe pas.
INSERT INTO `categories` (`cat_name`)
VALUES ['value1'];

-- Si la catégorie parente de la nouvelle entrée existe déjà
INSERT INTO `categories` (`cat_name`, `cat_parent_id`)
VALUES (['value1'],['value2']);

-- Mise à jour d'une entrée si catégorie parente ajoutée après l'enfant
UPDATE `categories` SET (`cat_parent_id` = 'value');

--------------------------------------------------------------
-- INSERT table POSTS --
--------------------------------------------------------------

INSERT INTO `posts` (`pos_libelle`)
VALUES ['value1'];

--------------------------------------------------------------
-- INSERT pour table EMPLOYEES --
--------------------------------------------------------------

-- Si le supérieur de la nouvelle entrée existe déjà
INSERT INTO `employees` (`emp_superior_id`, `emp_pos_id`, `emp_lastname`, `emp_firstname`, `emp_address`, `emp_zipcode`, `emp_city`, `emp_mail`, `emp_phone`, `emp_salary`, `emp_enter_date`, `emp_gender`, `emp_children`)
VALUES (['value1'],['value2'],['value3'],['value4'],['value5'],['value6'],['value7'],['value8'],['value9'],['value10'],['value11'],['value12'],['value13']);

-- Si le supérieur de la nouvelle entrée n'existe pas.
INSERT INTO `employees` (`emp_pos_id`, `emp_lastname`, `emp_firstname`, `emp_address`, `emp_zipcode`, `emp_city`, `emp_mail`, `emp_phone`, `emp_salary`, `emp_enter_date`, `emp_gender`, `emp_children`)
VALUES (['value1'],['value2'],['value3'],['value4'],['value5'],['value6'],['value7'],['value8'],['value9'],['value10'],['value11'],['value12']);

--------------------------------------------------------------
-- INSERT pour table CUSTOMERS --
--------------------------------------------------------------

INSERT INTO `customers` (`cus_lastname`, `cus_firstname`, `cus_address`, `cus_zipcode`, `cus_city`, `cus_countries_id`, `cus_mail`, `cus_phone`, `cus_password`, `cus_add_date`)
VALUES (['value1'],['value2'],['value3'],['value4'],['value5'],['value6'],['value7'],['value8'],['value9'],['value10']);

--------------------------------------------------------------
-- INSERT pour table SUPPLIERS --
--------------------------------------------------------------

INSERT INTO `suppliers` (`sup_name`, `sup_city`, `sup_countries_id`, `sup_address`, `sup_zipcode`, `sup_contact`, `sup_phone`, `sup_mail`)
VALUES (['value1'],['value2'],['value3'],['value4'],['value5'],['value6'],['value7'],['value8']);

--------------------------------------------------------------
-- INSERT pour table PRODUCTS --
--------------------------------------------------------------

INSERT INTO `products` (`pro_cat_id`, `pro_price`, `pro_ref`, `pro_ean`, `pro_stock`, `pro_stock_alert`, `pro_color`, `pro_name`, `pro_desc`, `pro_publish`, `pro_sup_id`, `pro_add_date`, `pro_update_date`, `pro_picture`)
VALUES (['value1'],['value2'],['value3'],['value4'],['value5'],['value6'],['value7'],['value8'],['value9'],['value10'],['value11'],['value12'],['value13'],['value14']);

--------------------------------------------------------------
-- INSERT pour table ORDERS --
--------------------------------------------------------------

INSERT INTO `orders` (`ord_order_date`, `ord_payment_date`, `ord_ship_date`, `ord_reception_date`, `ord_status`, `ord_cus_id`)
VALUES (['value1'],['value2'],['value3'],['value4'],['value5'],['value6']);

--------------------------------------------------------------
-- INSERT pour table ORDERS DETAILS --
--------------------------------------------------------------

INSERT INTO `orders_details` (`ode_unit_price`, `ode_discount`, `ode_quantity`, `ode_ord_id`, `ode_pro_id`)
VALUES (['value1'],['value2'],['value3'],['value4'],['value5']);