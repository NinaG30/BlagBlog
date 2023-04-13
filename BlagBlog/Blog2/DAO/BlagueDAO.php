<?php
require_once('database.php');
class BlagueDAO
{
    // Obtenir toutes les blagues de la BDD
    public function getAll()
    {
        $db_connect = connectToDB();
        $results = $db_connect->query("SELECT * FROM blagues ORDER BY date DESC")
            ->fetchAll(PDO::FETCH_ASSOC);    
        return $results; //renvoie au controller Accueil.php
    }

    // Creer une blague
    public function insert_blague($data)
    {

        $db_connect = connectToDB();
        $title = $data['title'];
        $blague = $data['blague'];
        $stmt = $db_connect->prepare(" INSERT INTO blagues(title_blague,desc_blague, id_user) VALUES (:title, :blague, :id_user)");

        try {
            $stmt->execute(array(':title' => $title, ':blague' => $blague, ':id_user' => $_SESSION['id']));
            return "Ajouté avec succès !"; //retour pour la class Signin
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    // Obtenir toutes les blagues du User sur son profil
    public function getAllById()
    {

        $db_connect = connectToDB();
        $id = $_SESSION['id'];
        $results = $db_connect->query("SELECT * FROM blagues WHERE id_user = $id ORDER BY id_blague DESC")
            ->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($results);
        foreach ($results as $result) {
            echo "<div class='blague'>";
            echo "<h5>" . $result['title_blague'] . "</h5>";
            echo "<p>" . $result['desc_blague'] . "</p>";
            echo "<input type='hidden' value='" . $result['id_blague'] . "'>";
            echo "<a href='/Blog2/Dashboard/updateBlague/" . $result['id_blague'] . "'>Modifier</button>";
            echo "<a href='/Blog2/Dashboard/suppBlague/" . $result['id_blague'] . "'>Supprimer</a>";
            echo "</div>";
        }

        return $results;

    }

    // Supprimer une blague
    public function delete_blague($req)
    {
        $db_connect = connectToDB();
        $results = $db_connect->query("DELETE FROM `blagues` WHERE id_blague = $req");
        return TRUE;
    }


    // Stocker une note d'une blague
    public function setRate($note)
    {
        $db_connect = connectToDB();
        $rate = $_POST['rate'];
        $id_user = $_SESSION['id'];
        $id_blague = $_POST['blague'];
        $stmt = $db_connect->prepare("INSERT INTO Rating(rate,id_user,id_blague)
        VALUES (:rate, :id_user, :id_blague)");
        try {
            $stmt->execute(
                array(
                    ":rate" => $rate,
                    ":id_user" => $id_user,
                    ":id_blague" => $id_blague
                )
            );
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function update_blague($req, $a, $b)
    {
        echo $req;
        echo $a;
        echo $b;
        $db_connect = connectToDB();
        $stmt = $db_connect->prepare("UPDATE `blagues`
        SET title_blague = :b,
          desc_blague = :a          
        WHERE id_blague = :req");
        $stmt->bindParam(':b', $b);
        $stmt->bindParam(':a', $a);
        $stmt->bindParam(':req', $req);
        $stmt->execute();
        echo 'Blague modifiée';
        return TRUE;

    }

}