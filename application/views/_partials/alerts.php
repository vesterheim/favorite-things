<?php
if (isset($alerts) === TRUE && is_array($alerts)=== TRUE && count($alerts) > 0)
{
	$output = array();
	foreach ($alerts as $alert)
	{
		$output[] = '<div class="alert alert-';
		$output[] = $alert['type'];
		$output[] = ' alert-dismissable fade in"><button type="button" class="close" data-dismiss="alert">&times;</button>';
		$output[] = $alert['message'];
		$output[] = '</div>';
	}
	echo implode('', $output);
}