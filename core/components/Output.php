<?php
class Output extends AbstractComponent
{
    protected $_view;
    protected $layout='layout.php';
    public $pageTitle='';
    protected $content='';
    protected $cacheFile='';


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
	if($this->_view->pageTitle!==false)
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
    
    public function startCache($id, $time=60)
    {
	$this->cacheFile=SYS.'cache/'.$id.'.html.cache';
	if(!file_exists($this->cacheFile) or filemtime($this->cacheFile) + $time < time())
	    return true;
	$this->content.=file_get_contents($this->cacheFile);
	return false;
    }
    
    public function endCache()
    {
	file_put_contents($this->cacheFile, $this->content);
    }
}
