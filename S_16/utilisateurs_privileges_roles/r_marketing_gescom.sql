

CREATE ROLE 'r_marketing_afpa_gescom'@'localhost';

GRANT SELECT, CREATE, UPDATE, DELETE 
ON afpa_gescom.products
TO 'r_marketing_afpa_gescom'@'localhost';

GRANT SELECT, CREATE, UPDATE, DELETE 
ON afpa_gescom.categories
TO 'r_marketing_afpa_gescom'@'localhost';

GRANT SELECT
ON afpa_gescom.orders
TO 'r_marketing_afpa_gescom'@'localhost';

GRANT SELECT
ON afpa_gescom.orders_details
TO 'r_marketing_afpa_gescom'@'localhost';

GRANT SELECT
ON afpa_gescom.customers
TO 'r_marketing_afpa_gescom'@'localhost';