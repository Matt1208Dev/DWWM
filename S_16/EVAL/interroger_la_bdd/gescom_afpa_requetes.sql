
------------------------------------------------------------------
-- Q1 --
------------------------------------------------------------------

SELECT CONCAT(`emp_lastname`, ' ', `emp_firstname`), `emp_children`
FROM `employees`
WHERE `emp_children` > 0
ORDER BY `emp_children` DESC;

------------------------------------------------------------------
-- Q2 --
------------------------------------------------------------------

SELECT `cus_lastname`, `cus_firstname`, `cus_countries_id`
FROM `customers`
WHERE `cus_countries_id` != 'FR'

------------------------------------------------------------------
-- Q3 --
------------------------------------------------------------------

SELECT `cus_city`, `cus_countries_id`, `cou_name`
FROM `customers`
JOIN `countries`
    ON `cus_countries_id` = `cou_id`
ORDER BY `cus_city` ASC;


------------------------------------------------------------------
-- Q4 --
------------------------------------------------------------------

SELECT `cus_lastname`, `cus_update_date`
FROM `customers`
WHERE `cus_update_date` IS NOT NULL ;

------------------------------------------------------------------
-- Q5 --
------------------------------------------------------------------

SELECT CONCAT(`cus_lastname`, ' ', `cus_firstname`), `cus_city`
FROM `customers`
WHERE `cus_city` LIKE '%divos%' ;

------------------------------------------------------------------
-- Q6 --
------------------------------------------------------------------

SELECT `pro_id`, `pro_name`, `pro_price`
FROM `products`
ORDER BY `pro_price` ASC LIMIT 1 ;

------------------------------------------------------------------
-- Q7 --
------------------------------------------------------------------

SELECT `pro_id`, `pro_ref`, `pro_name`
FROM `products`
LEFT JOIN `orders_details`
    ON `pro_id` = `ode_pro_id`
WHERE `orders_details`.`ode_pro_id` IS NULL;

------------------------------------------------------------------
-- Q8 --
------------------------------------------------------------------

SELECT `pro_id`, `pro_ref`, `pro_name`, `cus_id`, `ord_id`, `ode_id` 
FROM `products` 
JOIN `orders_details` 
    ON `pro_id` = `ode_pro_id` 
JOIN `orders` 
    ON `ord_id` = `ode_ord_id` 
JOIN `customers` 
    ON `cus_id` = `ord_cus_id` 
WHERE `cus_lastname` = 'Pikatchien';

------------------------------------------------------------------
-- Q9 --
------------------------------------------------------------------

SELECT `cat_id`, `cat_name`, `pro_name`
FROM `products`
JOIN `categories`
    ON `pro_cat_id` = `cat_id`
ORDER BY `cat_id` ASC;

------------------------------------------------------------------
-- Q10 --
------------------------------------------------------------------

SELECT a.`emp_id`, CONCAT(a.`emp_lastname`, ' ', a.`emp_firstname`) AS 'Employé', post_emp.`pos_libelle` AS 'Poste de l\'employé', b.`emp_id`, CONCAT(b.`emp_lastname`, ' ', b.`emp_firstname`) AS 'Supérieur', post_sup.`pos_libelle` AS 'Poste du supérieur'
FROM `employees` AS a
JOIN `employees` AS b
    ON a.`emp_superior_id` = b.`emp_id`
JOIN `shops`
    ON a.`emp_sho_id` = `sho_id`
JOIN `posts` AS post_emp
    ON post_emp.`pos_id` = a.`emp_pos_id`
JOIN `posts` AS post_sup
    ON post_sup.`pos_id` = b.`emp_pos_id`
WHERE a.`emp_superior_id` = b.`emp_id` AND `sho_city` = 'Compiègne'
GROUP BY a.`emp_lastname`
ORDER BY a.`emp_lastname` ASC;


'
------------------------------------------------------------------
-- Q11 --
------------------------------------------------------------------

SELECT `ode_pro_id` AS 'id_produit', `pro_name` AS 'nom_produit', `ode_id` AS 'num_commande', `ode_ord_id` AS 'num_ligne',`ode_discount` AS 'remise'
FROM `orders_details`
JOIN `products`
    ON `ode_pro_id` = `pro_id`
GROUP BY `ode_discount`
HAVING Remise = (SELECT MAX(`ode_discount`) FROM `orders_details`);

------------------------------------------------------------------
-- Q13 --
------------------------------------------------------------------

SELECT COUNT(*)
FROM `customers`
JOIN `countries`
    ON `cus_countries_id` = `cou_id`
WHERE `cou_name` = 'Canada';

------------------------------------------------------------------
-- Q14 --
------------------------------------------------------------------

SELECT `ode_id`, `ode_unit_price`, `ode_discount`, `ode_quantity`, `ode_ord_id`, `ode_pro_id`, `ord_order_date`
FROM `orders_details`
JOIN `orders`
    ON `ode_ord_id` = `ord_id`
WHERE `ord_order_date` LIKE '2020%'
ORDER BY `ode_ord_id` ASC;

------------------------------------------------------------------
-- Q15 --
------------------------------------------------------------------

SELECT * 
FROM `suppliers`
WHERE `sup_id` NOT IN 
    (
    SELECT DISTINCT(`pro_sup_id`) 
    FROM `products`
    JOIN `orders_details`
        ON `ode_pro_id` = `pro_id`
    )

------------------------------------------------------------------
-- Q16 --
------------------------------------------------------------------

SELECT ROUND(SUM(`ode_unit_price`*(1-`ode_discount`/100)*`ode_quantity`),2)
FROM `orders_details`
JOIN `orders`
    ON `ode_ord_id` = `ord_id`
WHERE `ord_order_date` LIKE '2020%';

------------------------------------------------------------------
-- Q17 --
------------------------------------------------------------------

SELECT AVG(total_cde) AS 'panier_moyen'
FROM (SELECT `ode_ord_id`, ROUND(SUM(`ode_unit_price`*(1-`ode_discount`/100)*`ode_quantity`),2) AS `total_cde`
FROM `orders_details`
JOIN `orders`
    ON `ode_ord_id` = `ord_id`
WHERE `ord_order_date` LIKE '2020%'
GROUP BY `ode_ord_id`) sub;

------------------------------------------------------------------
-- Q18 --
------------------------------------------------------------------

SELECT `ord_id`, `cus_lastname`, `ord_order_date`, ROUND(SUM(`ode_unit_price`*(1-`ode_discount`/100)*`ode_quantity`),2) AS `Total`
FROM `orders_details`
JOIN `orders`
    ON `ode_ord_id` = `ord_id`
JOIN `customers`
    ON `ord_cus_id` = `cus_id`
GROUP BY `ord_id`
ORDER BY Total DESC;

------------------------------------------------------------------
-- Q19 --
------------------------------------------------------------------

UPDATE `products` SET `pro_name` = 'Camper', `pro_price` = `pro_price`*0.9 
WHERE `pro_id` = 12;

------------------------------------------------------------------
-- Q20 --
------------------------------------------------------------------

UPDATE `products` SET `pro_price` = `pro_price`*1.011 
WHERE `pro_cat_id` = 25;

------------------------------------------------------------------
-- Q21 --
------------------------------------------------------------------

DELETE `products` 
FROM `products`
JOIN `categories`
    ON `cat_id` = `pro_cat_id`
LEFT JOIN `orders_details`
    ON `pro_id` = `ode_pro_id`
WHERE `categories`.`cat_name` LIKE 'Tondeuses électriques' AND `orders_details`.`ode_pro_id` IS NULL;