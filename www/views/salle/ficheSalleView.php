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

