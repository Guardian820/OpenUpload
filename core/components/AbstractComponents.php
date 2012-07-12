<?php
class AbstractComponents
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
	if($name==='db')
	    Loader::initDbConnection ();
	return $this->_vars['db'];
    }
    
    public function __set($name, $value)
    {
	$this->_vars[$name]=$value;
    }
}
