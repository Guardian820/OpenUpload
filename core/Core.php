<?php
class Core
{
    public static $config;
    public static $start_time;


    protected $_uri;
    protected $_output;


    public function __construct()
    {
	$this->includes();
	$this->autoloading();
	self::$start_time=microtime(true);
	$this->_uri=&Loader::getClass('Uri', SYS);
	$this->_output=&Loader::getClass('Output', SYS.'components/');
    }
    
    //toutes les inclusions nécesaires
    private function includes()
    {
	self::$config=require CONFIG.'main'.EXT;
	require_once 'Loader'.EXT;
	require_once 'components/AbstractComponent'.EXT;
	require_once 'components/Controller'.EXT;
	require_once 'components/View'.EXT;
    }
    
    private function autoloading()
    {
	foreach(self::$config['autoloading'] as $class => $path)
	    Loader::load_class($class, $path);
    }


    public function run()
    {
	if(($state=Loader::load_page($this->_uri->controller, $this->_uri->method, $this->_uri->vars)) !== Loader::LOADED)
	{
	    switch($state)
	    {
		case Loader::NO_FILE:
		    echo 'Fichier inexistant !';
		    break;
		case Loader::NO_CLASS:
		    echo 'Class inexistante !';
		    break;
		case Loader::NO_METHOD:
		    echo 'Method inexistante !';
		    break;
		default :
		    echo 'Erreur inconnue !';
	    }
	}
    }
    
    public function display()
    {
	$this->_output->display();
    }
}
