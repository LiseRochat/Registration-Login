<?php

class BDD {

    CONST user = 'root';
    CONST password = '';

    public function connection() {

        try {
            $bdd = new PDO("mysql:host=localhost;dbname=connection", self::user, self::password);
            return $bdd;

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function newUser($bdd,$name, $username,$email,$password,$role) {

        $passwordHash = $this->hashPassword($password);
        $sql = "INSERT INTO user (firstname, lastname, email, password, role) VALUES (?,?,?,?,?)";
        $query = $bdd->prepare($sql);
        $query->execute([$name, $username,$email,$passwordHash,$role]);

    }

    public function hashPassword($password) {

        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function login($bdd, $password, $email) {

        $sql = "SELECT * FROM user WHERE email = '$email'";
        $query = $bdd->query($sql)->fetch();

        if(password_verify($password, $query['password'])) {
            
            echo "connecter !!";
            return $query;

        } else {
            
            echo "try again !!";
        }

    }
}