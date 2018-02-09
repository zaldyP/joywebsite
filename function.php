 <?php 

 function redirect_to($location) {
 	global $connection;
	if (headers_sent($filename, $line)) {
	    trigger_error("Headers already sent in {$filename} on line {$line}", E_USER_ERROR);
	 }
  	header("Location: {$location}");
  	exit;
}


function sigFig($value, $sigFigs = 3) {
    setlocale(LC_ALL, 'it_IT@euro', 'it_IT', 'it'); 
    $exponent = floor(log10(abs($value))+1);
    $significand = round(($value
        / pow(10, $exponent))
        * pow(10, $sigFigs))
        / pow(10, $sigFigs);
    return $significand * pow(10, $exponent);
}

function format($value, $sigFigs = 2)
{
    $numero = $value;

    if ($numero > 999) {

      $units = array('k', 'k', 'M', 'G', 'T', 'P', 'E');

      $index = floor(log10($value)/3);
      $value = $index ? $value/pow(1000, $index) : $value;
      return sigFig($value, $sigFigs) . $units[$index];
    }else{
      return number_format($numero, 0, '', '.'); 
    }

    //Resultados:
      //9999 -> 9.999 views
      //10000 -> 10k views
      //10200 -> 10,2k views
}



function trim_text($input, $length, $ellipses = true, $strip_html = true) {
    //strip tags, if desired
    if ($strip_html) {
        $input = strip_tags($input);
    }
  
    //no need to trim, already shorter than trim length
    if (strlen($input) <= $length) {
        return $input;
    }
  
    //find last space within length
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);
  
    //add ellipses (...)
    if ($ellipses) {
        $trimmed_text .= '...';
    }
  
    return $trimmed_text;
}



function time_ago( $time )
    {
        $out    = ''; // what we will print out
        $now    = time(); // current time
        $diff   = $now - strtotime($time); // difference between the current and the provided dates

        if( $diff < 60 ) // it happened now
            return TIMEBEFORE_NOW;

        elseif( $diff < 3600 ) // it happened X minutes ago
            return str_replace( '{num}', ( $out = round( $diff / 60 ) ), $out == 1 ? TIMEBEFORE_MINUTE : TIMEBEFORE_MINUTES );

        elseif( $diff < 3600 * 24 ) // it happened X hours ago
            return str_replace( '{num}', ( $out = round( $diff / 3600 ) ), $out == 1 ? TIMEBEFORE_HOUR :  TIMEBEFORE_HOURS );

        elseif( $diff < 3600 * 24 * 2 ) // it happened yesterday
            return TIMEBEFORE_YESTERDAY;

        else // falling back on a usual date format as it happened later than yesterday
            return strftime(date('Y', strtotime($time)) == date( 'Y' ) ? date('d M',strtotime($time)) : date('d M Y',strtotime($time)));
    }


    function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}




 ?>

   