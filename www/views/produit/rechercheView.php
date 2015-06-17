<div>
    <img src="<?php echo \controller\superController\superController::URLPUBLIC ?>img/bandeauforminscr.png" alt="image recherche"/>

    <form action="<?php echo \controller\superController\superController::URL ?>produit/recherche" method="post" class="formRecherche">
        <label for="rechercheProduit">Saisissez une ville, un nombre de personnes ou le nom d'une salle</label>
        <input type="text" name="rechercheProduit" id="rechercheProduit" class="inputFormRecherche"/>
        <input type="submit" name="btnFormRechercheProduit" class="btnFormRechercheProduit" value="Rechercher"/>
    </form>
</div>

<section class="contenairList">

    <?php
        if(!empty($result)){
            if($result !== false){
                echo "<div class='traitSeparateurBleu2px marginTop40'></div>";
                echo '<h2 class="titrePageSalle">Voici le resultat de votre recherche</h2>';
                foreach($result as $valeur){
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
                    echo "      <a href='' class='btnSalle'>En savoir +</a>";
                    echo "    </div>";
                    echo "</div>";
                }
            } else{
                echo "<h2 class='titrePageSalle'>Aucun élément n'as été trouver !</h2>";
            }
        }

    ?>

    <div class="clear"></div>
</section>