<?php
class homeController extends Controller
{
    public function indexAction()
    {
	$this->output->view('index', 'home');
    }
}
