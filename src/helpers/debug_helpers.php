<?php
/**
 * Debug helpers
 */

if (!function_exists('json_output')) {
    /**
     * json_output
     *
     * @param  array $output
     * @param  boolean $exit
     * @param  int $httpStatus
     *
     * @return void
     */
    function json_output(array $output = [], bool $exit = true, int $httpStatus = 200)
    {
        header_remove();
        header('Access-Control-Allow-Origin: *');
        header("Content-type: application/json; charset=utf-8");
        http_response_code($httpStatus);

        $json = json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_ERROR_RECURSION);
        if ($json === false) {
            $json = json_encode(array("jsonError", json_last_error_msg()));
            if ($json === false) {
                $json = '{"jsonError": "unknown"}';
            }
            http_response_code(500);
        }
        echo $json;
        if ($exit) {exit;}

    }
}

if (!function_exists('d_echo')) {
    /**
     * d_echo
     *
     * @param  mixed $var
     * @param  mixed $die
     *
     * @return void
     */
    function d_echo(string $var, int $die = 0)
    {
        echo $var;
        if ($die == 1) {
            die('die function started, set to zero');
        }
    }
}

if (!function_exists('print_j')) {
    /**
     * print_j
     *
     * @param  mixed $params
     * @param  mixed $die
     *
     * @return void
     */
    function print_j($params = null, $die = false)
    {
        echo "<pre> ";
        print_r($params);
        echo "</pre>";
        if ($die) {
            die();
        }

    }
}

if (!function_exists('j_log')) {
    /**
     * j_log
     *
     * @param  mixed $data
     * @param  string  $file_url
     *
     * @return void
     */
    function j_log($data = null, string $file_url = null)
    {

        if (empty($file_url)) {
            $file_url = "./logs/" . date('mdY', time()) . ".txt";
        }
        if (!write_file($file_url, $data, 'a+')) {

            echo 'Unable to write the file';

        }

    }
}

if (!function_exists('false_response')) {
   
    /**
     * false_response
     *
     * @param  mixed $message
     * @param  mixed $code
     *
     * @return void
     */
    function false_response(string $message = '', int $code = 200)
    {
        $CI = &get_instance();
        $output = array(
            "status" => false,
            "code" => $code,
            'message' => $message,
        );
        return $output;
    }
}
if (!function_exists('true_response')) {
   
    /**
     * true_response
     *
     * @param  mixed $message
     * @param  mixed $code
     *
     * @return void
     */
    function true_response(string $message = '', int $code = 200)
    {
        $CI = &get_instance();
        $output = array(
            "status" => true,
            "code" => $code,
            'message' => $message,
        );
        return $output;
    }
}
