<h1 class="titrePageSalle">Liste des produits</h1>
<hr/>
<table class="tabListProduit">
    <tr class="tabListProduitLigne">
        <th class="tabListProduitPhoto">Photo</th>
        <th class="tabListProduitDesignation">Designation</th>
        <th class="tabListProduitDate">Du</th>
        <th class="tabListProduitDate">Au</th>
        <th class="tabListProduitPrix">Prix</th>
        <th class="tabListProduitDispo">Etat</th>
    </tr>

    <?php
        for($i = 0; $i < count($result); $i++){
            echo '<tr class="tabListProduitLigne">';
            echo '    <td class="tabListProduitPhoto"><img src="' . $result[$i]['photo'] . '" /></td>';
            echo '    <td class="tabListProduitDesignation">' . $result[$i]['titre'] . '</td>';
            echo '    <td class="tabListProduitDate">' . $result[$i]['date_arrivee'] . '</td>';
            echo '    <td class="tabListProduitDate">' . $result[$i]['date_depart'] . '</td>';
            echo '    <td class="tabListProduitPrix">' . $result[$i]['prix'] . ' €</td>';
            if($result[$i]['etat'] == '0'){
                echo '    <td class="tabListProduitDispo"><img src="' . \controller\superController\superController::URLPUBLIC. 'img/on.png"></td>';
            } else{
                echo '    <td class="tabListProduitDispo"><img src="' . \controller\superController\superController::URLPUBLIC. 'img/off.png"></td>';
            }
            echo '    <td><a href="' . \controller\superController\superController::URL . 'produit/fiche/' . $result[$i]['id_produit'] . '" class="btnAfficherProduit">Afficher</a></td>';
            echo '    <td><form action="' . \controller\superController\superController::URL . 'produit/affichage" method="post">';
            echo '        <input type="hidden" name="id_produit" value="' . $result[$i]['id_produit'] . '" />';
            echo '        <input type="submit" name="btnSupprProduit" class="btnSupprProduit" value="Supprimer" />';
            echo '    </form></td>';
            echo '</tr>';
        }
    ?>
</table>
