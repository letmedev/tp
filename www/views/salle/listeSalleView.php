<section class="blocBlanc marginTop40">
    <p class="titreFormInscr">Trouver la salle idéale pour vos prochaines réunions</p>
    <div class="btnSearchAdd">
        <a href="<?php echo \controller\superController\superController::URL ?>produit/recherche" title="chercher une salle" id="btnSearchSalleAccueil"><span>Chercher une salle</span></a>
        <p>Chercher une salle</p>
    </div>

    <div class="btnSearchAdd">
        <a href="" title="ajouter une salle" id="btnAddSalleAccueil"><span>Ajouter une salle</span></a>
        <p>Louer votre salle</p>
    </div>
    <div class="clear"></div>
</section>
<div class="traitSeparateurBleu2px marginTop40"></div>
<section class="contenairList">
    <h1 class="titrePageSalle">Voici nos salles</h1>
    <?php
        foreach($liste as $valeur){
            echo "<div class='blocSalle'>";
            echo "    <div class='titreBlocSalle'>";
            echo        $valeur['titre'];
            echo "    </div>";
            echo "    <div class='imgBlocSalle'>";
            echo "      <img src='" . $valeur['photo']. "'/>";
            echo "    </div>";
            echo "    <div class='infoBlocSalle'>";
            echo "        <table>";
            echo "            <tr>";
            echo "                <td class='cellBlocSalle'>Ville:</td>";
            echo "                <td>" . $valeur['ville'] . "</td>";
            echo "            </tr>";
            echo "            <tr>";
            echo "                <td>Capacité:</td>";
            echo "                <td>" . $valeur['capacite'] . " personnes</td>";
            echo "            </tr>";
            echo "        </table>";
            echo "    </div>";
            echo "    <div class='btnBlocSalle'>";
            echo "      <a href='".\controller\superController\superController::URL."salle/fiche/".$valeur['id_salle']."' class='btnSalle'>En savoir +</a>";
            echo "    </div>";
            echo "</div>";
        }
    ?>
    <div class="clear"></div>
</section>