<?php

    namespace App\Helpers;

    class Get {
        public static function _GET(){
            $__GET = array();
            $ru = $_SERVER['REQUEST_URI'];
            $_get_str = explode('?', $ru);
            if( !isset($_get_str[1]) ) return $__GET;
            $params = explode('&', $_get_str[1]);
            foreach ($params as $p) {
                $parts = explode('=', $p);
                $__GET[$parts[0]] = isset($parts[1])? $parts[1] : '';
            }
            return $__GET;
        }
    }