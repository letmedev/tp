<h1 class="titrePageSalle">Bon de commande</h1>
<hr/>

<table class="tableBonCommande">
    <tr class="tableBonCommandeLigne">
        <th class="tableBonCommandePhoto">Photo</th>
        <th class="tableBonCommandeDesignation">Designation</th>
        <th class="tableBonCommandeDateArrivee">Date arrivée</th>
        <th class="tableBonCommandeDateDepart">Date départ</th>
        <th class="tableBonCommandeTarif">Tarif</th>
    </tr>
    <?php
        for($i = 0; $i < count($result); $i++){
            echo '<tr class="tableBonCommandeLigne">';
            echo '    <td class="tableBonCommandePhoto"><img src="' . $result[$i]['photo'] . '"/></td>';
            echo '    <td class="tableBonCommandeDesignation">' . $result[$i]['titre'] . '</td>';
            echo '    <td class="tableBonCommandeDateArrivee">' . $result[$i]['date_arrivee'] . '</td>';
            echo '    <td class="tableBonCommandeDateDepart">' . $result[$i]['date_depart'] . '</td>';
            echo '    <td class="tableBonCommandeTarif">' . $result[$i]['prix'] . '</td>';
            echo '</tr>';
        }
    ?>
    <tr class="tableBonCommandeLigneTotal">
        <td class="tableBonCommandeTotal">Total HT</td>
        <td class="tableBonCommandePrix"><?php echo intval($result[0]['montant'])/1.20; ?> €</td>
    </tr>
</table>

<form action="<?php echo \controller\superController\superController::URL ?>commande/bonCommande" method="post">
    <?php
        for($i = 0; $i < count($result); $i++){
            echo '<input type="hidden" name="id_produit' . $i . '" value="' . $result[$i]['id_produit'] . '" />';
        }
    ?>
    <input type="submit" name="reserverProduit" value="Confirmer la reservation" class="btnReserverProduit"/>
</form>

<pre>
    <?php print_r($result); ?>
</pre>