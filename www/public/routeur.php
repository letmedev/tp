<?php
include('..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'route.php');
// Format des URL https://lokisalle.gldev.fr/app.php/controller/action/id

// Si $_SERVER['PATH_INFO'] existe et qu'il n'est pas vide
if(isset($_SERVER['PATH_INFO']) && !empty($_SERVER['PATH_INFO'])){

    // Alors nous explosons la chaine de caractère afin de stocker les arguments dans des variables
    $url = explode('/', substr($_SERVER['PATH_INFO'], 1));
    $arg = '';
    // Test la presence des 3 arguments et les stock dans des variable s'il sont present et non vide
    if(isset($url[0]) && !empty($url[0])){

        $controller = $url[0];

        if(isset($url[1]) && !empty($url[1])){

            $action = $url[1];

            if(isset($url[2]) && !empty($url[2])){

                $arg .= $url[2];
            }
        }
    }
    // Si la valeur de la variable $controller existe dans le tableau route
    if(array_key_exists($controller, $route)){

        $fileController = $controller.'Controller.php';
        $classController = $controller.'Controller';

        include('..' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $fileController);

        // Si l'action est bien indexer dans le tableau de route
        if(in_array($action, $route[$controller])){
            // Si la methode existe dans la class alors j'initialise l'objet
            if(method_exists($classController, $route[$controller][$action])){

                $methode = $route[$controller][$action];

                $obj = new $classController;
                $obj->$methode($arg);

            } else{
                echo 'La méthode existe bien dans la route mais inexistante dans la class';
            }
        } else{
            echo 'La méthode demande n\'existe pas';
        }


    } else{
        echo 'Le controller demander est introuvable';
    }
} else{
    echo 'Erreur sur le controller ou l\'action'; // Ajouter un controller pour gérer une page d'erreur
}



