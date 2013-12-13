<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('clean_id'))
{		
	/**
	  * clean_id
	  * Returns trimed, unsigned integer value 
	  *
	  * @param mixed $input
	  * @return integer 
	  *
	  * 32 bit systems have a maximum signed integer range of -2147483648 to 2147483647
	  * The maximum signed integer value for 64 bit systems is 9223372036854775807.
	  *
	  */ 
	function clean_id ($input)
	{
		return abs(intval($input));
	}
}

if ( ! function_exists('is_idish'))
{		
	/**
	  * is_integerish
	  * Determines input looks like a valid ID 
	  *
	  * @param string|integer $input
	  * @return boolean  
	  *
	  */ 
	function is_idish($input)
	{
		return (filter_var($input, FILTER_VALIDATE_INT) !== FALSE && (intval($input) > 0));
	}
}