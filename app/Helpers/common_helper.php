<?php


if(!function_exists('segment')){ 
    
    function segment($param) 
    {
      $request = \Config\Services::request();
	  return $request->uri->getSegment($param);
    }

    function cUserId()
    {
    	return \Config\Services::session()->get('userId');
    }


}
