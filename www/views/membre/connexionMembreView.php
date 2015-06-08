<div class="hautFormInscr"></div>
<div class="backLeftFormInscr">
    <div class="leftFormInfo">
        <div class="publeft">
            <span class="loupeFormInscr"></span>
        </div>
        <div class="pubright">
            <p>Trouver la salle idéale en quelque clics !</p>
        </div>
    </div>
    <div class="leftFormInfo">
        <div class="publeft">
            <div class="sourieFormInscr"></div>
        </div>
        <div class="pubright">
            <p>Reservez en ligne</p>
        </div>
    </div>
    <div class="leftFormInfo">
        <div class="publeft">
            <div class="paiementFormInscr"></div>
        </div>
        <div class="pubright">
            <p>Paiement en ligne securisé !</p>
        </div>
    </div>
</div>

<div class="backForm">
    <h1 class="titreFormInscr">Connectez-vous !</h1>

    <form action="<?php echo \controller\superController\superController::URL ?>membre/connexion" method="post" class="formInscription">

        <div class="formConnect marginTop40">
            <label for="email">Email: </label>
            <input type="email" id="email" name="email" placeholder="exemple@mail.fr"  value="<?php if(isset($_POST['email']) && !empty($_POST['email'])){ echo $_POST['email']; } ?>"/>

            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password"/>
        </div>

        <div class="groupForm marginTop40">
            <input type="submit" value="Connexion" name="btnConnexion" class="btnValidationInscription" />
        </div>

    </form>
</div>
<div class="clear"></div>
<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 03/06/15
 * Time: 11:09
 */