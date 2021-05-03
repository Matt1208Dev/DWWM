-------------------------------------------------------------------------------------------------------------------------------------------------

/* ENONCE DE L EVAL TRANSACTIONS

Amity HANAH, Manageuse au sein du magasin d'Arras, vient de prendre sa retraite. Il a été décidé, après de nombreuses tractations, de confier son poste au pépiniériste le plus ancien en poste dans ce magasin. Ce dernier voit alors son salaire augmenter de 5% et ses anciens collègues pépiniéristes passent sous sa direction.

Ecrire la transaction permettant d'acter tous ces changements en base des données.

    La base de données ne contient actuellement que des employés en postes. Il a été choisi de garder en base une liste des anciens collaborateurs de l'entreprise parti en retraite. Il va donc vous falloir ajouter une ligne dans la table posts pour référencer les employés à la retraite.


-------------------------------------------------------------------------------------------------------------------------------------------------
--  Décrire les opérations qui seront à réaliser sur la table posts.
-------------------------------------------------------------------------------------------------------------------------------------------------

 Les opérations sont les suivantes : 

-   Créer la ligne "Retraité" dans la table `posts`
-   Notifier que Amity HANAH est en retraite en mettant à jour l'ID de son poste dans la table `employees`
-   Identifier les pépiniéristes du magasin d'Arras dans la table `employees`.
-   Identifier le plus ancien; celui qui est promus en tant que manager.
-   Modifier l'ID du supérieur de tous les autres pépiniéristes du magasin d'Arras dans la table `employees` pour les passer subordonnés du nouveau manager. 
-   Modifier l'ID du poste du plus ancien pépiniériste dans la table `employees` pour le passer manager.
-   Augmenter de 5% son salaire.

+ Supplément non demandé dans l'Eval

-   Identifier le supérieur des Managers de Arras
-   Affecter ce même supérieur au pépiniériste passé manager.



-------------------------------------------------------------------------------------------------------------------------------------------------
--  Ecrire les requêtes correspondant à ces opérations.
-------------------------------------------------------------------------------------------------------------------------------------------------

-- Création de la ligne "Retraité"

INSERT INTO `posts`(`pos_libelle`) VALUES ("Retraité");


-- Modification de la ligne d'Amity HANNAH pour la notifier en retraite

UPDATE `employees` 
SET emp_pos_id = (SELECT pos_id   -- Recherche de l'id du statut de retraité dans la table posts 
                    FROM `posts` 
                    WHERE pos_libelle = "Retraité") 
WHERE  `emp_lastname` = "HANNAH" AND `emp_firstname` = "Amity";


-- Modification du supérieur hiérarchique des pépiniéristes du magasin d'Arras. La valeur sera celle du plus ancien.

UPDATE `employees` a
SET a.emp_superior_id = (SELECT * FROM(SELECT b.emp_id FROM `employees` b  -- Recherche du pépiniériste le plus ancien d'Arras
                JOIN `posts` 
                ON b.emp_pos_id = pos_id
                JOIN `shops`
                ON b.emp_sho_id = sho_id
                WHERE pos_libelle = "Pépiniériste" AND sho_city = "Arras"
                GROUP BY b.emp_pos_id
                HAVING MIN(b.emp_enter_date))tmp)
WHERE a.emp_pos_id = (SELECT * FROM(SELECT `emp_pos_id` FROM `employees` c -- Recherche des pépiniéristes d'Arras
                JOIN `posts` 
                ON c.emp_pos_id = pos_id
                JOIN `shops`
                ON c.emp_sho_id = sho_id
                WHERE pos_libelle = "Pépiniériste" AND sho_city = "Arras"
                GROUP BY emp_pos_id) tmp1);



-- Modification de la ligne du pépiniériste le plus ancien. Nous mettons à jour respectivement son poste, son salaire et son supérieur hiérarchique (je lui attribue logiquement le même supérieur que celui des autres Manager(/geuse) de Arras)

UPDATE `employees` b
SET b.emp_pos_id = (SELECT pos_id    -- Recherche de l'id du poste de Manager dans la table posts
                    FROM `posts` 
                    WHERE pos_libelle LIKE "Manager%"),
    b.emp_salary = b.emp_salary + b.emp_salary*5/100,   -- Augmentation de salaire de 5%
    b.emp_superior_id = (SELECT * FROM (SELECT a.emp_id FROM `employees` AS a     -- Recherche du supérieur des Managers d'Arras
                                        JOIN `employees` AS b
                                            ON a.`emp_superior_id` = b.`emp_id`
                                        JOIN `shops`
                                            ON a.`emp_sho_id` = `sho_id`
                                        JOIN `posts` AS c
                                            ON c.`pos_id` = a.`emp_pos_id`
                                        JOIN `posts` AS d
                                            ON d.`pos_id` = b.`emp_pos_id`
                                        WHERE a.`emp_superior_id` = b.`emp_id` AND d.pos_libelle LIKE 'Manager%' AND `sho_city` = 'Arras') tmp)
WHERE b.emp_id = (SELECT * FROM(SELECT a.emp_id FROM `employees` a    -- Recherche du pépiniériste le plus ancien d'Arras
                JOIN `posts` 
                ON a.emp_pos_id = pos_id
                JOIN `shops`
                ON a.emp_sho_id = sho_id
                WHERE pos_libelle = "Pépiniériste" AND sho_city = "Arras"
                GROUP BY a.emp_pos_id
                HAVING MIN(a.emp_enter_date)) tmp);

*/

-------------------------------------------------------------------------------------------------------------------------------------------------
--  Ecrire la transaction
-------------------------------------------------------------------------------------------------------------------------------------------------

--  La création de la ligne "Retraité" est volontairement mise hors de la transaction car cette action est définitive et ne nécessite pas d'être intégrée à celle-ci. Un SELECT est inséré avant et après la transaction pour constater le avant/après.

INSERT INTO `posts`(`pos_libelle`) VALUES ("Retraité");

SELECT * FROM `employees` 
                JOIN `posts` 
                ON emp_pos_id = pos_id
                JOIN `shops`
                ON emp_sho_id = sho_id
                WHERE sho_city = "Arras" AND emp_pos_id IN (14,2,39);


START TRANSACTION;

UPDATE `employees` 
SET emp_pos_id = (SELECT pos_id 
                    FROM `posts` 
                    WHERE pos_libelle = "Retraité") 
WHERE  `emp_lastname` = "HANNAH" AND `emp_firstname` = "Amity";

UPDATE `employees` a
SET a.emp_superior_id = (SELECT * FROM(SELECT b.emp_id FROM `employees` b
                JOIN `posts` 
                ON b.emp_pos_id = pos_id
                JOIN `shops`
                ON b.emp_sho_id = sho_id
                WHERE pos_libelle = "Pépiniériste" AND sho_city = "Arras"
                GROUP BY b.emp_pos_id
                HAVING MIN(b.emp_enter_date))tmp)
WHERE a.emp_pos_id = (SELECT * FROM(SELECT `emp_pos_id` FROM `employees` c
                JOIN `posts` 
                ON c.emp_pos_id = pos_id
                JOIN `shops`
                ON c.emp_sho_id = sho_id
                WHERE pos_libelle = "Pépiniériste" AND sho_city = "Arras"
                GROUP BY emp_pos_id) tmp1);

UPDATE `employees` b
SET b.emp_pos_id = (SELECT pos_id 
                    FROM `posts` 
                    WHERE pos_libelle LIKE "Manager%"),
    b.emp_salary = b.emp_salary + b.emp_salary*5/100,
    b.emp_superior_id = (SELECT * FROM (SELECT a.emp_id FROM `employees` AS a
                                        JOIN `employees` AS b
                                            ON a.`emp_superior_id` = b.`emp_id`
                                        JOIN `shops`
                                            ON a.`emp_sho_id` = `sho_id`
                                        JOIN `posts` AS c
                                            ON c.`pos_id` = a.`emp_pos_id`
                                        JOIN `posts` AS d
                                            ON d.`pos_id` = b.`emp_pos_id`
                                        WHERE a.`emp_superior_id` = b.`emp_id` AND d.pos_libelle LIKE 'Manager%' AND `sho_city` = 'Arras') tmp)
WHERE b.emp_id = (SELECT * FROM(SELECT a.emp_id FROM `employees` a
                JOIN `posts` 
                ON a.emp_pos_id = pos_id
                JOIN `shops`
                ON a.emp_sho_id = sho_id
                WHERE pos_libelle = "Pépiniériste" AND sho_city = "Arras"
                GROUP BY a.emp_pos_id
                HAVING MIN(a.emp_enter_date)) tmp);


COMMIT;

SELECT * FROM `employees` 
                JOIN `posts` 
                ON emp_pos_id = pos_id
                JOIN `shops`
                ON emp_sho_id = sho_id
                WHERE sho_city = "Arras" AND emp_pos_id IN (14,2,39);






