<?php


if(!function_exists('propertyTypeArray')){
    
    function propertyTypeArray($pt){
	if($pt == 1){
        return ['bhk_type','complex_type','status_type']; 
	}elseif($pt == 2){

	}elseif($pt == 3){

	}elseif($pt == 4){

	}elseif($pt == 5){
        return ['complex_type','status_type'];
	}elseif($pt == 6){

	}else{
		return false;
	}
  }

}


if(!function_exists('propertyTypeAccess')){ 
    
    function propertyTypeAccess($access,$array){
	 if(in_array($access,$array)){
        return true;
	 }else{
	 	return false;
	 }
  }

}

if(! function_exists('fullUrl'))
{
  function fullUrl(){  
  	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  	return $actual_link;
  }
}
