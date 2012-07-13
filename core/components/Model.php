<?php
class Model extends AbstractComponent
{
    public function __construct() {
	parent::__construct();
    }
    
    public function __get($name) {
	if($name==='db')
	    return Loader::getClass ('Database', SYS);
	return parent::__get($name);
    }   
    
}
