<?php
class Loader
{
    const NO_FILE=10;
    const NO_CLASS=11;
    const NO_METHOD=12;
    const LOADED=13;


    public static $loaded_class=array();
    
    public static function load_class($class, $path)
    {
	if(isset(self::$loaded_class[$class]))
	    return self::$loaded_class[$class];
	$file=$path.$class.EXT;
	if(!file_exists($file))
	    return self::NO_FILE;
	require $file;
	if(!class_exists($class))
	    return self::NO_CLASS;
	self::$loaded_class[$class]=new $class;
	return self::LOADED;
    }
    
    public static function &getClass($class, $path=null)
    {
	if(isset(self::$loaded_class[$class]))
	    return self::$loaded_class[$class];
	if($path===null && isset(Core::$config['classmap'][$class]))
	{
	    $path=Core::$config['classmap'][$class];
	}
	if(($state=self::load_class($class, $path))===self::LOADED)
	    return self::$loaded_class[$class];
	else
	    return $state;
    }

    public static function load_page($controller, $method, array $vars)
    {
	$controller=self::getClass($controller.'Controller', APP.'controllers/');
	if(!is_object($controller))
	    return $controller;
	if(call_user_func_array(array($controller,$method.'Action'), $vars)===false)
	    return self::NO_METHOD;
	return self::LOADED;
    }    
}
