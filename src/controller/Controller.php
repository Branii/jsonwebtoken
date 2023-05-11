<?php

/**
 * Summary of Controller
 */
class Controller {

    private $user;
    public function __construct(User $user) {
        $this->user = $user;
    }

    public function processValidation(?string $email, ?string $password) {

        $result = $this->user->validateUser($email, $password);
        if (is_array($result)) {
            $payload = [
                "id" => $result["uid"],
                "email" => $result["email"],
                "password" => $result["password"]
            ];
            define("SECRET_KEY",md5($result["email"]));
            $token = (new TokenGenerator())->TokenEncoder($payload, SECRET_KEY);
            echo $token;
        } else {
            echo $result;
        }
       
    }

}