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
        $command->bindParam("ss",$emal,$password);//isd other data ntype
        $command->execute();
        $result = $command->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result;
        } else {
            return "Invalid email or password";
        }

    }

}

//how to connect pdo php?