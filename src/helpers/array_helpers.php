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

if (!function_exists('arrayOrderBy')) {
/**
 * arrayOrderBy
 *
 * @param  mixed $items
 * @param  mixed $attr
 * @param  mixed $order
 *
 * @return array
 * arrayOrderBy([[],[],[]],'key','desc');
 */
    function arrayOrderBy(array $items, $attr, $order)
    {
        $sortedItems = [];
        foreach ($items as $item) {
            $key = is_object($item) ? $item->{$attr} : $item[$attr];
            $sortedItems[$key] = $item;
        }
        if ($order === 'desc') {
            krsort($sortedItems);
        } else {
            ksort($sortedItems);
        }

        return array_values($sortedItems);
    }
}

if (!function_exists('arrayVariadicSum')) {
/**
 * arrayVariadicSum
 *Takes an indefinite number of integers and returns their sum
 * @param  mixed $numbers
 *
 * @return void
 * example variadicSum(1, 2);

 */
    function arrayVariadicSum(...$numbers)
    {
        $sum = 0;
        foreach ($numbers as $num) {
            $sum += $num;
        }
        return $sum;
    }
}

if (!function_exists('arrayReject')) {
/**
 * arrayReject
 * Filters the collection using the given callback.
 * @param  array $items
 * @param  function $func
 *
 *reject(['Apple', 'Pear', 'Kiwi', 'Banana'], function ($item) {
 *return strlen($item) > 4;
 *}); // ['Pear', 'Kiwi']
 *
 * @return void
 */
    function arrayReject($items, $func)
    {
        return array_values(array_diff($items, array_filter($items, $func)));
    }

}

if (!function_exists('arrayTake')) {

/**
 * arrayTake
 *Returns an array with n elements removed from the beginning.
 * @param  mixed $items
 * @param  mixed $n
 *
 * @return void
 */
    function arrayTake($items, $remove_from_beginning_index = 1)
    {
        return array_slice($items, 0, $remove_from_beginning_index);
    }
}
