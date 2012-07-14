<?php
class AbstractComponent
{
    protected $_config;
    protected $_vars=array();


    public function __construct()
    {
	$this->_config=&Core::$config;
    }

    public function __get($name)
    {
	if(isset($this->_vars[$name]))
	    return $this->_vars[$name];
	return Loader::getClass($name);
    }
    
    public function __set($name, $value)
    {
	$this->_vars[$name]=$value;
    }

        //plus pratique d'écrire $this->load... qui Loader::getClass...
    protected function &load($class, $path)
    {
	return Loader::getClass($class, $path);
    }
}
