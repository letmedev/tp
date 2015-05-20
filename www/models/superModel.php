<?php
class superModel{

    private $bdd;

    protected function getDatabase(){

        //require_once('..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'host.php');
        require_once('../config/host.php');
        try{
            $this->bdd = new PDO('mysql:host='. $host .';dbname='. $dbname .';charset=utf8,' . $login . ',' . $password);
        } catch (Exeception $e){
            die('Une erreur est survenue: ' . $e->getMessage());
        }
        return $this->bdd;
    }

}

?>
<?php
class Super_model
{
	function super_model()
	{
		require('model_config.php');
		//infos_connexion();
		//$pdo = new PDO("mysql:host=".$infosConnexion['host'].";dbname=".$infosConnexion['dbname'],$infosConnexion['user'], $infosConnexion['password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$pdo = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$pdo->exec("SET CHARACTER SET utf8");
		return $pdo;
	}
}
//$pdo = new PDO('mysql:host=localhost;dbname=symfony', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
