<?php
class Output
{
    protected $_view;
    protected $layout='layout.php';
    protected $content='';
    protected $cacheFile='';
    protected $_vars=array();


    public function setLayout($name)
    {
	$this->layout=$name;
    }
    
    public function __get($name) {
	if(isset($this->_vars[$name]))
	    return $this->_vars[$name];
	return Loader::getClass($name);
    }
    
    public function view($name, $folder = '',array $vars = array())
    {
	$this->_view=new View($name, $folder, $vars);
	$this->content.=$this->_view->getContent();
	$this->_vars+=$this->_view->getVars();
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
	$data=unserialize(file_get_contents($this->cacheFile));
	$this->content.=$data['contents'];
	$this->_vars+=$data['vars'];
	return false;
    }
    
    public function endCache()
    {
	$data=serialize(array(
	    'contents'=>$this->content,
	    'vars'=>$this->_vars,
	));
	file_put_contents($this->cacheFile, $data);
    }
}
