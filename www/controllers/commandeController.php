<?php

namespace controller\commandeController{

    include('superController.php');
    use controller\superController\superController;
    use model\commandeModel\commandeModel;

    class commandeController extends superController{

        public function validationPanier(){
            session_start();

            $result = '';
            if(isset($_POST) && !empty($_POST)){
                if(!empty($_SESSION['panier']['id_produit'])){
                    $commande = array(
                        'montant' => $_POST['prix'],
                        'id_membre' => $_SESSION['user']['id_membre'],
                    );

                    include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'commandeModel.php');

                    $objCommandeModel = new commandeModel();
                    $result = $objCommandeModel->addCommande($commande);

                    $article = array();

                    for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++){
                        $article[$i]['id_produit'] = $_SESSION['panier']['id_produit'][$i];
                        $article[$i]['id_commande'] = $result[0];
                    }

                    $resultDetail = $objCommandeModel->addDetailsCommande($article);

                    if($resultDetail){
                        $this->msg .= "<div class='msgSuccess'><h1 class='titrePageSalle'>Votre commande a bien été prise en compte.</h1></div><p>Somme à payer:</p>
                        <p>Pour procéder au reglement merci d'envoyer un chèque à l'ordre Lokisalle (SOCIETE FICTIVE)</p>";
                    } else {
                        $this->msg .= "<div class='msgAlert'><h1 class='titrePageSalle'>Une erreur est survenue.</h1></div>";
                    }
                } else {
                    $this->msg .= "<div class='msgWarning'><h1 class='titrePageSalle'>Votre panier est vide !</h1></div>";
                }

            }

            $tab = array(
                'msg' => $this->getMsg(),
                'directoryView' => 'commande',
                'fileView' => 'validationView.php',
                'result' => $result
            );
            $this->render($tab);
        }

        public function affichageCommande(){
            session_start();

            if($this->isConnected()){
                if($this->isAdmin()){
                    include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'commandeModel.php');


                    if(isset($_POST['btnSupprCommande']) && $_POST['btnSupprCommande'] == 'Supprimer'){
                        $objCommandeModelBis = new commandeModel();
                        $objCommandeModelBis->removeCommande($_POST['id_commande']);

                        $this->msg .= "<div>Votre commande à bien été supprimer</div>";
                    }

                    $objCommandeModel = new commandeModel();
                    $resultListeCommande = $objCommandeModel->selectAllCommande();


                    $tab = array(
                        'directoryView' => 'commande',
                        'fileView' => 'affichageCommandeView.php',
                        'liste' => $resultListeCommande
                    );

                    $this->render($tab);
                }
            } else{
                header('location:'. superController::URL .'produit/index');
            }
        }

        public function bonCommande($id){
            session_start();

            include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'commandeModel.php');

            $objCommandeModel = new commandeModel();
            $result = $objCommandeModel->selectDetailCommande($id);

            if(isset($_POST['reserverProduit']) && $_POST['reserverProduit'] == 'Confirmer la reservation'){

                for($i = 0; $i < count($_POST); $i++){
                    $objCommandeModel->validReservationProduit($_POST['id_produit' . $i]);
                }

                $this->msg .= "<div class='msgSuccess'>Votre réservation à bien été prise en compte !</div>";
            }

            $tab = array(
                'directoryView' => 'commande',
                'fileView' => 'bonCommandeView.php',
                'result' => $result
            );

            $this->render($tab);
        }
    }

}

?>