<?php
require "../../vendor/autoload.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

/**
 * Summary of TokenGenerator
 */
class TokenGenerator {
    
    /**
     * Summary of generateToken
     * @param mixed $payload
     * @param mixed $key
     * @return |false
     */
    public function TokenEncoder(array $payload, string $key) : string | false {

        $jwt = JWT::encode($payload, $key, 'HS256');
        return $jwt;

    }

    public function TokenDecoder(string $jwt, string $key) : stdClass | false {

        $jwt = JWT::decode($jwt, new Key($key, 'HS256'));
        return $jwt;

    }

}