<?php
namespace controller\produitController{

    use controller\superController\superController;
    use model\avisModel\avisModel;
    use model\produitModel\produitModel;

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
                $this->msg .= "<div class='msgWarning'>Vous devez être connectez pour accéder a cette page.</div>";
                header('location:'. \controller\superController\superController::URL .'produit/index');
            }
        }

        protected function calculMontantTotal(){
            $prixTotal = 0;
            for($i = 0; $i < count($_SESSION['panier']['prix']); $i++){
                $prixTotal += $_SESSION['panier']['prix'][$i];
            }

            return $prixTotal;
        }

        protected function calculTva(){
            $ht = $this->calculMontantTotal();
            $tva = ($ht * 20) / 100;

            return $tva;
        }

        protected function calculTTC(){
            $ttc = $this->calculMontantTotal() + $this->calculTva();

            return $ttc;
        }


        public function panier(){
            session_start();
            // Si l'uilisateur est connecté alors je lui donne accès a la page
            if($this->isConnected()){
                //Si le formulaire d'une fiche produit (Bouton ajouter au panier) à été activer
                if(isset($_POST['btnAddPanier']) && !empty($_POST['btnAddPanier'])){
                    // le contenu de post: $_POST['btnAddPanier'] et $_POST['id_produit']
                    extract($_POST);

                    // recherche si l'id du produit est present dans le panier
                    $verifArticle = array_search($id_produit, $_SESSION['panier']['id_produit']);

                    //Si il est present alors on affiche un msg sinon on l'ajoute au panier.
                    if($verifArticle !== false){
                        $this->msg .= "<div class='msgWarning'>Ce produit est déjà présent dans votre panier.</div>";
                    } else{
                        include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'produitModel.php');

                        $objProduitModel = new produitModel();
                        $result = $objProduitModel->selectProduitById($id_produit);

                        if($result){
                            $_SESSION['panier']['id_produit'][] = $result['id_produit'];
                            $_SESSION['panier']['titre'][] = $result['titre'];
                            $_SESSION['panier']['photo'][] = $result['photo'];
                            $_SESSION['panier']['prix'][] = $result['prix'];
                        } else{
                            $this->msg .= "<div class='msgWarning'>Un problème est survenue sur le produit demandé.<br />Si le problème perciste contacter le support.</div>";
                        }
                    }
                }
                // si on appui sur le btn supprimer article d'un produit dans le panier
                if(isset($_POST['btnSupprArticlePanier']) && $_POST['btnSupprArticlePanier'] == ''){
                    $idArticle = $_POST['id_produit'];
                    // je confirme que le produit existe bien dans le panier et faisant une rechercher (retourne la postion dans le tableau ou false)
                    $position = array_search($idArticle, $_SESSION['panier']['id_produit']);
                    echo $position;
                    if(!$position){ // Si $position renvoi des info autre que false alors on supprimer l'entrée du tableau et on remonte le tout
                        array_splice($_SESSION['panier']['id_produit'], $position, 1);
                        array_splice($_SESSION['panier']['titre'], $position, 1);
                        array_splice($_SESSION['panier']['photo'], $position, 1);
                        array_splice($_SESSION['panier']['prix'], $position, 1);

                        $this->msg .= "<div class='msgWarning'>Votre article a bien été supprimer.</div>";
                    } else{
                        $this->msg .= "<div class='msgAlert'>Une erreur est survenue à la suppression de votre produit veuillez ré-essayer</div>";
                    }
                }

                if(isset($_POST['ViderLePanier']) && !empty($_POST['ViderLePanier'])){
                    for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++){
                        unset($_SESSION['panier']['id_produit'][$i]);
                        unset($_SESSION['panier']['titre'][$i]);
                        unset($_SESSION['panier']['photo'][$i]);
                        unset($_SESSION['panier']['prix'][$i]);
                    }
                    $this->msg .= "<div class='msgWarning'>Votre panier a bien été vider.</div>";
                    echo '<pre>';
                    print_r($_SESSION);
                    echo '</pre>';
                }

                $tab = array(
                    'msg' => $this->getMsg(),
                    'directoryView' => 'produit',
                    'fileView' => 'panierView.php',
                    'total' => $this->calculMontantTotal(),
                    'tva' => $this->calculTva(),
                    'ttc' => $this->calculTTC()
                );
                $this->render($tab);
            } else { // sinon je le renvoi sur l'accueil
                $this->msg .= "<div class='msgWarning'>Vous devez être connecté pour accéder au panier.</div>";
                header('location:'.superController::URL.'produit/index');
            }
        }

        public function recherche(){
            session_start();

            $tab = array(
                'msg' => $this->getMsg(),
                'directoryView' => 'produit',
                'fileView' => 'rechercheView.php',
                'result' => ''
            );

            if(isset($_POST['btnFormRechercheProduit']) && !empty($_POST['btnFormRechercheProduit'])){
                extract($_POST);

                include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'produitModel.php');

                $objModelProduit = new produitModel();
                $result = $objModelProduit->searchProduit($rechercheProduit);

                if($result){
                    $tab['result'] = $result;
                } else{
                    $tab['result'] = false;
                }
            }

            $this->render($tab);
        }
    }
}


?>