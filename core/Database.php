<?php
class Database extends PDO
{
    protected $_config;
    public static $num_req=0;


    public function __construct()
    {
	try{
	    $pdo_options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	    $this->_config=&Core::$config['db'];
	    parent::__construct($this->_config['dsn'], $this->_config['user'], $this->_config['pass'], $pdo_options);
	}catch(Exception $e)
	{
	    exit($e->getMessage());
	}
    }
    
    public function query($statement)
    {
	try{
	    self::$num_req++;
	    return parent::query($statement);
	}catch(Exception $e)
	{
	    exit($e->getMessage());
	}
    }
    
    public function prepare($statement, $driver_options = 'array()')
    {
	try{
	    self::$num_req++;
	    return parent::prepare($statement);
	}catch(Exception $e)
	{
	    exit($e->getMessage());
	}
    }


    public function execQuery($query, &$param)
    {
	$req = $this->prepare($query);
	return $req->execute($param);
    }


    public function selectAll($table)
    {
	$data = $this->query('SELECT * FROM `'.$table.'`');
	return $data->fetchAll();
    }
    
    public function countAll($table)
    {
	$data = $this->query('SELECT COUNT(*) FROM `'.$table.'`');
	$array=$data->fetch();
	return $array['COUNT(*)'];
    }
    
    public function delete($table, array &$cond)
    {
	$query='DELETE FROM `'.$table.'` WHERE ';
	foreach($cond as $col => $value)
	    $query.=$col.' = :'.$col.' ';
	return $this->execQuery($query, $cond);
    }
    
    public function create($table, array &$values)
    {
	$query='INSERT INTO '.$table.'(';
	$cols=array_flip($values);
	$query.=implode(',', $cols).') VALUES (';
	$query.=implode(', :', $cols).')';
	return $this->execQuery($query, $values);
    }
}
