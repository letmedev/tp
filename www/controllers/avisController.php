<?php
namespace controller\avisController{

    use controller\superController\superController;
    use model\avisModel\avisModel;

    class avisController extends superController{

        public function ajoutAvis(array $tab){

            include('..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'avisModel.php');

            if(isset($tab) && !empty($tab)){
                $objAvisModel = new avisModel();
                $objAvisModel->addAvis($tab);

                return true;
            }
        }
    }
}


?>