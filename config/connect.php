<?php 
	
	$connection = mysqli_connect('localhost','root', '', 'cms');
	if(!$connection){
		echo "Error: Enable to connect to MYSQL." . PHP_EOL;
		echo "Debugging errno:" .mysqli_connect_errno(). PHP_EOL;
		echo "Debugging error:" .mysqli_connect_error(). PHP_EOL;
		exit;
	}

	date_default_timezone_set('Asia/Manila');
	
	define( 'TIMEBEFORE_NOW',         'Just now' );
    define( 'TIMEBEFORE_MINUTE',      '{num} minute ago' );
    define( 'TIMEBEFORE_MINUTES',     '{num} minutes ago' );
    define( 'TIMEBEFORE_HOUR',        '{num} hour ago' );
    define( 'TIMEBEFORE_HOURS',       '{num} hours ago' );
    define( 'TIMEBEFORE_YESTERDAY',   'Yesterday' );
    define( 'TIMEBEFORE_FORMAT',      '%e %b' );
    define( 'TIMEBEFORE_FORMAT_YEAR', '%e %b, %Y' );
	
 ?>