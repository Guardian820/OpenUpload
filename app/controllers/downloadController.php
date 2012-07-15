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
	
    }
    
    public function searchAction()
    {
	
    }
}
