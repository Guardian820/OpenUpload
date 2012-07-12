<?php
class assetHelper
{
    protected $config;
    
    public function __construct() {
	$this->config=&Core::$config;
    }
    
    public function img($src, $title='')
    {
	return '<img src="'.$this->config['base_url'].'public/images/'.$src.'" title="'.$title.'" />';
    }
    
    public function js($src)
    {
	return '<script src="'.$this->config['base_url'].'public/js/'.$src.'.js" type="text/javascript"></script>';
    }
    
    public function css($src)
    {
	return '<link href="'.$this->config['base_url'].'public/css/'.$src.'.css" rel="stylesheet" type="text/css" />';
    }
}
