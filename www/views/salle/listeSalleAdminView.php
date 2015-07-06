<h1 class="titrePageSalle">Liste des salles</h1>
<table class="tableListeSalle">
    <tr class="tableListeSalleLigne">
        <th class="tableListeSallePhoto">Photo</th>
        <th class="tableListeSalleDesignation">Designation</th>
        <th class="item">Detail</th>
        <th class="item">Suppression</th>
    </tr>
    <?php
        for($i = 0; $i < count($result); $i++){
            echo '<tr class="tableListeSalleLigne">';
            echo '    <td class="tableListeSallePhoto"><img src=" '. $result[$i]['photo'] .'" alt="photo salle" /></td>';
            echo '    <td class="tableListeSalleDesignation">' . $result[$i]['titre'] . '</td>';
            echo '    <td class="item"><a href="' . \controller\superController\superController::URL . 'salle/fiche/' . $result[$i]['id_salle'] . '" class="btnAfficherSalle">Afficher</a></td>';
            echo '    <td class="item">';
            echo '        <form action="' . \controller\superController\superController::URL . 'salle/affichageListe/' . $result[$i]['id_salle'] . '" method="post">';
            echo '            <input type="hidden" value="' . $result[$i]['id_salle'] . '" name="id_salle" />';
            echo '            <input type="submit" name="btnSupprSalle" value="Supprimer" class="btnSupprSalle" />';
            echo '        </form>';
            echo '    </td>';
            echo '</tr>';
        }
    ?>
</table>