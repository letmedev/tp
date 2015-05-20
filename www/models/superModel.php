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
		require_once('model_config.php');
		
		$pdo = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$pdo->exec("SET CHARACTER SET utf8");
		return $pdo;
	}
}
