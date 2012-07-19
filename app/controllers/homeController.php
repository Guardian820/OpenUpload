<?php
class homeController extends Controller
{
    public function indexAction()
    {
	//$this->Session->name='azerty';
	$this->output->view('index', 'home');
    }
}
