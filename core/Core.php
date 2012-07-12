<?php
class Core
{
    public static $config;
    
    protected $_uri;
    protected $_output;
    protected $start_time;


    public function __construct()
    {
	$this->includes();
	$this->start_time=microtime(true);
	$this->_uri=&Loader::getClass('Uri', SYS);
	$this->_output=&Loader::getClass('Output', SYS);
    }
    
    //toutes les inclusions nécesaires
    private function includes()
    {
	self::$config=require CONFIG.'main'.EXT;
	require_once 'Loader'.EXT;
	require_once 'components/AbstractComponent'.EXT;
	require_once 'components/Controller'.EXT;
	require_once 'components/View'.EXT;
    }


    public function run()
    {
	if(($state=Loader::load_page($this->_uri->controller, $this->_uri->method, $this->_uri->vars)) !== Loader::LOADED)
	{
	    switch($state)
	    {
		case Loader::NO_FILE:
		    echo 'Fichier inexistant !';
		    break;
		case Loader::NO_CLASS:
		    echo 'Class inexistante !';
		    break;
		case Loader::NO_METHOD:
		    echo 'Method inexistante !';
		    break;
		default :
		    echo 'Erreur inconnue !';
	    }
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
    
    public function display()
    {
	$this->_output->display();
    }
}
