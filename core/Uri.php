<?php
class Uri
{
    private $path_info;
    private $controller;
    private $method;
    private $vars=array();
    
    public function __construct() {
	$this->path_info=isset($_SERVER['PATH_INFO']) ? substr($_SERVER['PATH_INFO'], 1) : 'home';
	$url=explode('/', $this->path_info);
	$this->controller=isset($url[0]) ? $url[0] : 'home';
	$this->method=isset($url[1]) ? $url[1] : 'index';
	$this->vars=count($url)>=3 ? array_slice($url, 2) : array();
    }
    
    public function __get($name) {
	return $this->$name;
    }
}
