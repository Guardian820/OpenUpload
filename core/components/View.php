<?php
class View extends AbstractComponent
{
    protected $file;
    protected $path;
    protected $content;
    protected $vars;


    public $pageTitle;


    public function __construct($file, $folder, array $vars = array())
    {
	$this->file=$file.EXT;
	$this->path=APP.'views/'.$folder.'/';
	$this->vars=&$vars;
	$this->genView();
    }
    
    private function genView()
    {
	if(!file_exists($this->path.$this->file))
	    throw new Exception('Vue "'.$this->file.'" inexistante !', '500');
	ob_start();
	extract($this->vars);
	include $this->path.$this->file;
	$this->content=ob_get_contents();
	ob_end_clean();
    }
    
    public function getContent()
    {
	return $this->content;
    }
    
    public function getCachedView($id, $time=60)
    {
	$file=SYS.'cache/'.$id;
	if(!file_exists($file))
	    return false;
	if(filemtime($file) > time() - $time)
	    return false;
	return $this->content;
    }
    
    public function cache($id)
    {
	file_put_contents(SYS.'cache/'.$id, $this->content);
    }
}
