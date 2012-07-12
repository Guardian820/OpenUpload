<?php
class Output extends AbstractComponent
{
    protected $_view;
    protected $layout='layout.php';
    public $pageTitle='';
    protected $content='';


    public function setLayout($name)
    {
	$this->layout=$name;
    }
    
    public function __get($name) {
	if(isset($this->_vars[$name]))
	    return $this->_vars[$name];
	return Loader::getClass($name, SYS.'helpers/');
    }
    
    public function view($name, $folder = '',array $vars = array())
    {
	$this->_view=new View($name, $folder, $vars);
	$this->pageTitle=$this->_view->pageTitle;
	$this->content.=$this->_view->getContent();
    }
    
    public function display()
    {
	if($this->content === '')
	    return;
	$content=$this->content;
	include APP.'views/layouts/'.$this->layout;
    }
}
