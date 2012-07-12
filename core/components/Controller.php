<?php
class Controller extends AbstractComponent
{
    protected function &loadModel($name)
    {
	//Loader::getClass... plus rapide que $this->load...
	//et comme le code est "caché" osef ;)
	return Loader::getClass($name.'Model', APP.'models/');
    }
}
