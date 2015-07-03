<h1 class="titrePageSalle">Tableau des commandes</h1>
<hr/>
<table class="tabCommande">
    <tr class="tabCommandeLigne">
        <th class="tabCommandeCellNumero">N°Commande</th>
        <th class="tabCommandeCellMontant">Montant</th>
        <th class="tabCommandeCellClient">Client</th>
        <th class="tabCommandeCellDate">Date</th>
        <th class="item">Detail</th>
        <th class="item">Suppr</th>
    </tr>

    <?php
        for($i = 0; $i < count($liste); $i++){
            echo '<tr class="tabCommandeLigne">';
            echo '    <td class="tabCommandeCellNumero">' . $liste[$i]['id_commande'] . '</td>';
            echo '    <td class="tabCommandeCellMontant">' . $liste[$i]['montant'] . '</td>';
            echo '    <td class="tabCommandeCellClient">' . $liste[$i]['id_membre'] . '</td>';
            echo '    <td class="tabCommandeCellDate">' . $liste[$i]['date_commande'] . '</td>';
            echo '    <td class="item">';
            echo '        <form method="post" action="' . \controller\superController\superController::URL . 'commande/bonCommande/' . $liste[$i]['id_commande'] . '" >';
            echo '            <input type="hidden" value="' . $liste[$i]['id_commande'] . '" name="idCommande" />';
            echo '            <input type="submit" name="btnAfficherCommande" value="Afficher" class="btnAfficherCommande" >';
            echo '        </form>';
            echo '    </td>';
            echo '    <td class="item">';
            echo '        <form action="' . \controller\superController\superController::URL . 'commande/affichageCommande/' . $liste[$i]['id_commande'] . '" method="post">';
            echo '            <input type="hidden" value="' . $liste[$i]['id_commande'] . '" name="id_commande" />';
            echo '            <input type="submit" name="btnSupprCommande" value="Supprimer" class="btnSupprCommande" />';
            echo '        </form>';
            echo '    </td>';
            echo '</tr>';
        }
    ?>

</table>

<form action="" ></form>