<h1 class="titrePageSalle">Ajout de produit</h1>
<hr/>
<form action="<?php echo \controller\superController\superController::URL ?>produit/ajout" method="post" class="formAddProduit">
    <label for="id_salle" class="formAddProduitLabel">Salle:</label>
    <select name="id_salle" id="id_salle" class="formAddProduitSelect">
        <?php
            for($i = 0; $i <= count($result); $i++){
                echo '<option value="'.$result[$i]['id_salle'].'">'.$result[$i]['titre'].'</option>';
            }
        ?>
    </select>

    <div class="date">
        <p class="formAddProduitLabel">Du: </p>
        <label for="jour_date_arrivee">Jour</label>
        <select name="jour_date_arrivee" id="jour_date_arrivee">
            <?php
            for($i = 1; $i <= 31; $i++){
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
            ?>
        </select>

        <label for="mois_date_arivee">Mois</label>
        <select name="mois_date_arrivee" id="mois_date_arivee">
            <?php
                for($i = 1; $i <= 12; $i++){
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            ?>
        </select>
        <label for="annee_date_arrivee">Année</label>
        <select name="anne_date_arrivee" id="annee_date_arrivee">
            <?php
                for($i = 2015; $i <= 2025; $i++){
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            ?>
        </select>
    </div>
    <div class="date">
        <p class="formAddProduitLabel">Au:</p>
        <label for="jour_datte_depart">Jour</label>
        <select name="jour_date_depart" id="jour_datte_depart">
            <?php
                for($i = 1; $i <= 31; $i++){
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            ?>
        </select>
        <label for="mois_date_depart">Mois</label>
        <select name="mois_date_arrivee" id="mois_date_depart">
            <?php
                for($i = 1; $i <= 12; $i++){
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            ?>
        </select>
        <label for="anne_date_depart">Année</label>
        <select name="anne_date_depart" id="anne_date_depart">
            <?php
                for($i = 2015; $i <= 2025; $i++){
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            ?>
        </select>
    </div>

    <div class="date">
        <label for="prix" class="formAddProduitLabel">Tarif:</label>
        <input type="number" name="prix" id="prix" placeholder="Indiquer le tarif HT…" class="formAddProduitPrix"/>
    </div>

    <div class="formAddProduitEtat">
        <label for="etat"  class="formAddProduitLabel">Disponibilité</label>
        <select name="etat" id="etat" class="formAddProduitSelect">
            <option value="0">Disponible</option>
            <option value="1">Indisponible</option>
        </select>
    </div>
    <input type="submit" name="btnAddProduit" value="Enregistrer" class="btnAddProduit" />
</form>
