<?php
class superModel{

    public function getDatabase(){
        include('..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'host.php');
        try{
            $bdd = new PDO('mysql:host='. $host .';dbname='. $dbname .';charset=utf8', $login, $password);
        } catch (Exeception $e){
            die('Une erreur est survenue: ' . $e->getMessage());
        }
        return $bdd;
    }

}


?>