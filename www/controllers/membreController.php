<?php

include('superController.php');

class membreController extends superController{

    public function inscription($tabIsncription){
        session_start();
        // Si l'utilisateur est deja connecter je le renvoi ver l'acceuil du site
        if($this->isConnected()){
            header('location: http://localhost/tp/www/public/routeur.php/produit/index');
        }else{ // Sinon on procede à l'inscription.
            include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'membreModel.php');

            $tab = array(
                'msg' => $this->getMsg(),
                'directoryView' => 'membre',
                'fileView' => 'inscriptionMembreView.php'
            );
            $this->render($tab);
        }
    }

}

