<?php
require_once('database.php');
class UserDAO
{

    private $db_connect;

    public function insert($data)
    {

        $db_connect = connectToDB();
        $username = $data['username'];
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $mdp = $data['password'];
        $password = hash("sha256", $mdp);
        $stmt = $db_connect->prepare(" INSERT INTO Users(firstname,lastname,nickname,password) VALUES (:firstname, :lastname, :nickname, :password) ");

        try {
            $stmt->execute(array(':firstname' => $firstname, ':lastname' => $lastname, ':nickname' => $username, ':password' => $password));
            // echo "<br>yay, tu as réussi!";
            return "Ajouté avec succès !"; //retour pour la class Signin
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function verify($data)
    {

        $db_connect = connectToDB();
        $nom = $data['nom'];
        $mdp = $data['mdp'];
        $password = hash("sha256", $mdp);

        $sth = $db_connect->prepare("
        SELECT nickname,password,id
        FROM Users
        WHERE nickname = :nickname
    ");
        $sth->execute(
            array(
                ':nickname' => $nom,

            )
        );
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if ($result != FALSE) {
            if ($result['password'] == $password) {
                $_SESSION['nickname'] = $nom; //stocke la variable dans la superglobale Session
                $_SESSION['id'] = $result['id']; //stocke la variable dans la superglobale Session
                return 10;
            } else {
                return 12;
            }

        } else {
            return 11;
        }



    }
}