#!/bin/bash 
echo "===== Création de la base de données ====="
echo "Veuillez saisir le nom d'utilisateur de votre base de données"
read user
echo "Veuillez saisir le mot de passe de votre base de données"
read -s password
mysql -h localhost -u $user -p$password -e "CREATE DATABASE projet2aMaster CHARACTER SET 'utf8';"
mysql -h localhost -u $user -p$password -D projet2aMaster -e "CREATE TABLE IF NOT EXISTS miniatures (
  titre varchar(255) NOT NULL,
  chemin text NOT NULL,
  xml text NOT NULL,
  pdf varchar(500) NOT NULL,
  barcode varchar(255) NOT NULL,
  genre varchar(255) NOT NULL,
  vital_status varchar(255) NOT NULL,
  race varchar(255) NOT NULL,
  pays varchar(255) NOT NULL,
  tumeur varchar(255) NOT NULL,
  daysToBirth varchar(255) NOT NULL,
  daysToDeath varchar(255) NOT NULL,
  tumor_status varchar(255) NOT NULL,
  last_contact varchar(255) NOT NULL,
  age_diagnosis varchar(255) NOT NULL,
  er_status varchar(255) NOT NULL,
  pr_status varchar(255) NOT NULL,
  her2_status varchar(255) NOT NULL,
  histological_type varchar(255) NOT NULL,
  pathologic_stage varchar(255) NOT NULL,
  pathologic_T varchar(255) NOT NULL,
  pathologic_N varchar(255) NOT NULL,
  pathologic_M varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;"
