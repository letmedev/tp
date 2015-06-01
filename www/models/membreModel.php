<?php
require_once('superModel.php');

class membreModel extends superModel{

    public function addMembre(array $tab){

        extract($tab);
        $statutInt = intval($statut);

        $bdd = $this->getDatabase();
        $req = "SELECT id_membre, pseudo, nom, prenom, email, sexe, ville, cp, adresse, statut FROM membre WHERE email = :email";
        $requeteSelect = $bdd->prepare($req);
        $requeteSelect->bindValue(':email', $email);
        $requeteSelect->execute();
        $resultat = $requeteSelect->fetch();

        // Si $result return false, l'utilisateur n'existe pas en base donc on l'insert
        if(!$resultat){

            $req = "INSERT INTO membre(pseudo, mdp, nom, prenom, email, sexe, ville, cp, adresse, statut) VALUES(:pseudo, :mdp, :nom, :prenom, :email, :sexe, :ville, :cp, :adresse, :statut)";
            $requete = $bdd->prepare($req);
            $requete->bindValue(':pseudo', $pseudo);
            $requete->bindValue(':mdp', $mdp);
            $requete->bindValue(':nom', $nom);
            $requete->bindValue(':prenom', $prenom);
            $requete->bindValue(':email', $email);
            $requete->bindValue(':sexe', $sexe);
            $requete->bindValue(':ville', $ville);
            $requete->bindValue(':cp', $cp);
            $requete->bindValue(':adresse', $adresse);
            $requete->bindValue(':statut', $statutInt);
            $requete->execute();

            $this->msg .= 'Votre compte a bien été créer !'; // Ajouter un lien vers le formulaire de connexion
            echo $this->getMsg();
        } else{
            $this->msg .= 'Utilisateur déjà existant !';
            echo $this->getMsg();
        }
    }

    public function selectMembre($email){
        $bdd = $this->getDatabase();
        $req = "SELECT id_membre, pseudo, nom, prenom, email, sexe, ville, cp, adresse, statut FROM membre WHERE email = :email";
        $requete = $bdd->prepare($req);
        $requete->bindValue(':email', $email);
        $requete->execute();
        $resultat = $requete->fetch();

        return $resultat;
    }

    public function editMembre($tab){
        extract($tab);
        $bdd = $this->getDatabase();
        $req = "SELECT id_membre FROM membre WHERE email = :email";
        $requete = $bdd->prepare($req);
        $requete->bindValue(':email', $email);
        $requete->execute();
        $resultat = $requete->fetch();

        if($resultat){
            $req = "UPDATE membre SET pseudo = :pseudo, nom = :nom, prenom = :prenom, email = :email, sexe = :sexe, ville = :ville, cp = :cp, adresse = :adresse, statut = :statut WHERE id_membre = :id_membre";
            $requete = $bdd->prepare($req);
            $requete->bindValue(':pseudo', $pseudo);
            $requete->bindValue(':nom', $nom);
            $requete->bindValue(':prenom', $prenom);
            $requete->bindValue(':email', $email);
            $requete->bindValue(':sexe', $sexe);
            $requete->bindValue(':ville', $ville);
            $requete->bindValue(':cp', $adresse);
            $requete->bindValue(':adresse', $adresse);
            $requete->bindValue(':statut', $statut);
            $requete->bindValue(':id_membre', $resultat['id_membre']);
            $requete->execute();

            $this->msg .= 'La modification a bien été pris en compte !';
            return $this->getMsg();
        } else{
            $this->msg .= 'L\'utilisateur n\'existe pas ! Veuillez contacter votre administrateur.';
            return $this->getMsg();
        }
    }

    public function deleteMembre($email){
        $bdd = $this->getDatabase();
        $req = "SELECT id_membre FROM membre WHERE email = :email";
        $requete = $bdd->prepare($req);
        $requete->bindValue(':email', $email);
        $requete->execute();
        $resultat = $requete->fetch();

        if(!$resultat){
            $req = "DELETE FROM membre WHERE id_membre= :membre";
            $requeteDelete = $bdd->prepare($req);
            $requeteDelete->bindValue(':membre', $resultat['id_membre']);
            $requeteDelete->execute();
        } else {
            $this->msg .= 'Le membre demandée n\'existe pas!';
            return $this->getMsg();
        }
    }

    public function searchMembre($email){
        $bdd = $this->getDatabase();
        $req = "SELECT id_membre, pseudo, nom, prenom, email, sexe, ville, cp, adresse, statut FROM membre WHERE email= :email";
        $requete = $bdd->prepare($req);
        $requete->bindValue(':email', $email);
        $requete->execute();
        $resultat = $requete->fetch();

        if(!$resultat){
            return $resultat;
        } else{
            $this->msg .= 'L\'utilisateur demandé n\'existe pas!';
            return $this->getMsg();
        }
    }
}

?>