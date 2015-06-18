<?php

namespace controller\newsletterController{

    include ('superController.php');
    use controller\superController\superController;
    use model\newsletterModel\newsletterModel;

    class newsletterController extends superController{

        private $email;

        protected  function __constructEmail(string $email){
            $this->setEmail($email);
        }

        protected function setEmail($email){
            htmlentities($email, ENT_QUOTES);
            $this->email = $_POST['email'];
        }

        public function getEmail(){
            return $this->email;
        }

        public function inscription(){
            session_start();

            if(isset($_POST['btnValidInscrNews']) && !empty($_POST['btnValidInscrNews'])){
                if(isset($_POST['email']) && !empty($_POST['email'])){
                    include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'newsletterModel.php');

                    $objNewsletterModel = new newsletterModel();
                    $objNewsletterModel->inscriptionNews($_POST['email']);

                    if($objNewsletterModel){
                        $this->msg .= "<div class='msgSuccess'>Votre inscription à bien été prise en compte.</div>";
                    }else {
                        $this->msg .= "<div class='msgAlert'>Une erreur est survenue.</div>";
                    }
                }
            }

            $tab = array(
                'msg' => $this->getMsg(),
                'directoryView' => 'newsletter',
                'fileView' => 'newsletterView.php'
            );

            $this->render($tab);
        }
    }
}