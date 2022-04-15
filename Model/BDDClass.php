<!-- Classe pour effectuer toutes mes requetes SQL dont la connexion à la BDD -->
<?php
class BDD {

    CONST user = 'root';
    CONST password = '';

    // Connexion à la base de donnée
    public function connection() {

        // Retourne l'objet bdd en cas de succès
        try {
            $bdd = new PDO("mysql:host=localhost;dbname=connection", self::user, self::password);
            return $bdd;
        // Retourne le message d'erreur et arrête le script en cas d'échec
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    // Methode permettant la création d'un nouvel utlisateur
    public function newUser($bdd,$name, $username,$email,$password,$role) {

        $passwordHash = $this->hashPassword($password);
        $sql = "INSERT INTO user (firstname, lastname, email, password, role) VALUES (?,?,?,?,?)";
        $query = $bdd->prepare($sql);
        $query->execute([$name, $username,$email,$passwordHash,$role]);

    }

    // Methode permettant de hasher le mot de passe avant enregistrement en bdd
    public function hashPassword($password) {

        return password_hash($password, PASSWORD_DEFAULT);
    }

    // Methode permettant la connexion d'un utilisateur existant
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