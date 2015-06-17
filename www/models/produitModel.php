<?php

namespace model\produitModel{

    use model\superModel\superModel;

    include('superModel.php');

    class produitModel extends superModel{

        public function addProduit($tab){
            extract($tab);
        }

        public function selectProduitByTitre($titre){
            $bdd = $this->getDatabase();

            $req = "SELECT s.id_salle, s.titre, s.pays, s.ville, s.adresse, s.cp, s.description,
        s.photo, s.capacite, s.categorie, p.date_arrivee, p.date_depart, p.id_promo, p.prix, p.etat
        FROM salle s, produit p
        WHERE produit.id_salle = salle.id_salle
        AND salle.titre = :titre";
            $requete = $bdd->prepare($req);
            $requete->bindValue(':titre', $titre);
            $requete->execute();
            $resultat = $requete->fetch();

            if($resultat){
                return $resultat;
            } else{
                return 'La salle demandé n\'existe pas!';
            }
        }

        public function selectProduitById($id){
            $bdd = $this->getDatabase();

            $req = "SELECT p.id_produit, p.date_arrivee, p.date_depart, p.id_promo, p.prix, p.etat, s.id_salle, s.titre, s.pays, s.ville, s.adresse, s.cp, s.description,
        s.photo, s.capacite, s.categorie
        FROM produit p, salle s
        WHERE p.id_produit = :id_produit
        AND p.id_salle = s.id_salle";
            $requete = $bdd->prepare($req);
            $requete->bindValue(':id_produit', $id);
            $requete->execute();
            $result = $requete->fetch();

            return $result;
        }

        public function selectTopProduit(){
            $bdd = $this->getDatabase();

            $req = "SELECT s.id_salle, s.titre, s.pays, s.ville, s.adresse, s.cp, s.description,
        s.photo, s.capacite, s.categorie, p.id_produit, p.date_arrivee, p.date_depart, p.id_promo, p.prix, p.etat
        FROM salle s, produit p
        WHERE p.id_salle = s.id_salle
        ORDER BY p.date_enregistrement
        DESC LIMIT 0,4";
            $requete = $bdd->prepare($req);
            $requete->execute();
            $resultat = $requete->fetchAll();

            if($resultat){
                return $resultat;
            } else{
                return 'Une erreur est survenue!';
            }
        }

        public function selectLastMinuteProduit(){
            $bdd = $this->getDatabase();

            $req = "SELECT s.id_salle, s.titre, s.pays, s.ville, s.adresse, s.cp, s.description, s.photo,
        s.capacite, s.categorie, p.id_produit, p.date_arrivee, p.date_depart, p.id_promo, p.prix, p.etat
        FROM salle s, produit p
        WHERE p.id_salle = s.id_salle
        AND p.date_arrivee <= NOW() + INTERVAL 3 DAY";

            $requete = $bdd->prepare($req);
            $requete->execute();
            $resultat = $requete->fetchAll();

            if($resultat){
                return $resultat;
            } else {
                return 'Aucune salle n\'est disponible !';
            }
        }

        public function searchByName($name){
            $bdd = $this->getDatabase();

            $req = "SELECT s.id_salle, s.titre, s.pays, s.ville, s.adresse, s.cp, s.description, s.photo,
            s.capacite, s.categorie, p.id_produit, p.date_arrivee, p.date_depart, p.id_promo, p.prix, p.etat
            FROM salle s, produit p
            WHERE s.titre = :nomSalle";

            $requete = $bdd->prepare($req);
            $requete->bindValue(':nomSalle', $name);
            $requete->execute();
            $result = $requete->fetchAll();

            return $result;
        }

        public function searchByCapacite($capacite){
            $bdd = $this->getDatabase();

            $req = "SELECT s.id_salle, s.titre, s.pays, s.ville, s.adresse, s.cp, s.description, s.photo,
            s.capacite, s.categorie, p.id_produit, p.date_arrivee, p.date_depart, p.id_promo, p.prix, p.etat
            FROM salle s, produit p
            WHERE s.capacite = :capacite";

            $requete = $bdd->prepare($req);
            $requete->bindValue(':capacite', $capacite);
            $requete->execute();
            $result = $requete->fetchAll();

            return $result;
        }

        public function searchByVille($ville){
            $bdd = $this->getDatabase();

            $req = "SELECT s.id_salle, s.titre, s.pays, s.ville, s.adresse, s.cp, s.description, s.photo,
            s.capacite, s.categorie, p.id_produit, p.date_arrivee, p.date_depart, p.id_promo, p.prix, p.etat
            FROM salle s, produit p
            WHERE p.id_salle = s.id_salle
            AND s.ville = :ville";

            $requete = $bdd->prepare($req);
            $requete->bindValue(':ville', $ville);
            $requete->execute();
            $result = $requete->fetchAll();

            return $result;
        }

        public function searchProduit($keySearch){
            if($this->searchByName($keySearch)){

                $salle = $this->searchByName($keySearch);
                return $salle;

            } elseif($this->searchByVille($keySearch)){

                $salle = $this->searchByVille($keySearch);
                return $salle;
            } elseif($this->searchByCapacite($keySearch)){

                $salle = $this->searchByCapacite($keySearch);
                return $salle;
            } else{
                return false;
            }
        }

    }
}


?>