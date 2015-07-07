<?php
namespace controller\salleController{
    include('superController.php');

    use controller\superController\superController;
    use model\salleModel\salleModel;

    class salleController extends superController{
        public function liste(){
            session_start();

            include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'salleModel.php');

            $objSalleModel = new salleModel();
            $liste = $objSalleModel->selectAllSalle();

            $tab = array(
                'msg' => $this->getMsg(),
                'directoryView' => 'salle',
                'fileView' => 'listeSalleView.php',
                'liste' => $liste
            );

            $this->render($tab);
        }

        public function fiche($id){
            session_start();

            include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'salleModel.php');

            $objSalleModel = new salleModel();
            $result = $objSalleModel->selectSalleById($id);

            $resultProduit = $objSalleModel->searchProduitByIdSalle($id);
            $resultAvis = $objSalleModel->selectAvisBySalle($id);

            if(isset($_POST['btnAvis']) && $_POST['btnAvis'] == 'Valider'){
                $tabAvis = array(
                    'id_membre' => $_SESSION['user']['id_membre'],
                    'id_salle' => $_POST['id_salle'],
                    'titre' => $_POST['titre'],
                    'commentaire' => $_POST['commentaire'],
                    'note' => $_POST['note']
                );

                $objSalleModel->addAvis($tabAvis);
            }


            $tab = array(
                'msg' => $this->getMsg(),
                'directoryView' => 'salle',
                'fileView' => 'ficheSalleView.php',
                'salle' => $result,
                'produit' => $resultProduit,
                'avis' => $resultAvis,
                'id_salle' => $id
            );

            $this->render($tab);
        }

        public function gestionSalle(){
            session_start();

            if($this->isConnected()){
                if($this->isAdmin()){
                    $tab = array(
                        'msg' => $this->getMsg(),
                        'directoryView' => 'salle',
                        'fileView' => 'gestionSalleView.php'
                    );

                    $this->render($tab);
                }
            } else{
                header('location:' . superController::URL . 'produit/index');
            }


        }

        public function affichageListe(){
            session_start();

            if($this->isConnected()){
                if($this->isAdmin()){
                    include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'salleModel.php');

                    $objSalleModel = new salleModel();
                    $result = $objSalleModel->selectAllSalle();

                    if(isset($_POST['btnSupprSalle']) && $_POST['btnSupprSalle'] == 'Supprimer'){
                        $objSalleModel->deleteSalleById($_POST['id_salle']);

                        $this->msg .= "<div class='msgSuccess'>La salle a bien été supprimer</div>";
                    }

                    $tab = array(
                        'msg' => $this->getMsg(),
                        'directoryView' => 'salle',
                        'fileView' => 'listeSalleAdminView.php',
                        'result' => $result
                    );

                    $this->render($tab);
                }
            }
        }

        public function ajout(){
            session_start();
            if($this->isConnected()){
                if($this->isAdmin()){

                    if(isset($_POST['btnAddSalle']) && $_POST['btnAddSalle'] == 'Enregistrer'){
                        include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'salleModel.php');
                        // Traitement de l'image
                        $photo = '';
                        $photoUrl = '';
                        if(isset($_FILES['photo']['name'])){
                            $extension = strrchr($_FILES['photo']['name'], '.'); // permet de retourner le texte contenu après le "."
                            $extension = strtolower(substr($extension, 1));
                            // Nous transformons au cas où la chaine en minuscule grace à strtolower()
                            // Nous coupons le "." grace à substr()
                            $tab_extension_valide = array("gif", "jpg", "jpeg", "png"); // nous préparons un tableau ARRAY qui contient les extension que l'on veut autoriser

                            $verif_extension = in_array($extension, $tab_extension_valide); // nous observons si 'lextension (fournie en premier argument) est présente dans le tableau array (fourni en 2 eme argument)

                            if($verif_extension){
                                $nom_photo = $_POST['nomSalle'] . '_' . $_FILES['photo']['name'];// on rajoute la reference sur le nom de la photo dans le cas où deux images auraient le même nom, il y a un risque d'écraser les anciennes photos
                                $photoDossier = "../public/photo_salle/$nom_photo";
                                $photoUrl = superController::URLPUBLIC . 'photo_salle/' . $nom_photo;
                                // chemin pour permettre l'enregistrement dans le dossier du FICHIER de la photo. Cela va servir à la fonction copy()
                                copy($_FILES['photo']['tmp_name'], $photoDossier); // copy() permet de copier un fichier depuis un endroit (ici le dossier temporaire du serveur) vers un autre endroit donné en deuxieme argument.
                            }
                        }

                        if(!empty($_POST['titre']) || !empty($_POST['adresse']) || !empty($_POST['cp']) || !empty($_POST['ville']) || !empty($_POST['pays'])
                        || !empty($_POST['description']) || !empty($_POST['capacite']) || !empty($_POST['categorie'])){
                            $data = array(
                                'titre' => $_POST['nomSalle'],
                                'adresse' => $_POST['adresse'],
                                'cp' => $_POST['cp'],
                                'ville' => $_POST['ville'],
                                'pays' => $_POST['pays'],
                                'description' => $_POST['description'],
                                'photo' => $photoUrl,
                                'capacite' => $_POST['capacite'],
                                'categorie' => $_POST['categorie']
                            );

                            $objSalleModel = new salleModel();
                            $result = $objSalleModel->addSalle($data);

                            if($result){
                                $this->msg .= "<div class='msgSuccess'>La salle a bien été enregistrer !</div>";
                            } else{
                                $this->msg .= "<div class='msgAlert'>Une erreur est survenue.</div>";
                            }
                        } else {
                            $this->msg .= "<div class='msgAlert'>Tous les champs doivent être saisie !</div>";
                        }

                    }

                    $tab = array(
                        'msg' => $this->getMsg(),
                        'directoryView' => 'salle',
                        'fileView' => 'ajoutSalleAdminView.php'
                    );

                    $this->render($tab);
                }
            } else{
                header('location:' . superController::URL . 'produit/index');
            }
        }
    }
}

?>