<?php

class superController{

    private $userConnect = false;
    private $userIsAdmin = false;

    protected function render($tab){
        extract($tab); // Extraction du tableau
        ob_start(); // Demarage de l'outpout buffering
        include(''); // IL FAUT INCLURE LA VUE CONCERNEE DYNAMIQUEMENT
        $content = ob_get_contents(); // stockage du contenu de l'outpout buffering dans une variable
        ob_clean(); //vidage de la memoire
        include('..' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'layout.php');
    }

    public function isConnected(){
        if(!empty($_SESSION['user'])){
            $this->userConnect = true;
            return $this->userConnect;
        } else {
            return 'Veuillez vous connecté ! '; // AJOUTER LE LIEN VERS FORMULAIRE DE CONNEXIO
        }
    }

    public function isAdmin(){
        if($this->userConnect == true && $_SESSION['user']['statut'] == 1){
            $this->userIsAdmin = true;
            return $this->userIsAdmin;
        } else {
            $this->userIsAdmin = false;
            return 'Vous n\êtes pas administrateur !';
        }
    }
}

?>
