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
    <h1 class="titreFormInscr">Formulaire d'inscription</h1>

    <form action="<?php echo superController::url; ?>membre/inscription" method="post" class="formInscription">

        <div class="groupForm">
            <label class="labelFormInscr" for="pseudo">Pseudo: </label>
            <input class="inputFormInscr" type="text" id="pseudo" name="pseudo" value="<?php if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){ echo $_POST['pseudo']; } ?>" placeholder="Votre pseudo…"/>
        </div>

        <div class="traitFormInscr"></div>

        <div class="groupForm">
            <label class="labelFormInscr" for="nom">Nom: </label>
            <input class="inputFormInscr" type="text" id="nom" name="nom" value="<?php if(isset($_POST['nom']) && !empty($_POST['nom'])){ echo $_POST['nom']; } ?>" placeholder="Votre nom…"/>
        </div>

        <div class="traitFormInscr"></div>

        <div class="groupForm">
            <label class="labelFormInscr" for="prenom">Prénom: </label>
            <input class="inputFormInscr" type="text" id="prenom" name="prenom" value="<?php if(isset($_POST['prenom']) && !empty($_POST['prenom'])){ echo $_POST['prenom']; } ?>" placeholder="Votre prénom…"/>
        </div>

        <div class="traitFormInscr"></div>

        <div class="groupForm">
            <label class="labelFormInscr" for="sexe">Sexe: </label>
            <select name="sexe" id="sexe">
                <option value="m">Masculin</option>
                <option value="f">Feminin</option>
            </select>
        </div>

        <div class="traitFormInscr"></div>

        <div class="groupForm">
            <label class="labelFormInscr" for="email1">Saisissez votre email: </label>
            <input class="inputFormInscr" type="email1" id="email1" name="email1" value="<?php if(isset($_POST['email1']) && !empty($_POST['email1'])){ echo $_POST['email1']; } ?>" placeholder="mail@exemple.com"/>
        </div>

        <div class="traitFormInscr"></div>

        <div class="groupForm">
            <label class="labelFormInscr" for="email2">Confirmer votre email: </label>
            <input class="inputFormInscr" type="email" id="email2" name="email2" value="" placeholder="Confirmez votre email"/>
        </div>

        <div class="traitFormInscr"></div>

        <div class="groupForm">
            <label class="labelFormInscr" for="password1">Password: </label>
            <input class="inputFormInscr" type="password" id="password1" name="password1"/>
        </div>

        <div class="traitFormInscr"></div>

        <div class="groupForm">
            <label class="labelFormInscr" for="password2">Confirmez votre password: </label>
            <input class="inputFormInscr" type="password" id="password2" name="password2"/>
        </div>

        <div class="traitFormInscr"></div>

        <div class="groupForm">
            <label class="labelFormInscr" class="labelFormInscri" for="adresse">Adresse: </label>
            <input class="inputFormInscr" type="text" id="adresse" name="adresse" value="<?php if(isset($_POST['adresse']) && !empty($_POST['adresse'])){ echo $_POST['adresse']; } ?>" placeholder="Votre adresse"/>
        </div>

        <div class="traitFormInscr"></div>

        <div class="groupForm">
            <label class="labelFormInscr" for="ville">Ville: </label>
            <input class="inputFormInscr" type="text" id="ville" name="ville" value="<?php if(isset($_POST['ville']) && !empty($_POST['ville'])){ echo $_POST['ville']; } ?>" placeholder="Votre ville"/>
        </div>

        <div class="traitFormInscr"></div>

        <div class="groupForm">
            <label class="labelFormInscr" for="cp">Code postale: </label>
            <input class="inputFormInscr" type="text" id="cp" name="cp" value="<?php if(isset($_POST['cp']) && !empty($_POST['cp'])){ echo $_POST['cp']; } ?>" placeholder="Votre code postal"/>
        </div>
        <div class="traitFormInscr"></div>
        <div class="clear"></div>
        <div class="groupForm">
            <input type="submit" value="Valider" name="btnEnregistrement" class="btnValidationInscription" />
        </div>

    </form>
</div>
<div class="clear"></div>
