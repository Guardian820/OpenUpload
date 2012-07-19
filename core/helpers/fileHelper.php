<?php
class fileHelper
{
    public function humanSize($Byte)
    {
	$formats=array('o','Kio','Mio','Gio');
	for($i=0;$i<count($formats);$i++)
	{
	    if($Byte<pow(1024, $i+1))
	    {
		$format=$formats[$i];
		$div=pow(1024,$i);
		break;
	    }
	}
	$size=$Byte/$div;
	return number_format($size, 1).' '.$format;
    }
}
