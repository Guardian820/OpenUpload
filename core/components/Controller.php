<?php
class Controller extends AbstractComponent
{
    protected $output;
    
    public function __construct()
    {
	parent::__construct();
	$this->output=&Loader::getClass('Output');
    }
    
    protected function &loadModel($name)
    {
	return Loader::getClass($name.'Model', APP.'models/');
    }
}
