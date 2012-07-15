<?php
class urlHelper
{
    protected $config;
    
    public function __construct() {
	$this->config=&Core::$config;
    }
    
    public function genUrl($controller = 'home', $method = 'index', $vars = array())
    {
	if(is_array($vars))
	    $vars = implode('/', $vars);
	$index = $this->config['rewrite'] ? '' : 'index.php/';
	return $this->config['base_url'].$index.$controller.'/'.$method.'/'.$vars;
    }
    
    public function link($content, $controller = 'home', $method = 'index', $vars = array(), $title='')
    {
	return '<a href="'.$this->genUrl($controller, $method, $vars).'" title="'.$title.'">'.$content.'</a>';
    }
    
    public function urlLink($url)
    {
	return '<a href="'.$url.'">'.$url.'</a>';
    }
    
    public function redirect($controller = 'home', $method = 'index', $vars = array())
    {
	header('location: '.$this->genUrl($controller, $method, $vars));
    }
}
