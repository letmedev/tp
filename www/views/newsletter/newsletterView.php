<h1 class="titrePageSalle">Inscription a la newsletter</h1>
<div class="traitSeparateurBleu2px"></div>
<form action="<?php echo \controller\superController\superController::URL ?>newsletter/inscription" method="post" class="formInscrNews">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" class="inputInscrNews" placeholder="exemple@domaine.com" required/>
    <input type="submit" name="btnValidInscrNews" value="S'inscrire" class="btnValidInscrNews">
</form>