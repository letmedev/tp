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

    public function fiche($id){
        session_start();
        if($this->isConnected()){
            include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'produitModel.php');

            $resultOk = '';
            $top = '';

            $objProduitModel = new produitModel();
            $result = $objProduitModel->selectProduitById($id);

            if($result){
                $resultOk = $result;
                $top = $objProduitModel->selectTopProduit();
            } else{
                $this->msg .= "<div class='msgAlert'>La salle demandé n'existe pas !</div>";
            }

            $tab = array(
                'msg' => $this->getMsg(),
                'directoryView' => 'produit',
                'fileView' => 'ficheView.php',
                'result' => $resultOk,
                'produitTop' => $top
                );

            $this->render($tab);
        } else{
            $this->msg .= "<div class='msgWarning'>Vous devez être connectez pour accéder a cette page.</div>";

            $tab = array(
                'msg' => $this->getMsg(),
                'directoryView' => 'produit',
                'fileView' => 'indexView.php'
            );
            $this->render($tab);
        }
    }
}

?>