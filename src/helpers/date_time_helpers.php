<?php
/**
 * Time related helpers
 */


if (!function_exists('timeNow')) {
    /**
     * timeNow
     * get current timestamp
     *
     * @return timestamp
     */
    function timeNow()
    {
        return date('Y-m-d H:i:s');
    }
}


if (!function_exists('timeAgo')) {
    /**
     * timeAgo
     *
     * used to create time ago from raw timestamp
     *
     * @param  time $time
     * @param  string $format
     *
     * @return string
     */
    function timeAgo($time, $format = 'l, F d, Y H:i')
    {
        $ts = strtotime($time);
        $granularity = 1;
        $dif = time() - $ts;
        $future = $dif < 0 ? true : false;
        $dif = abs($dif);
        // if ( $dif < 604800 ) { // 604800 7 days / 864000 10 days
        $periods = array(
            'Week' => 604800,
            'Day' => 86400,
            'Hour' => 3600,
            'Minute' => 60,
            'Second' => 1,
        );
        $output = '';
        foreach ($periods as $key => $value) {
            if ($dif >= $value) {
                $time = round($dif / $value);
                $dif %= $value;
                $output .= ($output ? ' ' : '') . $time . ' ';
                $output .= (($time > 1) ? $key . 's' : $key);
                $granularity--;
            }
            if ($granularity == 0) {
                break;
            }

        }
        if ($future) {
            return "In " . ($output ? $output : '0 seconds');
        } else {
            return ($output ? $output : '0 seconds') . ' ago';
        }
    }
}



if (!function_exists('getDayId')) {
    /**
     * getDayId
     * get week day from weekstring
     * @param  mixed $week_string only accept week first letter
     *
     * @return void
     */
    function getDayId(string $week_string=NULL)
    {
            if(is_null($week_string)){
                $dow_numeric = date('w');
            }else{
                $dow_numeric = date($week_string);
            }
        $dowMap = array('1', '2', '3', '4', '5', '6', '7');
        
        return $dowMap[$dow_numeric];
    }
}
