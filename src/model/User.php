<?php
/**
 * Summary of User
 */
class User {

    private PDO $dblink;

    /**
     * Summary of __construct
     * @param Dbutitl $dbutitl
     */
    public function __construct(Dbutitl $dbutitl) {
        $this->dblink = $dbutitl->dbLink();
    }

    /**
     * Summary of validateUser
     * @param mixed $email
     * @param mixed $password
     * @return void
     */
    public function validateUser(string $email, string $password) : array | string {

        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $command = $this->dblink->prepare($sql);
        $command->bindParam(1,$email,PDO::PARAM_STR);//
        $command->bindParam(2,$password,PDO::PARAM_STR);//
        $command->execute();
        $result = $command->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else {
            return "Invalid email or password";
        }

    }

}

//how to ...