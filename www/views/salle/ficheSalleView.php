<div class="blocFicheSalle">
    <h1 class="titrePageSalle"><?php if(isset($salle['titre']) && !empty($salle['titre'])){ echo $salle['titre'];} ?></h1>
    <div class="ficheSalleLeft">
        <a href="<?php if(isset($salle['photo']) && !empty($salle['photo'])){ echo $salle['photo'];} ?>" data-lightbox="image-1" data-title="<?php if(isset($salle['titre']) && !empty($salle['titre'])){ echo $salle['titre'];} ?>">
            <img src="<?php if(isset($salle['photo']) && !empty($salle['photo'])){ echo $salle['photo'];} ?>" alt="Photo salle"/>
        </a>
        <p>Cliquez sur l'image pour l'agrandir</p>
    </div>
    <div class="ficheSalleRight">
        <p>
            <?php if(isset($salle['description']) && !empty($salle['description'])){ echo $salle['description'];}else{ echo 'Information non disponible.'; } ?>
        </p>
        <table>
            <tr>
                <td class="cellBlocSalle">Adresse:</td>
                <td><?php if(isset($salle['adresse']) && !empty($salle['adresse'])){ echo $salle['adresse'];}else{ echo 'Information non disponible.'; } ?></td>
            </tr>
            <tr>
                <td class="cellBlocSalle">Ville:</td>
                <td><?php if(isset($salle['ville']) && !empty($salle['ville'])){ echo $salle['ville'];}else{ echo 'Information non disponible.'; } ?></td>
            </tr>
            <tr>
                <td class="cellBlocSalle">Code postale:</td>
                <td><?php if(isset($salle['cp']) && !empty($salle['cp'])){ echo $salle['cp'];}else{ echo 'Information non disponible.'; } ?></td>
            </tr>
            <tr>
                <td class="cellBlocSalle">Pays:</td>
                <td><?php if(isset($salle['pays']) && !empty($salle['pays'])){ echo $salle['pays'];}else{ echo 'Information non disponible.'; } ?></td>
            </tr>
            <tr>
                <td class="cellBlocSalle">capacité:</td>
                <td><?php if(isset($salle['capacite']) && !empty($salle['capacite'])){ echo $salle['capacite'];}else{ echo 'Information non disponible.'; } ?></td>
            </tr>
        </table>
    </div>
    <div class="clear"></div>
</div>

<section class="contenairList">

    <?php
    if(!empty($produit)){
        if($produit !== false){
            echo "<div class='traitSeparateurBleu2px marginTop40'></div>";
            echo '<h2 class="titrePageSalle">Voici les dates disponible</h2>';
            foreach($produit as $valeur){
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
                echo "            <tr>";
                echo "                <td>Du:</td>";
                echo "                <td>" . $valeur['date_arrivee'] . "</td>";
                echo "            </tr>";
                echo "            <tr>";
                echo "                <td>Au:</td>";
                echo "                <td>" . $valeur['date_depart'] . "</td>";
                echo "            </tr>";
                echo "        </table>";
                echo "    </div>";
                echo "    <div class='btnBlocSalle'>";
                echo "      <a href='". \controller\superController\superController::URL ."produit/fiche/" . $valeur['id_produit'] . "' class='btnSalle'>En savoir +</a>";
                echo "    </div>";
                echo "</div>";
            }
        } elseif($produit == false){
            echo "<div class='traitSeparateurBleu2px marginTop40'></div>";
            echo "<h2 class='titrePageSalle'>Aucun élément n'as été trouver !</h2>";
        }
    }

    ?>

    <div class="clear"></div>
</section>


