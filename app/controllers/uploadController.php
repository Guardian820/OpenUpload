<?php
class uploadController extends Controller
{
    public function indexAction()
    {
	$this->output->view('index', 'upload');
    }
    
    public function saveAction()
    {
	if(!isset($_FILES['fileToUpload']) or !isset($_POST['descr']))
	{
	    $this->indexAction();
	    return;
	}
	$file=$_FILES['fileToUpload'];
	if($file['error']>0)
	    exit('erreur');
	$this->loadModel('upload');
	$md5=md5_file($file['tmp_name']);
	$uid=uniqid();
	if(($file_id=$this->uploadModel->fileExist($md5))===false)
	{
	    $file_id=$uid;
	    move_uploaded_file($file['tmp_name'], ROOT.'upload_dir/'.$file_id);
	}
	$size=filesize(ROOT.'upload_dir/'.$file_id);
	$this->uploadModel->addFile($uid, $file_id, $file['name'], $_POST['descr'], -1, $size, $md5);
	$this->urlHelper->redirect('upload', 'success', array($uid));
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
    
    public function successAction($keyFile=null)
    {
	if($keyFile===null)
	{
	    $this->indexAction();
	    return;
	}
	if(($fileData=$this->loadModel('upload')->find($keyFile))===false)
	{
	    $this->urlHelper->redirect('upload');
	    return;
	}
	$this->output->view('success', 'upload', array(
	    'name'=>$fileData['file_name'],
	    'uid'=>$fileData['uid'],
	    'description'=>$fileData['description']
	));
    }
}
