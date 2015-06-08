<section class="slider">
    <div id="slide" class="flexslider">
        <ul class="slides">
            <li>
                <img src="<?php echo \controller\superController\superController::URLPUBLIC; ?>img/slider/slide01.jpg" alt="image d'accueil" />
            </li>
            <li>
                <img src="<?php echo \controller\superController\superController::URLPUBLIC; ?>img/slider/salle01.jpg" alt="Photo salle de réunion" />
            </li>
            <li>
                <img src="<?php echo \controller\superController\superController::URLPUBLIC; ?>img/slider/salle02.jpg" alt="Photo salle de réunion"/>
            </li>
        </ul>
    </div>
</section>

<div class="blocBlanc marginTop40">

    <p>Trouver la salle idéale pour vos prochaines réunions</p>
    <div class="btnSearchAdd">
        <a href="" title="chercher une salle" id="btnSearchSalleAccueil"><span>Chercher une salle</span></a>
        <p>Chercher une salle</p>
    </div>

    <div class="btnSearchAdd">
        <a href="" title="ajouter une salle" id="btnAddSalleAccueil"><span>Ajouter une salle</span></a>
        <p>Louer votre salle</p>
    </div>
    <div class="clear"></div>

</div>

<div class="blocGris">
    <div class="trait_separateur_bleu"></div>
    <h2>Notre sélection</h2>
    <div class="zoneAnnonce">
        <div class="blocAnnonce">
            <h4><?php if(isset($produitTop[0]['titre']) && !empty($produitTop[0]['titre'])){ echo $produitTop[0]['titre']; } ?></h4>
            <img src="<?php if(isset($produitTop[0]['photo']) && !empty($produitTop[0]['photo'])){ echo $produitTop[0]['photo']; } ?>" >
            <h5><?php if(isset($produitTop[0]['ville']) && !empty($produitTop[0]['ville'])){ echo $produitTop[0]['ville']; } ?></h5>
            <p><?php if(isset($produitTop[0]['description']) && !empty($produitTop[0]['description'])){ echo $produitTop[0]['description']; } ?></p>
            <div class="btnAnnonce"><a href="<?php if(isset($produitTop[0]['id_produit']) && !empty($produitTop[0]['id_produit'])){ echo \controller\superController\superController::URL . 'produit/fiche/'.$produitTop[0]['id_produit']; }?>">Voir cette salle</a></div>
        </div>
        <div class="blocAnnonce marginLeft50">
            <h4><?php if(isset($produitTop[1]['titre']) && !empty($produitTop[1]['titre'])){ echo $produitTop[1]['titre']; } ?></h4>
            <img src="<?php if(isset($produitTop[1]['photo']) && !empty($produitTop[1]['photo'])){ echo $produitTop[1]['photo']; } ?>" >
            <h5><?php if(isset($produitTop[1]['ville']) && !empty($produitTop[1]['ville'])){ echo $produitTop[1]['ville']; } ?></h5>
            <p><?php if(isset($produitTop[1]['description']) && !empty($produitTop[1]['description'])){ echo $produitTop[1]['description']; } ?></p>
            <div class="btnAnnonce"><a href="<?php if(isset($produitTop[1]['id_produit']) && !empty($produitTop[1]['id_produit'])){ echo \controller\superController\superController::URL . 'produit/fiche/'.$produitTop[1]['id_produit']; }?>">Voir cette salle</a></div>
        </div>
        <div class="blocAnnonce marginLeft50">
            <h4><?php if(isset($produitTop[2]['titre']) && !empty($produitTop[2]['titre'])){ echo $produitTop[2]['titre']; } ?></h4>
            <img src="<?php if(isset($produitTop[2]['photo']) && !empty($produitTop[2]['photo'])){ echo $produitTop[2]['photo']; } ?>" >
            <h5><?php if(isset($produitTop[2]['ville']) && !empty($produitTop[2]['ville'])){ echo $produitTop[2]['ville']; } ?></h5>
            <p><?php if(isset($produitTop[2]['description']) && !empty($produitTop[2]['description'])){ echo $produitTop[2]['description']; } ?></p>
            <div class="btnAnnonce"><a href="<?php if(isset($produitTop[2]['id_produit']) && !empty($produitTop[2]['id_produit'])){ echo \controller\superController\superController::URL . 'produit/fiche/'.$produitTop[2]['id_produit']; }?>">Voir cette salle</a></div>
        </div>
        <div class="blocAnnonce marginLeft50">
            <h4><?php if(isset($produitTop[3]['titre']) && !empty($produitTop[3]['titre'])){ echo $produitTop[3]['titre']; } ?></h4>
            <img src="<?php if(isset($produitTop[3]['photo']) && !empty($produitTop[3]['photo'])){ echo $produitTop[3]['photo']; } ?>" >
            <h5><?php if(isset($produitTop[3]['ville']) && !empty($produitTop[3]['ville'])){ echo $produitTop[3]['ville']; } ?></h5>
            <p><?php if(isset($produitTop[3]['description']) && !empty($produitTop[3]['description'])){ echo $produitTop[3]['description']; } ?></p>
            <div class="btnAnnonce"><a href="<?php if(isset($produitTop[3]['id_produit']) && !empty($produitTop[3]['id_produit'])){ echo \controller\superController\superController::URL . 'produit/fiche/'.$produitTop[3]['id_produit']; }?>">Voir cette salle</a></div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div class="blocBlanc marginTop20">
    <p>Suivez-nous !</p>
    <div class="blocIconSociaux">
        <a href="" id="facebook" title="Suivez-nous sur facebook"><span>facebook</span></a>
        <a href="" id="viadeo" title="Suivez-nous sur viadéo"><span>viadeo</span></a>
        <a href="" id="twitter" title="Suivez-nous sur twitter"><span>twitter</span></a>
        <a href="" id="linkedin" title="Suivez-nous sur linkedin"><span>linkedin</span></a>
        <a href="" id="googleplus" title="Suivez-nous sur google+"><span>google+</span></a>
    </div>
</div>

<div class="blocGris">
    <div class="trait_separateur_bleu"></div>
    <h2>Besoin d'une salle à la dernière minute?</h2>
    <div class="zoneAnnonce">
        <div class="blocAnnonce">
            <h4><?php if(isset($produitMinute[0]['titre']) && !empty($produitMinute[0]['titre'])){ echo $produitMinute[0]['titre']; } ?></h4>
            <img src="<?php if(isset($produitMinute[0]['photo']) && !empty($produitMinute[0]['photo'])){ echo $produitMinute[0]['photo']; } ?>" >
            <h5><?php if(isset($produitMinute[0]['ville']) && !empty($produitMinute[0]['ville'])){ echo $produitMinute[0]['ville']; } ?></h5>
            <p><?php if(isset($produitMinute[0]['description']) && !empty($produitMinute[0]['description'])){ echo $produitMinute[0]['description']; } ?></p>
            <div class="btnAnnonce"><a href="<?php if(isset($produitMinute[0]['id_produit']) && !empty($produitMinute[0]['id_produit'])){ echo \controller\superController\superController::URL . 'produit/fiche/'.$produitMinute[0]['id_produit']; }?>">Voir cette salle</a></div>
        </div>
        <div class="blocAnnonce marginLeft50">
            <h4><?php if(isset($produitMinute[1]['titre']) && !empty($produitMinute[1]['titre'])){ echo $produitMinute[1]['titre']; } ?></h4>
            <img src="<?php if(isset($produitMinute[1]['photo']) && !empty($produitMinute[1]['photo'])){ echo $produitMinute[1]['photo']; } ?>" >
            <h5><?php if(isset($produitMinute[1]['ville']) && !empty($produitMinute[1]['ville'])){ echo $produitMinute[1]['ville']; } ?></h5>
            <p><?php if(isset($produitMinute[1]['description']) && !empty($produitMinute[1]['description'])){ echo $produitMinute[1]['description']; } ?></p>
            <div class="btnAnnonce"><a href="<?php if(isset($produitMinute[1]['id_produit']) && !empty($produitMinute[1]['id_produit'])){ echo \controller\superController\superController::URL . 'produit/fiche/'.$produitMinute[1]['id_produit']; }?>">Voir cette salle</a></div>
        </div>
        <div class="blocAnnonce marginLeft50">
            <h4><?php if(isset($produitMinute[2]['titre']) && !empty($produitMinute[2]['titre'])){ echo $produitMinute[2]['titre']; } ?></h4>
            <img src="<?php if(isset($produitMinute[2]['photo']) && !empty($produitMinute[2]['photo'])){ echo $produitMinute[2]['photo']; } ?>" >
            <h5><?php if(isset($produitMinute[2]['ville']) && !empty($produitMinute[2]['ville'])){ echo $produitMinute[2]['ville']; } ?></h5>
            <p><?php if(isset($produitMinute[2]['description']) && !empty($produitMinute[2]['description'])){ echo $produitMinute[2]['description']; } ?></p>
            <div class="btnAnnonce"><a href="<?php if(isset($produitMinute[2]['id_produit']) && !empty($produitMinute[2]['id_produit'])){ echo \controller\superController\superController::URL . 'produit/fiche/'.$produitMinute[2]['id_produit']; }?>">Voir cette salle</a></div>
        </div>
        <div class="blocAnnonce marginLeft50">
            <h4><?php if(isset($produitMinute[3]['titre']) && !empty($produitMinute[3]['titre'])){ echo $produitMinute[3]['titre']; } ?></h4>
            <img src="<?php if(isset($produitMinute[3]['photo']) && !empty($produitMinute[3]['photo'])){ echo $produitMinute[3]['photo']; } ?>" >
            <h5><?php if(isset($produitMinute[3]['ville']) && !empty($produitMinute[3]['ville'])){ echo $produitMinute[3]['ville']; } ?></h5>
            <p><?php if(isset($produitMinute[3]['description']) && !empty($produitMinute[3]['description'])){ echo $produitMinute[3]['description']; } ?></p>
            <div class="btnAnnonce"><a href="<?php if(isset($produitMinute[3]['id_produit']) && !empty($produitMinute[3]['id_produit'])){ echo \controller\superController\superController::URL . 'produit/fiche/'.$produitMinute[3]['id_produit']; }?>">Voir cette salle</a></div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div class="blocBlanc marginTop20">
    <p>Contactez-nous</p>
    <div class="zoneContact">
        <div class="blocContact">
            <p class="marginTop20">
                Par téléphone au:
                <br />
                0 000 000 000*
            </p>
            <p class="asterix">* Ce numéro de téléphone n'est pas attribué car la société est fictif.</p>
        </div>
        <div class="blocContact">
            <p class="textContact">
                Par email à: contact@gldev.fr<br />
                ou via le formulaire de contact
            </p>
            <a href="" id="btnContact" title="">Formulaire de contact</a>
        </div>
    </div>
</div>