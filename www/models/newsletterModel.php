<?php
namespace model\newsletterModel{
    include('superModel.php');

    use model\superModel\superModel;

    class newsletterModel extends superModel{

        public function inscriptionNews($email){
            $bdd = $this->getDatabase();
            $req = "INSERT INTO newsletter(email, etat) VALUES(:email, 0)";
            $requete = $bdd->prepare($req);
            $requete->bindValue(':email', $email);
            $requete->execute();

            return true;
        }

    }
}