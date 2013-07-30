<?php

class App_Utility_Hash 
{
    
    public static function hash($data, $algo = 'sha512')
    {
        $key = "DATA_SPOT_GHENT_SALT";
        
        return hash_hmac($algo, $data, $key);
    }
    
}