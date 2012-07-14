<?php
class uploadController extends Controller
{
    public function indexAction()
    {
	$this->output->view('index', 'upload');
    }
    
    public function saveAction()
    {
	if(!isset($_FILES['fileToUpload']))
	{
	    $this->indexAction();
	    return;
	}
	$file=$_FILES['fileToUpload'];
	if($file['error']>0)
	    exit('erreur');
	move_uploaded_file($file['tmp_name'], ROOT.'upload_dir/'.uniqid());
	echo 'succès !';
    }
    
    public function uploadinfoAction($keyfile=false)
    {
	if($keyfile!==false)
	{
	    header('Content-type:text/plain;charset=utf-8');
	    $fileInformation = apc_fetch('upload_'.$keyfile);
	    exit(json_encode($fileInformation));
	}
    }
}
