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


            $tab = array(
                'msg' => $this->getMsg(),
                'directoryView' => 'apropos',
                'fileView' => 'contactView.php'
            );

            $this->render($tab);
        }

    }
}