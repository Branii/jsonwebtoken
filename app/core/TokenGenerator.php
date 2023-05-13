<?php
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
    public function TokenEncoder(array $payload, string $privateKey) : string | false {

        $encoded = self::encryptToken($payload, $privateKey);
        $token = JWT::encode((array)$encoded, $privateKey, 'HS256');
        return $token;

    }

    /**
     * Summary of TokenDecoder
     * @param mixed $jwt
     * @param mixed $key
     * @return stdClass|false
     */
    public function TokenDecoder(string $token, string $privateKey) :  array | string {

        $token = JWT::decode($token, new Key($privateKey, 'HS256'));
        $array = json_decode(json_encode($token), true);
        $decoded = self::decryptToken($array[0],$privateKey);
        return $decoded;
    }

    /**
     * Summary of GetPrivateKey
     * @param mixed $pk
     * @return OpenSSLAsymmetricKey|bool
     */
    public function GetPrivateKey() : string {

        $passphrase = "1kball-ssh-key-chain-certificate";
        $privateKeyFile = __DIR__ . '/PrivateKey.pem';
        $privateKey = openssl_pkey_get_private(
        file_get_contents($privateKeyFile),
        $passphrase
        );
        openssl_pkey_export($privateKey, $private_key_string);
        return (string) $private_key_string;
    }

    /**
     * Summary of GetPublicKey
     * @param mixed $privateKey
     * @return OpenSSLAsymmetricKey
     */
    public function GetPublicKey($privateKey) : OpenSSLAsymmetricKey {

        $publicKey = openssl_pkey_get_details($privateKey)['key'];
        return $publicKey;
    }

    public function encryptToken($token, $privateKey) {

        $AES_256_CBC_ENC = 'aes-256-cbc';
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($AES_256_CBC_ENC));//initialisation vector
        $encrypted = openssl_encrypt(json_encode($token), $AES_256_CBC_ENC, $privateKey, 0, $iv);
        return $encrypted . ':' . base64_encode($iv);
    }

    public function decryptToken ($token,$privateKey){

        $AES_256_CBC_DEC = 'aes-256-cbc';
        $parts = explode(':', $token);
        $decrypted = openssl_decrypt($parts[0], $AES_256_CBC_DEC, $privateKey, 0, base64_decode($parts[1]));
        return $decrypted;
    }

}

