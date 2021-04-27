----------------------------------------------------------------------------------------------------------------
--  Exercice 3 : création d'une procédure stockée avec plusieurs paramètres  --
--  Créer la procédure stockée CA_Supplier, qui pour un code fournisseur et une année entrée en paramètre, calcule et restitue le CA potentiel de ce fournisseur pour l'année souhaitée.  --
----------------------------------------------------------------------------------------------------------------

DELIMITER |

CREATE PROCEDURE CA_Supplier(
    IN p_sup_id INT,
    IN p_year INT(4),
    OUT ca_pot DECIMAL(7,2)
)

BEGIN

DECLARE p_exist INT;
SET p_exist = (SELECT p_sup_id
                FROM suppliers
                WHERE sup_id = p_sup_id
                );

IF p_exist IS NOT NULL
THEN

    SELECT SUM(`ode_quantity`*(`ode_unit_price`-(`ode_unit_price`*`ode_discount`/100))) INTO ca_pot
    FROM `orders_details`
    JOIN `orders`
    ON `ode_ord_id` = `ord_id`
    JOIN `products`
    ON `ode_pro_id` = `pro_id`
    JOIN `suppliers`
    ON `pro_sup_id` = `sup_id`
    WHERE `ord_order_date` LIKE CONCAT(p_year,'%') AND `sup_id` = p_sup_id;
        IF ISNULL(ca_pot)
                THEN 
                SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Aucune donnée à afficher pour l\'année entrée en paramètre';
                
                ELSE
                SELECT ca_pot AS "CA_potentiel";
                END IF;
        

    ELSE
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Aucun fournisseur correspondant à cet ID';
    END IF;

END |

DELIMITER ;

--  TEST DE VALEURS --
CALL ca_supplier(0,2008,@ca_pot);
CALL ca_supplier(1,2008,@ca_pot);
CALL ca_supplier(3,2006,@ca_pot);

----------------------------------------------------------------------------------------------------------------
--  HORS EXERCICE - Vue du CA annuel de chaque fournisseur  --
----------------------------------------------------------------------------------------------------------------

CREATE VIEW v_ca_suppl
AS
SELECT `sup_id`, `sup_name`, SUM(`ode_quantity`*(`ode_unit_price`-(`ode_unit_price`*`ode_discount`/100))) AS CA_annuel, YEAR(`ord_order_date`) AS 'Année' 
FROM `orders_details` 
JOIN `orders` 
ON `ode_ord_id` = `ord_id` 
JOIN `products` 
ON `ode_pro_id` = `pro_id` 
JOIN `suppliers` 
ON `pro_sup_id` = `sup_id`  
GROUP BY Année
ORDER BY sup_id, Année ASC