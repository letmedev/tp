<?php

class superController{

    const url = "http://localhost/tp/www/public/routeur.php/";
    const urlpublic = "http://localhost/tp/www/public/";

    private $userConnect;
    private $userIsAdmin;
    public $msg = "";

    protected function render($tab){
        extract($tab); // Extraction du tableau
        ob_start(); // Demarage de l'outpout buffering
        include('..' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $directoryView . DIRECTORY_SEPARATOR . $fileView);
        $content = ob_get_contents(); // stockage du contenu de l'outpout buffering dans une variable
        ob_end_clean(); //vidage de la memoire (Reset de l'outpout buffering)
        include('..' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'layout.php');
    }

    public function isConnected(){
        if(isset($_SESSION['user']['pseudo'])){
            $this->userConnect = true;
            return $this->userConnect;
        } else {
            $this->userConnect = false;
            return $this->userConnect;
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

    public function menuUser(){
        if($this->isConnected()){
            return '<a href="'. superController::url .'membre/compte" title="Mon compte" class="user_menu">Mon compte</a>
                <a href="'. superController::url .'membre/deconnexion" title="deconnexion" class="user_menu">Déconnexion</a>';
        } else{
            return '<a href="'. superController::url .'membre/connexion" title="connexion" class="user_menu">Connexion</a>
                <a href="'. superController::url .'membre/inscription" title="inscription" class="user_menu">Inscription</a>';
        }
    }

    public function getConnected(){
        return $this->userConnected;
    }

    public function getAdmin(){
        return $this->userIsAdmin;
    }

    public function getMsg(){
        return $this->msg;
    }

}

?>
