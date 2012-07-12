<?php
class Core
{
    public static $config;
    
    protected $_uri;
    protected $start_time;


    public function __construct()
    {
	$this->includes();
	$this->start_time=microtime(true);
	$this->_uri=&Loader::getClass('Uri', SYS);
	self::$config=require CONFIG.'main'.EXT;
    }
    
    private function includes()
    {
	require_once 'Loader'.EXT;
	//require_once 'Controller'.EXT;
    }


    public function run()
    {
	if(($error=Loader::load_page($this->_uri->controller, $this->_uri->method, $this->_uri->vars) !== true))
	{
	    echo 'erreur !';
	}
    }
    
    public function benchmarks()
    {
	echo '<table>
                  <tr>
		      <td>Generation time : </td>
		      <td>'.number_format(microtime(true)-$this->start_time, 4).' sec</td>
		  </tr>
		  <tr>
		      <td>Memory use : </td>
		      <td>'.memory_get_usage().' Kb</td>
		  </tr>
	      </table>';
    }
}
