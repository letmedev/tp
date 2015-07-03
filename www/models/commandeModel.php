<?php

namespace model\commandeModel{
    include('superModel.php');
    use model\superModel\superModel;

    class commandeModel extends superModel{

        public function addCommande(array $tab){
            extract($tab);
            $bdd = $this->getDatabase();
            $req = "INSERT INTO commande(montant, id_membre, date_commande) VALUES($montant, $id_membre, NOW())";
            $requete = $bdd->prepare($req);
            $requete->execute();

            $reqId = "SELECT id_commande FROM commande WHERE id_commande = LAST_INSERT_ID()";
            $lastId = $bdd->prepare($reqId);
            $lastId->execute();
            $resultId = $lastId->fetch();

            if($resultId){
                return $resultId;
            } else {
                return false;
            }
        }

        public function addDetailsCommande(array $tab){

            $bdd = $this->getDatabase();

            foreach($tab AS $key){
                $req = "INSERT INTO details_commande(id_commande, id_produit) VALUE(:id_commande, :id_produit)";
                $requete = $bdd->prepare($req);
                $requete->bindValue(':id_commande', $key['id_commande']);
                $requete->bindValue('id_produit', $key['id_produit']);
                $requete->execute();
            }
            return true;
        }

        public function selectAllCommande(){
            $bdd = $this->getDatabase();

            $req = "SELECT id_commande, montant, id_membre, date_commande FROM commande ORDER BY date_commande DESC";
            $requete = $bdd->prepare($req);
            $requete->execute();
            $result = $requete->fetchAll();

            return $result;
        }

        public function removeCommande($id){
            $bdd = $this->getDatabase();

            $req = "DELETE FROM commande WHERE id_commande = :id_commande";
            $requete = $bdd->prepare($req);
            $requete->bindValue(':id_commande', $id);
            $requete->execute();
        }

        public function selectDetailCommande($idCommande){
            $bdd = $this->getDatabase();

            $req = "SELECT dc.id_details_commande, dc.id_commande, dc.id_produit,
            c.id_commande, c.montant, c.id_membre, c.date_commande,
            p.id_produit, p.date_arrivee, p.date_depart, p.id_salle, p.id_promo, p.prix, p.etat, p.date_enregistrement,
            s.id_salle, s.titre, s.pays, s.ville, s.adresse, s.cp, s.description, s.photo, s.capacite, s.photo, s.capacite, s.categorie
            FROM details_commande dc, commande c, produit p, salle s
            WHERE dc.id_commande = :idCommande
            AND c.id_commande = :idCommande
            AND dc.id_produit = p.id_produit
            AND p.id_salle = s.id_salle";

            $requete = $bdd->prepare($req);
            $requete->bindValue(':idCommande', $idCommande);
            $requete->execute();
            $result = $requete->fetchAll();

            if($result){
                return $result;
            } else {
                return false;
            }

        }

        public function validReservationProduit($idProduit){
            $bdd = $this->getDatabase();

            $req = "UPDATE produit SET etat = :nouvelEtat WHERE id_produit = :id_produit";
            $requete = $bdd->prepare($req);
            $requete->bindValue(':id_produit', $idProduit);
            $requete->bindValue(':nouvelEtat', 1);
            $result = $requete->execute();

            if($result){
                return true;
            } else{
                return false;
            }
        }

    }
}

