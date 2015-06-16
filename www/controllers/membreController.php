<?php
namespace controller\membreController{

    use controller\superController\superController;
    use model\membreModel\membreModel;

    include('superController.php');

    class membreController extends superController{

        private $pseudo;
        private $nom;
        private $prenom;
        private $sexe;
        private $email;
        private $password;
        private $adresse;
        private $ville;
        private $cp;

        protected function __constructMembre(array $tab){
            extract($tab);

            $this->setPseudo($pseudo);
            $this->setNom($nom);
            $this->setPrenom($prenom);
            $this->setSexe($sexe);
            $this->setEmail($email1, $email2);
            $this->setPassword($password1, $password2);
            $this->setAdresse($adresse);
            $this->setVille($ville);
            $this->setCodePostale($cp);
        }

        public function getMembre(){
            $tab = array(
                'pseudo' => $this->getPseudo(),
                'nom' => $this->getNom(),
                'prenom' => $this->getPrenom(),
                'sexe' => $this->getSexe(),
                'email' => $this->getEmail(),
                'password' => $this->getPassword(),
                'adresse' => $this->getAdresse(),
                'ville' => $this->getVille(),
                'cp' => $this->getCp()
            );

            return $tab;
        }

        public function inscription($tabIsncription){
            session_start();
            $postContent = '';
            // Si l'utilisateur est deja connecter je le renvoi ver l'acceuil du site
            if($this->isConnected()){
                header('location: '. superController::URL .'produit/index');
            }else{ // Sinon on procede à l'inscription.
                include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'membreModel.php');
                $postContent = $_POST;
                if(isset($_POST['btnEnregistrement']) && $_POST['btnEnregistrement'] == 'Valider'){
                    $tabMembre = array(
                        'pseudo' => $_POST['pseudo'],
                        'nom' => $_POST['nom'],
                        'prenom' => $_POST['prenom'],
                        'sexe' => $_POST['sexe'],
                        'email1' => $_POST['email1'],
                        'email2' => $_POST['email2'],
                        'password1' => $_POST['password1'],
                        'password2' => $_POST['password2'],
                        'adresse' => $_POST['adresse'],
                        'ville' => $_POST['ville'],
                        'cp' => intval($_POST['cp'])
                    );
                    $this->__constructMembre($tabMembre);

                    $objMembreModel = new membreModel();
                    $result = $objMembreModel->selectMembre($this->email);

                    if(!$result){
                        if(empty($this->msg)){
                            $objMembreModel->addMembre($this->getMembre());
                            $this->msg .= "<div class='msgSuccess'>Votre inscription à bien été prise en compte. <br /> Pour vous connectez, rendez-vous sur la page <a href=\"". superController::URL ."membre/connexion\">connexion</a></div>";
                        }
                    } else{
                        $this->msg .= "<div class='msgAlert'>Cette adresse email est déjà utilisé.</div>";
                    }
                }
            }
            $tab = array(
                'msg' => $this->getMsg(),
                'directoryView' => 'membre',
                'fileView' => 'inscriptionMembreView.php',
                'postContent' => $postContent
            );
            $this->render($tab);
        }

        public function compte(){
            session_start();
            if($this->isConnected()){
                include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'membreModel.php');

                $email = $_SESSION['user']['email'];

                $objMembreModel = new membreModel();
                $result = $objMembreModel->searchMembre($email);

                $tab = array(
                    'msg' => $this->getMsg(),
                    'directoryView' => 'membre',
                    'fileView' => 'compteView.php',
                    'membre' => $result
                );
                $this->render($tab);
            } else{
                header('location:http://lokisalle.gldev.fr/produit/index');
            }
        }

        public function connexion(){
            session_start();

            if($this->isConnected()){
                header('location:'. \controller\superController\superController::URL .'produit/index');
            } else{
                include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'membreModel.php');

                if(isset($_POST['btnConnexion']) && $_POST['btnConnexion'] == 'Connexion'){
                    extract($_POST);

                    $sel = "8baef0f8697b6d1d98309b4fb1d490df73b98bb0";
                    $passtmp = $sel . $password;
                    $pass = sha1($passtmp);

                    $objMembreModel = new membreModel();
                    $result = $objMembreModel->connectMembre($email, $pass);

                    if($result){
                        $_SESSION = array(
                            'user' => array(
                                'id_membre' => $result['id_membre'],
                                'email' => $result['email'],
                                'pseudo' => $result['pseudo'],
                                'nom' => $result['nom'],
                                'prenom' => $result['prenom'],
                                'sexe' => $result['sexe'],
                                'ville' => $result['ville'],
                                'cp' => $result['cp'],
                                'adresse' => $result['adresse'],
                                'statut' => $result['statut']
                            ),
                            'panier' => array(
                                'id_produit' => array(),
                                'titre' => array(),
                                'photo' => array(),
                                'prix' => array()
                            )
                        );
                        // Ajouter un header vers le profil
                        $this->msg .= "<div class='msgSuccess'>Bienvenue " . $_SESSION['user']['pseudo'] . " !<br /> Pour commencer votre navigation cliquez <a href=\"". \controller\superController\superController::URL ."produit/index\">ici</a></div>";
                    } else{
                        $this->msg .= "<div class='msgAlert'>Login ou mot de passe incorrect !</div>";
                    }
                }
            }

            $tab = array(
                'msg' => $this->getMsg(),
                'directoryView' => 'membre',
                'fileView' => 'connexionMembreView.php'
            );
            $this->render($tab);
        }

        public function deconnexion(){
            session_start();
            session_unset();
            session_destroy();
            $this->msg .= "<div class='msgWarning'>Vous avez été deconnecté !<br /> A </div>";
            header('location:'.superController::URL.'produit/index');
        }

        //---------- Setters ----------//
        private function setPseudo($pseudo){
            // Si $pseudo existe alors je fait un htmlentities et le stock dans la propriété pseudo de la class
            if(isset($pseudo) && !empty($pseudo)){
                $pseudoVerif = htmlentities($pseudo, ENT_QUOTES);
                $this->pseudo = $pseudoVerif;
            } else{
                $this->msg .= "<div class='msgAlert'>Le champs pseudo est obligatoire.</div>";
            }
        }

        private function setNom($nom){
            // si $nom existe et qu'il n'est pas vide
            if(isset($nom) && !empty($nom)){
                // $nom est un type string je le passe en majuscule et le stock dans la propriete nom de la class
                if(is_string($nom)){
                    $nomMaj = strtoupper($nom);
                    $this->nom = $nomMaj;
                } else{
                    $this->msg .= "<div class='msgWarning'>Votre nom doit contenir que des lettres !</div>";
                }
            } else{
                $this->msg .= "<div class='msgAlert'>Le champs nom est obligatoire.</div>";
            }
        }

        private function setPrenom($prenom){
            // $prenom existe et qu'il n'est pas vide
            if(isset($prenom) && !empty($prenom)){
                // $prenom est un type string alors je passe la chaine de caractère en minuscule puis la première lettre en majuscule
                // et je le stock dans la proprété prenom de la class
                if(is_string($prenom)){
                    $prenomLower = strtolower($prenom);
                    $prenomUcfirst = ucfirst($prenomLower);
                    $this->prenom = $prenomUcfirst;
                } else{
                    $this->msg .= "<div class='msgWarning'>Votre prénom doit contenir que des lettres !</div>";
                }
            } else{
                $this->msg .= "<div class='msgAlert'>Le champs prénom est obligatoire.</div>";
            }
        }

        private function setSexe($sexe){
            // $sexe existe et qu'il n'est pas vide
            if(isset($sexe) && !empty($sexe)){
                // si $sexe est egale à m ou f alors je le stock dans la proprieté sexe de la class
                if($sexe == "f" || $sexe == "m"){
                    $this->sexe = $sexe;
                } else{
                    $this->msg .= "<div class='msgWarning'>Le champs sexe est obligatoirement f (feminin) ou m (masculin)</div>";
                }
            } else{
                $this->msg .= "<div class='msgAlert'>Le champs sexe est obligatoire.</div>";
            }
        }

        private function setEmail($email1, $email2){
            // Si $email1 & $email2 existe et qu'il ne sont pas vide
            if(isset($email1) && !empty($email1) && isset($email2) && !empty($email2)){
                // Alors je teste l'egalité des 2 variable
                if($email1 == $email2){
                    $this->email = $email1;
                } else{
                    $this->msg .= "<div class='msgWarning'>Email incorect verifer votre saisie.</div>";
                }
            } else{
                $this->msg .= "<div class='msgAlert'>Les champs email sont obligatoire et doivent être identique.</div>";
            }
        }

        private function setPassword($password1, $password2){
            // Si $password1 & $password2 existe et qu'il ne sont pas vide
            if(isset($password1) && !empty($password1) && isset($password2) && !empty($password2)){
                // Si password1 & $password2 sont identique alors je le concatène à un grain de sel puis je hash le tous
                // et je le stock dans la propriete password de la class
                if($password1 == $password2){

                    $sel = "8baef0f8697b6d1d98309b4fb1d490df73b98bb0";
                    $chaine = $sel . $password1;
                    $pass = sha1($chaine);

                    $this->password = $pass;
                } else{
                    $this->msg .= "<div class='msgWarning'>Les champs password doivent être identique.</div>";
                }
            } else{
                $this->msg .= "<div class='msgAlert'>Les champs password sont obligatoire et doivent être identique.</div>";
            }
        }

        private function setAdresse($adresse){
            if(isset($adresse) && !empty($adresse)){
                if(is_string($adresse)){
                    $this->adresse = $adresse;
                } else{
                    $this->msg .= "<div class='msgWarning'>L\'adresse doit être une chaine de caractères</div>";
                }
            } else{
                $this->msg .= "<div class='msgAlert'>Le champ adresse est obligatoire.</div>";
            }
        }

        private function setVille($ville){
            if(isset($ville) && !empty($ville)){
                if(is_string($ville)){
                    $this->ville = $ville;
                } else{
                    $this->msg .= "<div class='msgWarning'>La ville doit être une chaine de caractères</div>";
                }
            } else{
                $this->msg .= "<div class='msgAlert'>Le champ ville est obligatoire.</div>";
            }
        }

        private function setCodePostale($cp){
            if(isset($cp) && !empty($cp)){
                if(is_int($cp)){
                    $this->cp = $cp;
                } else{
                    $this->msg .= "<div class='msgWarning'>Le code postal doit être un nombre entier à 5 chiffres</div>";
                }
            } else{
                $this->msg .= "<div class='msgAlert'>Le code postal est obligatoire.</div>";
            }
        }

        //----------- Getters ----------//
        public function getPseudo(){
            return $this->pseudo;
        }

        public function getNom(){
            return $this->nom;
        }

        public function getPrenom(){
            return $this->prenom;
        }

        public function getSexe(){
            return $this->sexe;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getPassword(){
            return $this->password;
        }

        public function getAdresse(){
            return $this->adresse;
        }

        public function getVille(){
            return $this->ville;
        }

        public function getCp(){
            return $this->cp;
        }
    }
}


