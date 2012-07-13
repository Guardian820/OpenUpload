<?php
class homeController extends Controller
{
    public function indexAction($name = 'Guest')
    {
	if($this->output->startCache('home'))
	{
	    $this->loadModel('test');
	    $this->output->view('index', 'home', array('name'=>$name,'data'=>$this->testModel->data()));
	    $this->output->endCache();
	}
    }
}
