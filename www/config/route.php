<?php

$route = array(
    'produit' => array(
        'index' => 'index',
        'fiche' => 'fiche',
        'panier' => 'panier',
        'recherche' => 'recherche'
    ),
    'membre' => array(
        'connexion' => 'connexion',
        'inscription' => 'inscription',
        'compte' => 'compte',
        'deconnexion' => 'deconnexion'
    ),
    'salle' => array(
        'liste' => 'liste',
        'fiche' => 'fiche',
        'gestionSalle' => 'gestionSalle',
        'affichageListe' => 'affichageListe',
        'ajout' => 'ajout'
    ),
    'apropos' => array(
        'cgv' => 'cgv',
        'contact' => 'contact',
        'identite' => 'identite',
        'mentions' => 'mentions'
    ),
    'newsletter' => array(
        'inscription' => 'inscription'
    ),
    'commande' => array(
        'validationPanier' => 'validationPanier',
        'affichageCommande' => 'affichageCommande',
        'bonCommande' => 'bonCommande'
    )
);

?>