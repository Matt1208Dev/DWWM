-----------------------------------------------------------------------------------
--  Exercice 1 : création d'une procédure stockée sans paramètre
--  Créez la procédure stockée Lst_Suppliers correspondant à la requête afficher le nom des fournisseurs pour lesquels une commande a été passée.
-----------------------------------------------------------------------------------

DELIMITER |

CREATE PROCEDURE Lst_Suppliers()

BEGIN

    SELECT `sup_id` AS IdFournisseur, `sup_name` AS NomFournisseur
    FROM `suppliers`
    JOIN `products`
    ON `sup_id` = `pro_sup_id`
    JOIN `orders_details`
    ON `ode_pro_id` = `pro_id`
    JOIN `orders`
    ON `ord_id` = `ode_ord_id`
    GROUP BY `sup_id`;

END |

DELIMITER ;