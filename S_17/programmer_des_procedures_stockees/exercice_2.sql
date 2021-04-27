----------------------------------------------------------------------------------------------------------------
--  Exercice 2 : création d'une procédure stockée avec un paramètre en entrée  --
--  Créer la procédure stockée Lst_Rush_Orders, qui liste les commandes ayant le libelle "commande urgente".  --
----------------------------------------------------------------------------------------------------------------

DELIMITER |

CREATE PROCEDURE Lst_Rush_Orders(IN p_ord_status VARCHAR(25))

BEGIN

SELECT `ord_id` AS IdCommande, `ord_order_date` AS DateCommande, `ord_cus_id` AS NumClient, `ord_status` AS CommentaireCommande,  CONCAT(`cus_lastname`, ' ', `cus_firstname`) AS NomClient
FROM `orders`
JOIN `customers`
ON ord_cus_id = `cus_id`
WHERE ord_status = p_ord_status
GROUP BY `ord_id`;

END |

DELIMITER ;