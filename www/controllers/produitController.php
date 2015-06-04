<?php
include('superController.php');

class produitController extends superController{

    public function index(){
        session_start();
        include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'produitModel.php');

        $produit = new produitModel();
        $top = $produit->selectTopProduit();
        $lastMinute = $produit->selectLastMinuteProduit();

        $tab = array(
            'msg' => $this->getMsg(),
            'directoryView' => 'produit',
            'fileView' => 'indexView.php',
            'produitTop' => $top,
            'produitMinute' => $lastMinute
        );
        $this->render($tab);
    }
}

?>