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
            echo "      <a href='' class='btnSalle'>En savoir +</a>";
            echo "    </div>";
            echo "</div>";
        }
    ?>

    <div class="clear"></div>
</section>