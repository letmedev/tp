<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 10/06/15
 * Time: 14:44
 */

namespace controller\aproposController{

    include('superController.php');
    use controller\superController\superController;

    class aproposController extends superController{

        public function cgv(){
            $tab = array(
                'directoryView' => 'apropos',
                'fileView' => 'cgvView.php'
            );

            $this->render($tab);
        }

        public function contact(){

            if(isset($_POST) && !empty($_POST)){
                if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['message'])){
                    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) &&!empty($_POST['message'])){
                        extract($_POST);

                        //===================================================================================
                        //                      MESSAGE A L'ATTENTION DU CORRECTEUR.
                        // Je suis obligé d'utiliser PHPMail car mon hebergeur (Ikoula) n'autorise pas
                        // l'envoi d'email s'il n'y a pas d'autentification et la fonction mail() de php
                        // ne le permet pas.
                        //===================================================================================


                        include('../public/script/PHPMailer/class.phpmailer.php');
                        include('../public/script/PHPMailer/class.smtp.php');

                        $mail = new \PHPMailer();

                        $body = "Vous venez de recevoir un message de la part de " . $nom . ' ' . $prenom  . "<br /><br />";
                        $body .= "Voici son adresse email: <br />" . $email . "<br /><br />";
                        $body .= "Voici son message: <br />" . $message . "<br /><br />";

                        $mail->isSMTP();
                        $mail->SMTPAuth = true;
                        $mail->Host = "mail.gldev.fr";
                        $mail->Port = 25;

                        $mail->Username = "contact@gldev.fr";
                        $mail->Password = "ds7sdrk45";
                        $mail->From = "contact@gldev.fr";
                        $mail->FromName = "Contact Lokisalle";
                        $mail->Subject = "Vous avez un contact provenant de lokisalle";
                        $mail->AltBody = $body;

                        $mail->WordWrap = 70;
                        $mail->MsgHTML($body);

                        $mail->AddReplyTo($email);
                        $mail->AddAddress("contact@gldev.fr");
                        $mail->isHTML(true);

                        if($mail->Send()){
                            $this->msg .= "<div class='msgSuccess'>Votre message à bien été envoyer! <br /> Vous aurez un retour d'ici 48H.</div>";
                        } else{
                            $this->msg .= "<div class='msgAlert'>Une erreure c'est produite mercie de réessayer dans un moment. Si le problème persiste contacter le support.</div>";
                        }
                    }
                } else{
                    $this->msg .= "<div class='msgAlert'>Tout les informations demandé doivent être remplit afin de pouvoir valider le formulaire.</div>";
                }
            }

            $tab = array(
                'msg' => $this->getMsg(),
                'directoryView' => 'apropos',
                'fileView' => 'contactView.php'
            );

            $this->render($tab);
        }

    }
}