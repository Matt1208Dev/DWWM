-- Identification de la base --

USE jarditou;
DROP TABLE IF EXISTS users ;
-- Création de la table `users` --

CREATE TABLE `users` (

    `user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_lastname` VARCHAR(50) NOT NULL,
    `user_firstname` VARCHAR(50) NOT NULL,
    `user_email` VARCHAR(100) NOT NULL,
    `user_login` VARCHAR(30) NOT NULL,
    `user_password` VARCHAR(255) NOT NULL,
    `user_creation_date` DATETIME NOT NULL,
    `user_last_log` DATETIME
)ENGINE = InnoDB;

-- FIN Script --