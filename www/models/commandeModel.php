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

    }
}

