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
 * orderBy([[],[],[]],'key','desc');
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
