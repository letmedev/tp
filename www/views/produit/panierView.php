<div class="panier">
<h1 class="titrePageSalle">Votre panier</h1>
<div class="traitSeparateurBleu2px"></div>
    <table class="panierTable">
        <tr>
            <th class="panierThPhoto">Photo</th>
            <th class="panierThTitre">Désignation</th>
            <th class="panierThPrix">Prix HT</th>
            <th class="panierThSuppr">Suppr</th>
        </tr>
        <?php
            // Si le panier n'est pas vide
            if(isset($_SESSION['panier']['id_produit']) && !empty($_SESSION['panier']['id_produit'])){
                // Alors je boucle le panier afin d'afficher les produit qu'il y a dedans.
                for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++){
                    echo '<tr>';
                    echo '    <td class="panierImg"><img src="'. $_SESSION['panier']['photo'][$i] .'" alt="photo '. $_SESSION['panier']['titre'][$i] .'"</td>';
                    echo '    <td class="panierTitre"><p>'. $_SESSION['panier']['titre'][$i] .'</p></td>';
                    echo '    <td class="panierPrix"><p>'. $_SESSION['panier']['prix'][$i] .' €</p></td>';
                    echo '    <td>';
                    echo '        <form method="post" action="'.\controller\superController\superController::URL.'produit/panier">';
                    echo '            <input type="hidden" name="id_produit" value="' . $_SESSION['panier']['id_produit'][$i] . '" />';
                    echo '            <input type="submit" name="btnSupprArticlePanier" class="btnSupprArticlePanier" value=""/>';
                    echo '        </form>';
                    echo '    </td>';
                    echo '</tr>';
                }
            }
        ?>
    </table>
    <table class="tablePrix">
        <tr>
            <td class="tablePrixTotal">Total HT</td>
            <td class="tablePrixTr">1200€</td>
        </tr>
        <tr>
            <td class="tablePrixTotal">T.V.A</td>
            <td class="tablePrixTr">1200€</td>
        </tr>
        <tr>
            <td class="tablePrixTotal">Total TTC</td>
            <td class="tablePrixTr">1200€</td>
        </tr>
    </table>
    <div class="clear"></div>
    <div class="marginTop40">
        <form action="<?php echo \controller\superController\superController::URL ?>produit/panier" method="post">
            <input type="submit" name="ViderLePanier" value="Vider le panier" class="btnClearPanier" />
        </form>
        <form action="<?php echo \controller\superController\superController::URL ?>commande/paiement">
            <input type="submit" name="commander" value="Valider la commande" class="btnValidPanier" />
        </form>
        <div class="clear"></div>
    </div>
</div>