DROP USER IF EXISTS 'util1'@'localhost';
CREATE USER 'util1'@'localhost' 
IDENTIFIED BY 'Pass2ouf';
GRANT ALL PRIVILEGES 
ON afpa_gescom.* 
TO 'util1'@'localhost' 
IDENTIFIED BY 'Pass2ouf';

DROP USER IF EXISTS 'util2'@'localhost';
CREATE USER 'util2'@'localhost' 
IDENTIFIED BY 'Pass2guedin';
GRANT SELECT
ON afpa_gescom.* 
TO 'util2'@'localhost' 
IDENTIFIED BY 'Pass2guedin';

DROP USER IF EXISTS 'util3'@'localhost';
CREATE USER 'util3'@'localhost' 
IDENTIFIED BY 'Pad1spi';
GRANT SELECT
ON afpa_gescom.suppliers 
TO 'util3'@'localhost' 
IDENTIFIED BY 'Pad1spi';