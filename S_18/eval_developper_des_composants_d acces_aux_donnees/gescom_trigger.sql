
--  Création de la table `commander_articles`

CREATE TABLE commander_articles(
    codart INT NOT NULL,
    qte INT NOT NULL,
    com_date DATE NOT NULL,
    FOREIGN KEY (codart) REFERENCES products(pro_id)
);

--  Création du TRIGGER after_products_update

DELIMITER |

CREATE TRIGGER after_products_update
AFTER UPDATE ON products
FOR EACH ROW

BEGIN

DECLARE id_p INT;
DECLARE stk_phy INT;
DECLARE stk_alert INT;
DECLARE c_exist INT;

SET id_p = NEW.pro_id;  -- id_p stocke la valeur du pro_id de la ligne modifiée
SET stk_phy = NEW.pro_stock; -- stk_phy stocke la valeur de pro_stock de la ligne modifiée
SET stk_alert = (SELECT pro_stock_alert
                    FROM products
                    WHERE pro_id = id_p
                    ); -- stk_alert va récupérer et stocker la valeur de pro_stock_alert

SET c_exist = (SELECT codart
                    FROM commander_articles
                    WHERE codart = id_p); -- c_exist va chercher si le id_p correspond a un codart dans commander_articles

IF stk_phy < stk_alert -- si le stock physique est inférieur au stock d'alerte
THEN
    IF c_exist IS NOT NULL -- si le produit est deja présent dans la table commander_articles
    THEN
        UPDATE commander_articles SET qte = stk_alert-stk_phy, com_date = now() WHERE codart = id_p; -- on met à jour la quantité à commander et la date
    ELSE
        INSERT INTO commander_articles(codart, qte, com_date) -- sinon on crée la ligne dans commander_articles
        VALUES(id_p, stk_alert-stk_phy, now());
    END IF;
END IF;

END |

DELIMITER ;
