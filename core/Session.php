<?php
class Session
{
    protected $SESSID;
    protected $_vars=array();
    
    public function __get($name) {
	if(isset($this->_vars[$name]))
	    return $this->_vars[$name];
	return false;
    }
    
    public function __set($name, $value) {
	$this->_vars[$name]=$value;
    }

    public function __construct() {
	if(!isset($_COOKIE['openupload:SESSID']))
	{
	    $this->SESSID=hash('sha256', md5(rand(-100, 100)).uniqid().'azs544µ*dfgoer+=^$§wq<');
	    setcookie('openupload:SESSID', $this->SESSID, 0, '/');
	}else
	    $this->SESSID=$_COOKIE['openupload:SESSID'];
	if(($data=apc_fetch('openupload_session:'.$this->SESSID))!==false)
	{
	    $this->_vars=$data;
	    if($this->_vars['REMOTE_ADDR']!==$_SERVER['REMOTE_ADDR'])
		$this->destroy();
	}
    }
    
    public function destroy()
    {
	$this->_vars=array();
	$key='openupload_session:'.$this->SESSID;
	if(apc_exists($key))
	    apc_delete ($key);
    }
    
    public function __destruct() {
	$key='openupload_session:'.$this->SESSID;
	if($this->_vars!==array())
	{
	    $this->_vars['REMOTE_ADDR']=$_SERVER['REMOTE_ADDR'];
	    apc_store($key, $this->_vars, 7200);
	}
    }
}
