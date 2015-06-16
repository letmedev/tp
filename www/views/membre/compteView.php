<h1 class="titrePageSalle">Mon compte</h1>
<div class="">
    <table class="tabCompte">
        <tr>
            <td class="tabCompteLabel">Pseudo:</td>
            <td class="tabCompteInfo"><?php if(isset($membre['pseudo']) && !empty($membre['pseudo'])){ echo $membre['pseudo']; } ?></td>
        </tr>
        <tr>
            <td class="tabCompteLabel">Nom</td>
            <td class="tabCompteInfo"><?php if(isset($membre['nom']) && !empty($membre['nom'])){ echo $membre['nom']; } ?></td>
        </tr>
        <tr>
            <td class="tabCompteLabel">Prenom</td>
            <td class="tabCompteInfo"><?php if(isset($membre['prenom']) && !empty($membre['prenom'])){ echo $membre['prenom']; } ?></td>
        </tr>
        <tr>
            <td class="tabCompteLabel">email:</td>
            <td class="tabCompteInfo"><?php if(isset($membre['email']) && !empty($membre['email'])){ echo $membre['email']; } ?></td>
        </tr>
        <tr>
            <td class="tabCompteLabel">Sexe</td>
            <td class="tabCompteInfo"><?php if(isset($membre['sexe']) && !empty($membre['sexe'])){
                    if($membre['sexe'] == 'm'){
                        echo 'Masculin';
                    } else {
                        echo 'Feminin';
                    }
                } ?></td>
        </tr>
        <tr>
            <td class="tabCompteLabel">Adresse</td>
            <td class="tabCompteInfo"><?php if(isset($membre['adresse']) && !empty($membre['adresse'])){ echo $membre['adresse']; } ?></td>
        </tr>
        <tr>
            <td class="tabCompteLabel">Ville</td>
            <td class="tabCompteInfo"><?php if(isset($membre['ville']) && !empty($membre['ville'])){ echo $membre['ville']; } ?></td>
        </tr>
        <tr>
            <td class="tabCompteLabel">Code postal</td>
            <td class="tabCompteInfo"><?php if(isset($membre['cp']) && !empty($membre['cp'])){ echo $membre['cp']; } ?></td>
        </tr>
        <tr>
            <td class="tabCompteLabel">Mot de passe</td>
            <td class="tabCompteInfo"><a href="<?php echo \controller\superController\superController::URL . "membre/password/" . $_SESSION['id_membre'] ?>" class="btnModifPassword">Modifier votre mot de passe</a></td>
        </tr>
    </table>
</div>