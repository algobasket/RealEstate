<?php


if(!function_exists('segment')){ 
    
    function segment($param) 
    {
      $request = \Config\Services::request();
	  return $request->uri->getSegment($param);
    }  

}


 function cUserId()
    {
    	return \Config\Services::session()->get('userId');
    }

    function count_digit($number)
    {
       return strlen($number);
    }

    function divider($number_of_digits)
    {
	       $tens="1";

		  if($number_of_digits>8)
		    return 10000000;

		  while(($number_of_digits-1)>0)
		  {
		    $tens.="0";
		    $number_of_digits--;
		  }
		  return $tens;
	}

	function displayPrice($num)
	{
		//$num = "789";
		$ext="";//thousand,lac, crore
		$number_of_digits = count_digit($num); //this is call :)
		    if($number_of_digits>3)
		{
		    if($number_of_digits%2!=0)
		        $divider=divider($number_of_digits-1);
		    else
		        $divider=divider($number_of_digits);
		}
		else
		    $divider=1;

		$fraction=$num/$divider;
		$fraction=number_format($fraction,2);
		if($number_of_digits==4 ||$number_of_digits==5)
		    $ext="k";
		if($number_of_digits==6 ||$number_of_digits==7)
		    $ext="Lac";
		if($number_of_digits==8 ||$number_of_digits==9)
		    $ext="Cr";
		return $fraction." ".$ext;
	}


	function convertCurrency($number)
	{
	    // Convert Price to Crores or Lakhs or Thousands
	    $length = strlen($number);
	    $currency = '';

	    if($length == 4 || $length == 5)
	    {
	        // Thousand
	        $number = $number / 1000;
	        $number = round($number,2);
	        $ext = "Thousand";
	        $currency = $number." ".$ext;
	    }
	    elseif($length == 6 || $length == 7)
	    {
	        // Lakhs
	        $number = $number / 100000;
	        $number = round($number,2);
	        $ext = "Lac";
	        $currency = $number." ".$ext;

	    }
	    elseif($length == 8 || $length == 9)
	    {
	        // Crores
	        $number = $number / 10000000;
	        $number = round($number,2);
	        $ext = "Cr";
	        $currency = $number.' '.$ext;
	    }

	    return $currency;
	}

