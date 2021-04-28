
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
-- 3. Un champ remise était prévu dans la table commande. Comment pourrait-on le prendre en compte ? --
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

DELIMITER |

CREATE TRIGGER maj_total -- TRIGGER d'insertion sur la table lignecommande
AFTER INSERT ON lignedecommande
FOR EACH ROW
BEGIN
    DECLARE id_c INT;
    DECLARE tot DOUBLE;
    SET id_c = NEW.id_commande; -- nous captons le numéro de commande concerné
    SET tot = (SELECT sum((prix-prix*remise/100)*quantite) 
                FROM lignedecommande
               JOIN commande
               ON id_commande = id
                WHERE id_commande=id_c); -- on recalcul le total
    UPDATE commande SET total = tot WHERE id=id_c; -- on stock le total dans la table commande
END |

DELIMITER ;

DELIMITER |


CREATE TRIGGER maj_total_update -- TRIGGER de modification sur la table lignecommande
AFTER UPDATE ON lignedecommande
FOR EACH ROW
BEGIN
    DECLARE id_c INT;
    DECLARE tot DOUBLE;
    SET id_c = NEW.id_commande; -- nous captons le numéro de commande concerné
    SET tot = (SELECT sum((prix-prix*remise/100)*quantite) 
                FROM lignedecommande
               JOIN commande
               ON id_commande = id
                WHERE id_commande=id_c); -- on recalcul le total
    UPDATE commande SET total = tot WHERE id=id_c; -- on stock le total dans la table commande
END |

DELIMITER ;

DELIMITER |

CREATE TRIGGER maj_total_delete -- TRIGGER de suppression sur la table lignecommande
AFTER DELETE ON lignedecommande
FOR EACH ROW
BEGIN
    DECLARE id_c INT;
    DECLARE tot DOUBLE;
    SET id_c = OLD.id_commande; -- nous captons le numéro de commande concerné
    SET tot = (SELECT sum((prix-prix*remise/100)*quantite) 
                FROM lignedecommande
               JOIN commande
               ON id_commande = id
                WHERE id_commande=id_c); -- on recalcul le total
    UPDATE commande SET total = tot WHERE id=id_c; -- on stock le total dans la table commande
END |

DELIMITER ;