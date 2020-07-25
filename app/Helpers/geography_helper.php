<?php

function countries()
{
	$geographyModel = model('GeographyModel');

}

function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }
    return $ipaddress;
}


function currentLocation()
{
	$public_ip = get_client_ip();
	$json      = file_get_contents("http://ipinfo.io/$public_ip/geo");
	$json      = json_decode($json, true);
	$country   = $json['country']; 
	$state    = $json['region']; 
	$city      = $json['city']; 
	return [
	  'ip'      => $public_ip, 
      'country' => $country,
      'state'   => $state,
      'city'    => $city
	];
}