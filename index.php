<?php
/*
 * OpenUpload
 * By v4vx
 * Projet de site d'upload open source
 * Merci de respecter le travaille effectué !
 */
define('ROOT', __DIR__.'/');
define('SYS', ROOT.'core/');
define('APP', ROOT.'app/');
define('PUBLIC', ROOT.'public/');
define('CONFIG', ROOT.'config/');
define('EXT', '.php');

require_once SYS.'Core'.EXT;
$app=new Core;

try{
    $app->run();
}catch (Exception $e)
{
    $e->getMessage();
}

var_dump(Core::$config);
$app->benchmarks();
