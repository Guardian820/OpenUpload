<?php
class Loader
{
    const NO_FILE=0;
    const NO_CLASS=1;
    const NO_METHOD=2;
    
    public static function load_class($class, $path)
    {
	$file=$path.$class.EXT;
	if(!file_exists($file))
	    return self::NO_FILE;
	require $file;
	if(!class_exists($class))
	    return self::NO_CLASS;
	return new $class;
    }
    
    public static function load_page($controller, $method, array $vars)
    {
	$controller=self::load_class($controller.'Controller', APP.'controllers/');
	if(!is_object($controller))
	    return $controller;
	if(!call_user_func_array(array($controller,$method), $vars))
	    return self::NO_METHOD;
	return true;
    }
}
