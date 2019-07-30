<?php
/**
 * @category String helpers
 */

if (!function_exists('randomString')) {
/**
 * randomString generator
 *
 * @param  integer $limit
 *
 * @return string
 */
    function randomString($limit = 10)
    {
        $date = date('ljSofFYhisA');
        return substr(str_shuffle(str_repeat('abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', 10)), 0, $limit);
    }
}

if (!function_exists('randomProductOrderNumber')) {
/**
 * randomProductOrderNumber
 *
 * generate a random product id
 *
 * @param  integer $limit
 *
 * @return string
 */
    function randomProductOrderNumber(int $limit = 4)
    {
        $date = date('ljSofFYhisA');
        $string = substr(str_shuffle(str_repeat(strtoupper('abcdefghijklmnopqrstuvwxyz'), 10)), 0, $limit);
        $rand = strtoupper(substr(uniqid(sha1(time())), 0, 6));
        return $string . '' . $rand;
    }
}

if (!function_exists('trimText')) {

    /**
     * trimText
     *
     * @param  mixed $text
     * @param  integer $maxLength
     * @param  mixed $trimIndicator
     *
     * @return void
     */
    function trimText(string $text, int $maxLength, $trimIndicator = '...')
    {
        if (strlen($text) > $maxLength) {
            $shownLength = $maxLength - strlen($trimIndicator);
            if ($shownLength < 1) {
                throw new \InvalidArgumentException('Second argument for ' . __METHOD__ . '() is too small.');
            }
            preg_match('/^(.{0,' . ($shownLength - 1) . '}\w\b)/su', $text, $matches);
            return (isset($matches[1]) ? $matches[1] : substr($text, 0, $shownLength)) . $trimIndicator;
        }
        return $text;
    }
}

if (!function_exists('splitName')) {
    /**
     * splitName
     *
     * @param  mixed $name
     *
     * @return void
     */
    function splitName(string $name)
    {
        $arr = explode(' ', $name);
        $num = count($arr);
        $first_name = $middle_name = $last_name = null;

        if ($num == 2) {
            list($first_name, $last_name) = $arr;
        } else {
            list($first_name, $middle_name, $last_name) = $arr;
        }

        return (empty($first_name) || $num > 3) ? false : compact(
            'first_name', 'middle_name', 'last_name'
        );
    }
}



if (!function_exists('generateEmailAddress')) {
    /**
     * generateEmailAddress
     *
     * @param  int $maxLenLocal
     * @param  int $maxLenDomain
     *
     * @return void
     */
    function generateEmailAddress(int $maxLenLocal = 5, int $maxLenDomain = 5)
    {
        $numeric = '0123456789';
        $alphabetic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $extras = '.-_';
        $all = $numeric . $alphabetic . $extras;
        $alphaNumeric = $alphabetic . $numeric;
        $alphaNumericP = $alphabetic . $numeric . "-";
        $randomString = '';

        // GENERATE 1ST 4 CHARACTERS OF THE LOCAL-PART
        for ($i = 0; $i < 4; $i++) {
            $randomString .= $alphabetic[rand(0, strlen($alphabetic) - 1)];
        }
        // GENERATE A NUMBER BETWEEN 20 & 60
        $rndNum = rand(20, $maxLenLocal - 4);

        for ($i = 0; $i < $rndNum; $i++) {
            $randomString .= $all[rand(0, strlen($all) - 1)];
        }

        // ADD AN @ SYMBOL...
        $randomString .= "@";

        // GENERATE DOMAIN NAME - INITIAL 3 CHARS:
        for ($i = 0; $i < 3; $i++) {
            $randomString .= $alphabetic[rand(0, strlen($alphabetic) - 1)];
        }

        // GENERATE A NUMBER BETWEEN 15 & $maxLenDomain-7
        $rndNum2 = rand(15, $maxLenDomain - 7);
        for ($i = 0; $i < $rndNum2; $i++) {
            $randomString .= $all[rand(0, strlen($all) - 1)];
        }
        // ADD AN DOT . SYMBOL...
        $randomString .= ".";

        // GENERATE TLD: 4
        for ($i = 0; $i < 4; $i++) {
            $randomString .= $alphaNumeric[rand(0, strlen($alphaNumeric) - 1)];
        }

        return $randomString;

    }
}


