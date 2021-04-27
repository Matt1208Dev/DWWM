-----------------------------------------------------------------------------------------------------------------
-- Afficher la liste des hôtels avec leur station. --
-----------------------------------------------------------------------------------------------------------------

CREATE VIEW v_hotel_station
AS
SELECT `hot_id` AS "Hotel ID", `hot_nom` AS "Nom hotel", `hot_sta_id` AS "Station ID", `sta_nom` AS "Nom station" 
FROM `hotel`
JOIN `station`
ON `hot_sta_id` = `sta_id`;


-----------------------------------------------------------------------------------------------------------------
-- Afficher la liste des chambres et leur hôtel --
-----------------------------------------------------------------------------------------------------------------

CREATE VIEW v_chambre_hotel
AS
SELECT `cha_numero` AS "Numéro de chambre", `cha_capacite` AS "Capacité", `hot_nom` AS "Hotel"
FROM `chambre`
JOIN `hotel`
ON `cha_hot_id` = `hot_id`;


-----------------------------------------------------------------------------------------------------------------
-- Afficher la liste des réservations avec le nom des clients --
-----------------------------------------------------------------------------------------------------------------

CREATE VIEW v_reservation_client
AS
SELECT `res_date` AS "Date réservation", `res_id` AS "Numéro réservation", `res_cli_id` AS "Numéro client", `cli_nom` AS "Nom client"
FROM `reservation`
JOIN `client`
ON `res_cli_id` = `cli_id`;


-----------------------------------------------------------------------------------------------------------------
-- Afficher la liste des chambres avec le nom de l'hôtel et le nom de la station --
-----------------------------------------------------------------------------------------------------------------

CREATE VIEW v_chambre_hotel_station
AS
SELECT `cha_numero` AS "Numéro de chambre", `cha_capacite` AS "Capacité", `hot_nom` AS "Hotel", `sta_nom` AS "Nom station"
FROM `chambre`
JOIN `hotel`
ON `cha_hot_id` = `hot_id`
JOIN `station`
ON `hot_sta_id` = `sta_id`;


-----------------------------------------------------------------------------------------------------------------
-- Afficher les réservations avec le nom du client et le nom de l'hôtel --
-----------------------------------------------------------------------------------------------------------------

CREATE VIEW v_reservation_client_hotel
AS
SELECT `res_date` AS "Date réservation", `res_id` AS "Numéro réservation", `res_cli_id` AS "Numéro client", `cli_nom` AS "Nom client", `hot_nom` AS "Nom hotel"
FROM `reservation`
JOIN `client`
ON `res_cli_id` = `cli_id`
JOIN `chambre`
ON `res_cha_id` = `cha_id`
JOIN `hotel`
ON `cha_hot_id` = `hot_id`;

