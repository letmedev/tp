<?php
namespace model\salleModel{

    use model\superModel\superModel;

    include('superModel.php');

    class salleModel extends superModel{

        // Méthode d'ajout de salle en base (La methode a besoin d'un tableau en entrée avec les données suivante: titre, pays, ville, adresse, cp, description, photo, capacite, categorie)
        public function addSalle(array $tab){

            extract($tab); // Création de variable: $titre, $pays, $ville, $adresse, $cp, $description, $photo, $capacite, $categorie.

            $capaciteInt = intval($capacite);

            $bdd = $this->getDatabase();
            // Verification de l'absence de la salle que nous souhaitons enregistrer en base en se basant sur son nom.
            $req = "SELECT titre FROM salle WHERE titre = :titre"; // Ecriture de la requete
            $requete = $bdd->prepare($req); // Preparation de la requete
            $requete->bindValue(':titre', $titre); // Remplissage de variable qui se trouve dans la requete
            $requete->execute();
            $resultat = $requete->fetch();

            if(!$resultat){
                // Si $resultat return false, alors nous pouvons passer a l'enregistrement
                $req = "INSERT INTO salle(titre, pays, ville, adresse, cp, description, photo, capacite, categorie) VALUES(:titre, :pays, :ville, :adresse, :cp, :description, :photo, :capacite, :categorie)";
                $reqInsert = $bdd->prepare($req);
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

                $this->msg .= 'Votre salle a bien été enregistrer.';
                echo $this->getMsg();
            } else{
                // Sinon nous affichon un msg indiquant que la salle existent déja.
                $this->msg .= 'La salle que vous souhaitez enregistrer existe déjà en base de données.';
                echo $this->getMsg();
            }
        }

        // Methode de selection d'une salle (A besoin du nom de la salle en argument)
        public function selectSalle($nom){

            $bdd= $this->getDatabase();
            $req = "SELECT id_salle, titre, pays, ville, adresse, cp, description, photo, capacite, categorie FROM salle WHERE titre= :nom";
            $requete = $bdd->prepare($req);
            $requete->bindValue(':nom', $nom);
            $requete->execute();
            $resultat = $requete->fetch();

            return $resultat;
        }

        // Méthode de selection de toutes les salles.
        public function selectAllSalle(){
            $bdd = $this->getDatabase();
            $req = "SELECT id_salle, titre, pays, adresse, ville, cp, description, photo, capacite, categorie FROM salle";
            $result = $bdd->query($req)->fetchAll();

            return $result;
        }

        // Méthode de modification d'un salle (La methode a besoin d'un tableau en entrée avec les données modifier ou non suivante: titre, pays, ville, adresse, cp, description, photo, capacite, categorie)
        public function editSalle($tab){
            extract($tab);
            $idInt = intval($id_salle);
            $capaciteInt = intval($capacite);

            $bdd = $this->getDatabase();
            $req = "SELECT id_salle, titre FROM salle WHERE id_salle = :id";
            $requete = $bdd->prepare($req);
            $requete->bindValue(':id', $idInt);
            $requete->execute();
            $resultatSelect = $requete->fetch();

            if($resultatSelect){
                $req = "UPDATE salle SET titre= :titre, pays= :pays, ville= :ville, adresse= :adresse, cp= :cp, description= :description, photo= :photo, capacite= :capacite, categorie= :categorie WHERE id_salle= :id";
                $requete = $bdd->prepare($req);
                $requete->bindValue(':id', $idInt);
                $requete->bindValue(':titre', $titre);
                $requete->bindValue(':pays', $pays);
                $requete->bindValue(':ville', $ville);
                $requete->bindValue(':adresse', $adresse);
                $requete->bindValue(':cp', $cp);
                $requete->bindValue(':description', $description);
                $requete->bindValue(':photo', $photo);
                $requete->bindValue(':capacite', $capaciteInt);
                $requete->bindValue(':categorie', $categorie);
                $requete->execute();

                $this->msg .= 'La salle ' . $titre . ' a bien été modifier !';
                echo $this->getMsg();
            } else{
                $this->msg .= 'La salle que vous souhaiter modifié n\'existe pas !';
                echo $this->getMsg();
            }
        }

        // Méthode de suppresion de salle qui a besoin du nom de la salle en argument
        public function deleteSalle($nom){

            $bdd = $this->getDatabase();
            $req = "SELECT id_salle FROM salle WHERE titre = :nom";
            $requete = $bdd->prepare($req);
            $requete->bindValue(':nom', $nom);
            $requete->execute();
            $resultatSelect = $requete->fetch();

            // Si resultatSelect retourne des information, c'est que la salle existe alors on recupère son ID afin de faire une req DELETE avec l'ID
            if($resultatSelect){
                $id = $resultatSelect['id_salle'];

                $req = "DELETE FROM salle WHERE id_salle= :id_salle ";
                $requete = $bdd->prepare($req);
                $requete->bindValue(':id_salle', $id);
                $requete->execute();

                $this->msg .= 'La salle ' . $nom . ' a bien été supprimer !';
                echo $this->getMsg();

            } else {
                $this->msg .= 'La salle ' . $nom . ' n\'existe pas !';
                echo $this->getMsg();
            }

        }

        // Méthode de recherche par ville retourn un tableau ou false
        private function searchByVille($arg){
            $bdd = $this->getDatabase();
            $req = "SELECT id_salle, titre, pays, adresse, ville, cp, description, capacite, categorie FROM salle WHERE ville= :ville";
            $requete = $bdd->prepare($req);
            $requete->bindValue(':ville', $arg);
            $requete->execute();
            $result = $requete->fetchAll();

            return $result;
        }

        // Méthode de recherche par nom de salle, renvoi un tableau ou false
        private function searchBytitre($arg){
            $bdd = $this->getDatabase();
            $req = "SELECT id_salle, titre, pays, adresse, ville, cp, description, capacite, categorie FROM salle WHERE titre= :titre";
            $requete = $bdd->prepare($req);
            $requete->bindValue(':titre', $arg);
            $requete->execute();
            $result = $requete->fetchAll();

            return $result;
        }

        //méthode de recherche de salle par capacite de personne, retourne un tableau ou false.
        private function searchByCapacite($arg){
            $bdd = $this->getDatabase();
            $req = "SELECT id_salle, titre, pays, adresse, ville, cp, description, capacite, categorie FROM salle WHERE capacite= :capacite";
            $requete = $bdd->prepare($req);
            $requete->bindValue(':capacite', $arg);
            $requete->execute();
            $result = $requete->fetchAll();

            return $result;
        }

        //Méthode de recherche génrérale qui fonction avec les méthode searchByTitre, searchByVille et searchByCapacite.
        public function searchSalle($keySearch){

            if($this->searchBytitre($keySearch)){

                $salle = $this->searchBytitre($keySearch);
                return $salle;

            } elseif($this->searchByVille($keySearch)){

                $salle = $this->searchByVille($keySearch);
                return $salle;
            } elseif($this->searchByCapacite($keySearch)){

                $salle = $this->searchByCapacite($keySearch);
                return $salle;
            } else{
                $this->msg .= 'Cette salle n\'existe pas!';
                return $this->getMsg();
            }
        }
    }
}

?>