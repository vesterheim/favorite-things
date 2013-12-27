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

if ( ! function_exists('clean_rating'))
{		
	/**
	  * clean_rating
	  * Returns trimed, unsigned integer value 
	  *
	  * @param mixed $input
	  * @return integer 
	  *
	  */ 
	function clean_rating($input)
	{
		return abs(intval($input));
	}
}

if ( ! function_exists('is_valid_id'))
{		
	/**
	  * is_valid_id
	  * Determines if input looks like a valid ID 
	  *
	  * @param string|integer $input
	  * @return boolean  
	  *
	  */ 
	function is_valid_id($input)
	{
		return (filter_var($input, FILTER_VALIDATE_INT, array('min_range' => 1)) !== FALSE);
	}
}

if ( ! function_exists('is_valid_ip'))
{		
	/**
	  * is_valid_ip
	  * Determines if input looks like a valid IP 
	  *
	  * @param string|integer $input
	  * @return boolean  
	  *
	  */ 
	function is_valid_ip($input)
	{
		return (filter_var($input, FILTER_VALIDATE_IP) !== FALSE);
	}
}

if ( ! function_exists('is_valid_rating'))
{		
	/**
	  * is_valid_rating
	  * Determines if input is a integer between 1 and 10
	  *
	  * @param string|integer $input
	  * @return boolean  
	  *
	  */ 
	function is_valid_rating($input)
	{
		return (filter_var($input, FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 10))) !== FALSE);
	}
}