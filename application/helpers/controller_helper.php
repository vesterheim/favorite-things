<?php
if (!function_exists('insert_into__POST')) {
    function insert_into__POST($array) {
		if ($array === FALSE || is_array($array) !== TRUE || is_assoc($array) !== TRUE)
		{
			return FALSE;
		}
		foreach($array as $key => $val)
	    {
	    	$_POST[$key] = $val;
	    }
	    return TRUE;
    } 
}

if (!function_exists('indefinte article')) {
    function indefinite_article($number) {
    	if ($number == 8)
    	{
    		return 'an';
    	}
    	return 'a';
    } 
}