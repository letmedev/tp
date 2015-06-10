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
    }
}

?>