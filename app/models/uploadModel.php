<?php
class uploadModel extends Model
{
    public function addFile($uid, $file_id, $name, $descr, $user, $size, $md5)
    {
	$this->db->create('files', array(
	    'uid'=>$uid,
	    'file_id'=>$file_id,
	    'file_name'=>$name,
	    'description'=>$descr,
	    'owner'=>$user,
	    'size'=>$size,
	    'md5_sum'=>$md5
	));
    }
    
    public function find($keyFile)
    {
	$data=$this->db->find('files', array('uid'=>$keyFile));
	if(count($data)<1)
	    return false;
	return $data[0];
    }
    
    public function fileExist($md5)
    {
	$files=$this->db->select('files', array('file_id'), array('md5_sum'=>$md5), true);
	if(count($files)<1)
	    return false;
	return $files[0]['file_id'];
    }
}
