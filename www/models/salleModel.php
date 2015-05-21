<?php
require_once('superModel.php');

class salleModel extends superModel{

    // Méthode d'ajout de salle en base
    public function addSalle(array $tab){

        extract($tab); // Création de variable: $titre, $pays, $ville, $adresse, $cp, $description, $photo, $capacite, $categorie.

        $capaciteInt = intval($capacite);

        $bdd = $this->getDatabase();
        // Verification de l'absence de la salle que nous souhaitons enregistrer en base en se basant sur son nom.
        $req = "SELECT titre FROM salle WHERE titre = :titre";
        $requete = $bdd->prepare($req);
        $requete->bindValue(':titre', $titre);
        $requete->execute();
        $resultat = $requete->fetch();

        if(!$resultat){
            // Si $resultat return false, alors nous pouvons passer a l'enregistrement
            //$req = "INSERT INTO salle(titre, pays, ville, adresse, cp, description, photo, capacite, categorie) VALUES($titre, $pays, $ville, $adresse, $cp, $description, $photo, $capacite, $$categorie)";
            $reqInsert = $bdd->prepare("INSERT INTO salle(titre, pays, ville, adresse, cp, description, photo, capacite, categorie) VALUES(:titre, :pays, :ville, :adresse, :cp, :description, :photo, :capacite, :categorie)");
            $reqInsert->bindValue(':titre', $titre);
            $reqInsert->bindValue(':pays', $pays);
            $reqInsert->bindValue(':ville', $ville);
            $reqInsert->bindValue(':adresse', $adresse);
            $reqInsert->bindValue(':cp', $cp);
            $reqInsert->bindValue(':description', $description);
            $reqInsert->bindValue(':photo', $photo);
            $reqInsert->bindValue(':capacite', $capaciteInt);
            $reqInsert->bindValue(':categorie', $categorie);
            $reqInsert->execute();

            echo 'Votre salle a bien été enregistrer.';
        } else{
            // Sinon nous affichon un msg indiquant que la salle existent déja.
            echo 'La salle que vous souhaitez enregistrer existe déjà en base de données.';
        }
    }

    // Methode de selection d'une salle
    public function selectSalle($nom){

        $bdd= $this->getDatabase();
        $req = "SELECT id_salle, titre, pays, ville, adresse, cp, description, photo, capacite, categorie FROM salle WHERE titre= '". $nom ."'";
        $result = $bdd->query($req);
        $resultat = $result->fetchAll();

        return $resultat;
    }

    // Méthode de selection de toute les salles.
    public function selectAllSalle(){

    }

    public function editSalle(){

    }

    public function deleteSalle(){

    }

    public function searchSalle(){

    }
}

?>