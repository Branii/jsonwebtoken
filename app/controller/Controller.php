<?php

/**
 * Summary of Controller
 */
class Controller {

    /**
     * Summary of user
     * @var 
     */
    private $user;
    /**
     * Summary of __construct
     * @param User $user
     */
    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * Summary of processValidation
     * @param mixed $email
     * @param mixed $password
     * @return void
     */
    public function processValidation(string $email, string $password) : string | false {

        $result = $this->user->validateUser($email, $password);
        if (is_array($result)) {
            $payload = [
                "id" => $result["uid"],
                "email" => $result["email"],
                "password" => $result["password"],
                'iss' => '1kball Admin',
                'aud' => '1kball User',
                'iat' => 1356999524,
                'nbf' => 1357000000
            ];
            $token = (new TokenGenerator())->TokenEncoder((array) $payload, (new TokenGenerator())->GetPrivateKey());
            return (string) $token;
        } else {
            return (string) $result;
        }
    }

    /**
     * Summary of decryptToken
     * @param mixed $encryptedToken
     * @param mixed $privateKey
     * @return bool|stdClass
     */
    public function decryptToken($Token, $privateKey){
        return (new TokenGenerator())->TokenDecoder($Token,$privateKey);
    }

} //...