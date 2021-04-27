SELECT `ord_id` AS 'numéro_de_commande', `cus_name` AS 'nom', `cus_surname` AS 'prénom', `bra_label` AS 'marque', `veh_label` AS 'modèle', `opt_label` AS 'Modèle_de_pneu'
FROM `order_details` 
JOIN `orders` ON `fk_ord_id` = `ord_id` 
JOIN `customers` ON `fk_cus_id` = `cus_id` 
JOIN `vehicles` ON `fk_veh_id` = `veh_id` 
JOIN `brands` ON `fk_bra_id` = `bra_id` 
JOIN `options` ON `fk_opt_id` = `opt_id`
WHERE `ord_det_quantity` = '4'; 


SELECT `ord_id` AS 'numéro_de_commande', `cus_name` AS 'nom', `cus_surname` AS 'prénom', `bra_label` AS 'marque', `veh_label` AS 'modèle', `spa_label` AS 'Pièce_changée'
FROM `order_details` 
JOIN `orders` ON `fk_ord_id` = `ord_id` 
JOIN `customers` ON `fk_cus_id` = `cus_id` 
JOIN `vehicles` ON `fk_veh_id` = `veh_id` 
JOIN `brands` ON `fk_bra_id` = `bra_id` 
JOIN `spare_parts` ON `fk_spa_id` = `spa_id` 
WHERE `ord_det_quantity` = '2' 


SELECT `ord_id` AS 'numéro_de_commande', `cus_name` AS 'nom', `bra_label` AS 'marque', `veh_label` AS 'modèle', `wor_service` AS 'prestation', `wor_service_price` AS 'prix'
FROM `order_details` 
JOIN `orders` ON `fk_ord_id` = `ord_id` 
JOIN `customers` ON `fk_cus_id` = `cus_id` 
JOIN `vehicles` ON `fk_veh_id` = `veh_id` 
JOIN `brands` ON `fk_bra_id` = `bra_id` 
JOIN `workshop_services` ON `fk_wor_id` = `wor_id` 
WHERE `ord_det_quantity` = '2'


SELECT `wor_service` AS 'prestation', `wor_service_price` AS 'prix', opt_label AS 'libellé_option'
FROM `workshop_services` 
JOIN `options` ON `fk_opt_id` = `opt_id`
WHERE wor_service LIKE '%montage%'
