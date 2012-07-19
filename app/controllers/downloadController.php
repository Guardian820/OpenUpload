<?php
class downloadController extends Controller
{
    public function fileAction($keyFile=null)
    {
	if($keyFile===null)
	{
	    $this->searchAction();
	    return;
	}
	$this->loadModel('upload');
	if(($data=$this->uploadModel->find($keyFile))===false)
	    return;
	$this->output->view('file', 'download', $data);
    }
    
    public function downloadAction($keyFile=0)
    {
	$this->loadModel('upload');
	if(($data=$this->uploadModel->find($keyFile))===false)
	    return;
	$filename=ROOT.'upload_dir/'.$data['file_id'];
	header('Content-Type: "'.$data['type'].'"');
	header('Content-Disposition: attachment; filename="'.$data['file_name'].'"');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header("Content-Transfer-Encoding: binary");
	header('Pragma: public');
	header("Content-Length: ".$data['size']);
	$file=fopen($filename, 'r');
	while($data=fgets($file))
	{
	    echo $data;
	}
        exit;
    }
    
    public function searchAction()
    {
	
    }
}
