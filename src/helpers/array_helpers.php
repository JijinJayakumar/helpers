<?php
/**
 * a basic array helper
 *  
 */

if (!function_exists('nullRemove')) {
    /**
     * nullRemove
     *
     * @param  mixed $array
     *
     * @return void
     */
    function nullRemove(array $array = [])
    {
        return array_filter($array, function ($value) {return $value !== '';});
    }
}

if (!function_exists('checkIsArrayValueEmpty')) {
    /**
     * checkIsArrayValueEmpty
     *
     * @param  array $array
     *
     * @return void
     */
    function checkIsArrayValueEmpty(array $array)
    {
        array_walk($array, function ($value, $key) {
            if (empty($value)) {
                return false;
            }
            ;
        });
        return true;
    }
}



