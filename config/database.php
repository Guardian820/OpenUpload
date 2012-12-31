<?php
/*
 * Configuration de la connexion
 * à la bdd
 * Uitlise PDO
 */

return array(
    //dsn de connexion (mysql dans ce cas)
    'dsn'=>'mysql:host=127.0.0.1;dbname=openupload',
    
    //informations de connexion
    //inutile pour sqlite !
    'user'=>'root',
    'pass'=>''
);
