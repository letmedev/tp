<?php

namespace model\avisModel{

    use model\superModel\superModel;

    include('superModel.php');

    class avisModel extends superModel{

        public function selectAvisBySalle($id_salle){
            $bdd = $this->getDatabase();
            $req = "SELECT id_avis, id_membre, id_salle, commentaire, note, date_avis FROM avis WHERE id_salle = :id_salle";
            $requete = $bdd->prepare($req);
            $requete->bindValue(':id_salle', $id_salle);
            $requete->execute();
            $result = $requete->fetchAll();

            return $result;
        }

        public function selectAvisByMembre($id_membre){
            $bdd = $this->getDatabase();
            $req = "SELECT id_avis, id_membre, id_salle, commentaire, note, date_avis FROM avis WHERE id_membre = :id_membre";
            $requete = $bdd->prepare($req);
            $requete->bindValue(':id_membre', $id_membre);
            $requete->execute();
            $result = $requete->fetchAll();

            return $result;
        }

        public function addAvis(array $tab){
            extract($tab);

            $bdd = $this->getDatabase();
            $req = "INSERT INTO avis(id_membre, id_salle, commentaire, note, date_avis) VALUES(:id_membre, :id_salle, :commentaire, :note, NOW())";
            $requete = $bdd->prepare($req);
            $requete->bindValue(':id_membre', $id_membre);
            $requete->bindValue(':id_salle', $id_salle);
            $requete->bindValue(':commentaire', $commentaire);
            $requete->bindValue(':note', $note);
            $requete->execute();
        }
    }
}
?>