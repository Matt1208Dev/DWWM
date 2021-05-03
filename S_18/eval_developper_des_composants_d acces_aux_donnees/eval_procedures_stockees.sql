------------------------------------------------------------------------------------------------------------------------------------------------
/* Créez la procédure stockée facture qui permet d'afficher les informations nécessaires à une facture en fonction d'un numéro de commande. Cette procédure doit sortir le montant total de la commande.

Pensez à vous renseigner sur les informations légales que doit comporter une facture. */
------------------------------------------------------------------------------------------------------------------------------------------------

-- Procédure stockée facture

DELIMITER |

CREATE PROCEDURE facture (IN p_num_commande INT)

BEGIN 
    -- Affichage de la date de facture, numéro et date de commande, coordonnées client
    SELECT CURRENT_DATE() AS date_facture, ord_id AS num_commande, ord_order_date AS date_commande, cus_id AS num_client, CONCAT(cus_lastname, ' ', cus_firstname) AS nom_du_client, cus_address AS adresse_client, cus_zipcode AS code_postal, cus_city AS ville, cus_phone AS num_tél
    FROM `orders`
    JOIN `customers`
        ON `ord_cus_id` = `cus_id`
    WHERE p_num_commande = `ord_id`;

    -- Affichage de la réf produit, son nom, quantité, prix, remise, TVA applicable et total HT et TTC par ligne produit
    SELECT pro_ref AS ref_produit, pro_name AS nom_produit, ode_quantity AS quantite, ode_unit_price AS prix_unitaire, 20 AS 'TVA_applicable_(%)', ode_discount AS remise_unitaire, ode_quantity*ode_unit_price  AS prix_total_HT, ROUND(ode_unit_price*(1 - ode_discount/100)*ode_quantity*1.20, 2) AS prix_total_TTC
    FROM `orders`
    JOIN `orders_details`
        ON `ode_ord_id` = `ord_id`
    JOIN `products`
        ON `ode_pro_id` = `pro_id`
    WHERE p_num_commande = `ord_id`;

    -- Affichage du total commande HT et TTC ainsi que le total TVA et la condition de paiement
        SELECT SUM(ROUND(ode_unit_price*(1 - ode_discount/100)*ode_quantity, 2)) AS total_HT, 20 AS 'TVA_applicable_(%)', SUM(ROUND(ode_unit_price*(1 - ode_discount/100)*ode_quantity*20/100, 2)) AS 'total_TVA (€)', SUM(ROUND(ode_unit_price*(1 - ode_discount/100)*ode_quantity*1.20, 2)) AS total_TTC, 'comptant' AS reglement 
    FROM `orders`
    JOIN `orders_details`
        ON `ode_ord_id` = `ord_id`
    JOIN `products`
        ON `ode_pro_id` = `pro_id`
    WHERE p_num_commande = `ord_id`;

END |

DELIMITER ;
