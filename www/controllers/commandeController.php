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
            $tab = array(
                'directoryView' => 'commande',
                'fileView' => 'affichageCommandeView.php'
            );

            $this->render($tab);
        }
    }

}

?>