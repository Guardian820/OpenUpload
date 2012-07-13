<?php
class AbstractComponent
{
    protected $_config;
    protected $_vars=array();
    
    public function __construct()
    {
	$this->_config=&Core::$config;
	$this->_vars=&Loader::$loaded_class;
    }

    public function __get($name)
    {
	if(isset($this->_vars[$name]))
	    return $this->_vars[$name];
	return false;
    }
    
    //plus pratique d'écrire $this->load... qui Loader::getClass...
    protected function &load($class, $path)
    {
	return Loader::getClass($class, $path);
    }
}
