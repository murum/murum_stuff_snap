<?php

class Common {

	const STANDARD_DATETIME_FORMAT='Y-m-d H:i:s';

    /*
    * Method to strip tags globally.
    */
    public static function globalXssClean() {
        // Recursive cleaning for array [] inputs, not just strings.
        $sanitized = static::arrayStripTags(Input::get());
        Input::merge($sanitized);
    }

    public static function arrayStripTags($array) {
        $result = array();

        foreach ($array as $key => $value) {
            // Don't allow tags on key either, maybe useful for dynamic forms.
            $key = strip_tags($key);

            // If the value is an array, we will just recurse back into the
            // function to keep stripping the tags out of the array,
            // otherwise we will set the stripped value.
            if (is_array($value)) {
                $result[$key] = static::arrayStripTags($value);
            } else {
                // I am using strip_tags(), you may use htmlentities(),
                // also I am doing trim() here, you may remove it, if you wish.
                $result[$key] = trim(strip_tags($value));
            }
        }

        return $result;
    }

    public static function checkUserAgent() {
        if(empty($_SERVER['HTTP_USER_AGENT'])) {
            throw new Exception("Error Processing Request", 1);
        }
    }

    public static function ipIsFree() {
        $date = new DateTime();
        $date->modify('-1 day');

        $users = Card::whereIpAddress(Request::getClientIp())->where('created_at', '>=', $date)->get();

        return (count($users) > 0) ? false : true;
    }

    public static function getUserByBusyIP() {
        $date = new DateTime();
        $date->modify('-1 day');

        return Card::whereIpAddress(Request::getClientIp())->where('created_at', '>=', $date)->get()->last();
    }
}