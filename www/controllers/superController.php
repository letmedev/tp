<?php

namespace controller\superController{

    class superController{

        const URL = "http://localhost/tp/www/public/routeur.php/";
        const URLPUBLIC = "http://localhost/tp/www/public/";

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
                return $this->userIsAdmin;
            }
        }

        public function menuUser(){
            if($this->isConnected()){
                return '<a href="'. \controller\superController\superController::URL .'membre/compte" title="Mon compte" class="user_menu">Mon compte</a>
                <a href="'. \controller\superController\superController::URL .'membre/deconnexion" title="deconnexion" class="user_menu">Déconnexion</a>';
            } else{
                return '<a href="'. \controller\superController\superController::URL .'membre/connexion" title="connexion" class="user_menu">Connexion</a>
                <a href="'. \controller\superController\superController::URL .'membre/inscription" title="inscription" class="user_menu">Inscription</a>';
            }
        }

        public function navUser(){
            if($this->isConnected()){
                return '
                    <ul>
                        <li><a href="' . \controller\superController\superController::URL . 'produit/index">Accueil</a></li>
                        <li><a href="' . \controller\superController\superController::URL . 'salle/liste">Nos Salles</a></li>
                        <li><a href="' . \controller\superController\superController::URL . 'apropos/identite">Qui sommes-nous</a></li>
                        <li><a href="' . \controller\superController\superController::URL . 'apropos/contact">Contact</a></li>
                        <li><a href="' . \controller\superController\superController::URL . 'produit/panier">Panier</a></li>
                    </ul>';
            } else{
                return '
                    <ul>
                        <li class="menuNotConnected"><a href="' . \controller\superController\superController::URL . 'produit/index">Accueil</a></li>
                        <li class="menuNotConnected"><a href="' . \controller\superController\superController::URL . 'salle/liste">Nos Salles</a></li>
                        <li class="menuNotConnected"><a href="' . \controller\superController\superController::URL . 'apropos/identite  ">Qui sommes-nous</a></li>
                        <li class="menuNotConnected"><a href="' . \controller\superController\superController::URL . 'apropos/contact">Contact</a></li>
                    </ul>';
            }
        }
        // barre de navigation, si on est commande on a le menu de gestin du site sinon on a le menu classique authentifier avec panier
        // ou non authentifié sans panier
        public function navAdmin(){
            if($this->isConnected() && $this->isAdmin()){
                return '
                    <ul>
                        <li><a href="' . \controller\superController\superController::URL . 'commande/commande">Gestion Commande</a></li>
                        <li><a href="' . \controller\superController\superController::URL . 'commande/salle">Gestion Salle</a></li>
                        <li><a href="' . \controller\superController\superController::URL . 'commande/produit">Gestion Produit</a></li>
                        <li><a href="' . \controller\superController\superController::URL . 'commande/user">Gestion Utilisateur</a></li>
                        <li><a href="' . \controller\superController\superController::URL . 'commande/avis">Gestion Avis</a></li>
                    </ul>
                ';
            } else{
                return $this->navUser();
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
}
?>
