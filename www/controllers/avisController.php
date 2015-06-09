<?php
/*namespace controller\avisController{

    use model\avisModel\avisModel;

    class avisController{

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