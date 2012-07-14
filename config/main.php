<?php
/*
 * fichier de configuration
 * principale.
 * A modifier impérativement !
 */

return array(
    'db'=>require 'database'.EXT,
    'autoloading'=>require 'autoloading'.EXT,
    'classmap'=>require 'classmap'.EXT,
    
    'name'=>'OpenUpload',
    'base_url'=>'http://127.0.0.1/openupload/',
    'rewrite'=>false,
    
);
