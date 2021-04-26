-----------------------------------------------------------------------------------------------------------------
-- A partir de la table orders_details, afficher par code produit, la somme des quantités commandées et le prix total correspondant : on nommera la colonne correspondant à la somme des quantités commandées, QteTot et le prix total, PrixTot. --
-----------------------------------------------------------------------------------------------------------------

CREATE VIEW v_Details
AS
SELECT `ode_pro_id` AS ProdCode, `pro_ref` AS ProdRef, SUM(`ode_quantity`) AS QteTot, SUM(`ode_unit_price`*`ode_quantity`) AS PrixTot
FROM `orders_details`
JOIN `products`
ON `ode_pro_id` = `pro_id`
GROUP BY `ode_pro_id`;

-----------------------------------------------------------------------------------------------------------------
-- Afficher les ventes dont le code produit est ZOOM (affichage de toutes les colonnes de la table orders_details) --
-----------------------------------------------------------------------------------------------------------------

CREATE VIEW v_order_details_zoom
AS
SELECT `ode_id`,`ode_unit_price`, `ode_discount`, `ode_quantity`, `ode_ord_id`, `ode_pro_id` FROM `orders_details`
JOIN `products`
ON `ode_pro_id` = `pro_id`
WHERE `products`.`pro_ref` = 'ZOOM'
GROUP BY `ode_id`;