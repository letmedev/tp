<h1 class="titrePageSalle">Ajout de salle</h1>
<hr/>

<form action="<?php echo \controller\superController\superController::URL ?>salle/ajout" method="post" enctype="multipart/form-data" class="formAddSalle">
    <label for="nomSalle" class="labelFormAddSalle">Nom de la salle: </label>
    <input type="text" name="nomSalle" id="nomSalle" placeholder="Nom de la salle…" class="inputFormAddSalle"/>
    <label for="adresse" class="labelFormAddSalle">Adresse: </label>
    <input type="text" name="adresse" id="adresse" placeholder="Adresse…" class="inputFormAddSalle"/>
    <label for="cp" class="labelFormAddSalle">Code postal:</label>
    <input type="text" name="cp" id="cp" placeholder="Code postal…" class="inputFormAddSalle"/>
    <label for="ville" class="labelFormAddSalle">Ville:</label>
    <input type="text" name="ville" id="ville" placeholder="Ville…" class="inputFormAddSalle"/>
    <label for="pays" class="labelFormAddSalle">Pays:</label>
    <select name="pays" id="pays">
        <option value="France">France</option>
    </select>
    <label for="description" class="labelFormAddSalle">Description:</label>
    <textarea name="description" id="description" class="textareaFormAddSalle"></textarea>
    <label for="photo" class="labelFormAddSalle">Photo:</label>
    <input type="file" name="photo" id="photo"/>
    <label for="capacite" class="labelFormAddSalle">Capacité:</label>
    <input type="number" name="capacite" id="capacite" placeholder="Nombre de personnes maximum…" class="inputFormAddSalle"/>
    <label for="categorie" class="labelFormAddSalle">Categorie:</label>
    <select name="categorie" id="categorie">
        <option value="Réunion">Réunion</option>
    </select>
    <input type="submit" name="btnAddSalle" value="Enregistrer" class="btnAddSalle"/>
</form>