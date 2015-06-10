<?php
namespace controller\produitController{

    use controller\superController\superController;
    use model\avisModel\avisModel;

    include('superController.php');
    class produitController extends superController{

        public function index(){
            session_start();
            include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'produitModel.php');

            $produit = new \model\produitModel\produitModel();
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
                include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'avisModel.php');

                // Si le formulaire d'avis est activer alors j'enregistre le commentaire
                if(isset($_POST['btnAvis']) && $_POST['btnAvis'] == 'Valider'){

                    $tab = array(
                        'id_membre' => $_SESSION['user']['id_membre'],
                        'id_salle' => $_POST['id_salle'],
                        'titre' => $_POST['titre'],
                        'commentaire' => $_POST['commentaire'],
                        'note' => $_POST['note']
                    );

                    $objAvisModel = new \model\avisModel\avisModel();
                    $objAvisModel->addAvis($tab);
                }


                $resultOk = '';
                $top = '';

                $objProduitModel = new \model\produitModel\produitModel();
                $result = $objProduitModel->selectProduitById($id);

                $objAvisModel = new \model\avisModel\avisModel();
                $resultAvis = $objAvisModel->selectAvisBySalle($result['id_salle']);

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
                    'produitTop' => $top,
                    'avis' => $resultAvis
                );

                $this->render($tab);
            } else{
                /*$this->msg .= "<div class='msgWarning'>Vous devez être connectez pour accéder a cette page.</div>";

                $tab = array(
                    'msg' => $this->getMsg(),
                    'directoryView' => 'produit',
                    'fileView' => 'indexView.php'
                );
                $this->render($tab);*/
                $this->msg .= "<div class='msgWarning'>Vous devez être connectez pour accéder a cette page.</div>";
                header('location:'. \controller\superController\superController::URL .'produit/index');
            }
        }
    }
}


?>