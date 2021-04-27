--------------------------------------------------------------------------------------------------------------------
-- Créez une vue qui affiche le catalogue produits. L'id, la référence et le nom des produits, ainsi que l'id et le nom de la catégorie doivent apparaître. --
--------------------------------------------------------------------------------------------------------------------

CREATE VIEW v_products_categories
AS
SELECT `pro_id` AS "ID produit", `pro_ref` AS "Référence", `pro_name` AS "Nom", `pro_cat_id` AS "ID catégorie", `cat_name` AS "Catégorie"
FROM `products`
JOIN `categories`
ON `pro_cat_id` = `cat_id`
GROUP BY `pro_id`;