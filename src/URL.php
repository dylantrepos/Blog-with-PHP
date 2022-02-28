<?php

    namespace App;

use App\Helpers\Get;
use Exception;

class URL {

        public static function getInt(string $name, ?int $default = null): ?int
        {
            $__GET = Get::_GET();
            if(!isset($__GET[$name])) return $default;
            if($__GET[$name] === "0") return 0;
            if(!filter_var($__GET[$name], FILTER_VALIDATE_INT)){
                throw new Exception("Le paramètre '$name' dans l'url n'est pas un entier");
            }  
            return (int)$__GET[$name];
        }

        public static function getPositiveInt(string $name, ?int $default = null): ?int
        {
            $param = self::getInt($name, $default);
            if($param !== null && $param <= 0){
                throw new Exception("Le paramètre '$name' n'est pas un entier positif");
            }
            return $param;
        }

    }