<?php
class homeController extends Controller
{
    public function indexAction($name = 'Guest')
    {
	$this->output->view('index', 'home', array('name'=>$name));
    }
}
