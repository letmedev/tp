<section class="ficheContenair">
    <h1><?php if(isset($result['titre']) && !empty($result['titre'])){ echo $result['titre']; } ?></h1>
    <div class="ficheContenairLeft">
        <a href="<?php if(isset($result['photo']) && !empty($result['photo'])){ echo $result['photo']; } ?>" data-lightbox="image-1" data-title="<?php if(isset($result['titre']) && !empty($result['titre'])){ echo $result['titre']; } ?>">
            <img src="<?php if(isset($result['photo']) && !empty($result['photo'])){ echo $result['photo']; } ?>" alt="Photo salle"/>
        </a>
        <p>Cliquez sur l'image pour l'agrandir</p>
    </div>

    <div class="ficheContenairRight">
        <div class="ficheContenairRightTop">
            <p><?php if(isset($result['description']) && !empty($result['description'])){ echo $result['description']; } ?></p>
        </div>
        <div class="ficheContenairRightMiddle">
            <table class="info">
                <tr>
                    <td class="infoLibelle">Capacité: </td>
                    <td class="infoValeur" colspan="4"><?php if(isset($result['capacite']) && !empty($result['capacite'])){ echo $result['capacite']; } ?></td>
                </tr>
                <tr>
                    <td class="infoLibelle">Date: </td>
                    <td class="infoValeur" colspan="4">
                        du:
                        <?php if(isset($result['date_arrivee']) && !empty($result['date_arrivee'])){ echo $result['date_arrivee']; } ?>
                        au:
                        <?php if(isset($result['date_depart']) && !empty($result['date_depart'])){ echo $result['date_depart']; } ?>
                    </td>
                </tr>
                <tr>
                    <td class="infoLibelle">Adresse: </td>
                    <td class="infoValeur" colspan="4"><?php if(isset($result['adresse']) && !empty($result['adresse'])){ echo $result['adresse']; } ?></td>
                </tr>
                <tr>
                    <td class="infoLibelle">Ville: </td>
                    <td class="infoValeur" colspan="4"><?php if(isset($result['ville']) && !empty($result['ville'])){ echo $result['ville']; } ?></td>
                </tr>
                <tr>
                    <td class="infoLibelle">Code postal: </td>
                    <td class="infoValeur" colspan="4"><?php if(isset($result['cp']) && !empty($result['cp'])){ echo $result['cp']; } ?></td>
                </tr>
                <tr>
                    <td class="infoLibelle">Prix: </td>
                    <td class="infoValeur"><?php if(isset($result['prix']) && !empty($result['prix'])){ echo $result['prix']; } ?> € HT</td>
                    <td colspan="2">
                        <form action="" method="post">
                            <input type="hidden" name="id_produit" value="<?php if(isset($result['id_produit']) && !empty($result['id_produit'])){ echo $result['id_produit']; } ?>" />
                            <input type="submit" name="btnAddPanier" value="Ajouter au panier" class="btnAddPanier" />
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="clear"></div>
</section>

<div class="blocAvis">
    <div class="trait_separateur_bleu"></div>
    <h2>Votre avis nous interesse !</h2>
    <section class="blocAvisLeft">
        <form action="<?php echo \controller\superController\superController::URL; ?>produit/fiche/<?php if(isset($result['id_produit']) && !empty($result['id_produit'])){ echo $result['id_produit']; } ?>" method="post">
            <input type="hidden" name="id_salle" value="<?php if(isset($result['id_salle']) && !empty($result['id_salle'])){ echo $result['id_salle']; } ?>" />
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" placeholder="Titre de votre commentaire…"/>

            <label for="commentaire" class="marginTop20">Votre avis</label>
            <textarea name="commentaire" id="commentaire" cols="30" rows="10"></textarea>

            <label for="note" class="marginTop20">Attribuer une note</label>
            <table>
                <tr>
                    <td>
                        <select name="note" id="note">
                            <?php
                                for($i = 1; $i <= 20; $i++){
                                    echo '<option value="'. $i .'">'. $i .'/20</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>

            <input type="submit" name="btnAvis" class="btnAvis" value="Valider" />
        </form>
    </section>
    <section class="blocAvisRight">
        <?php
            if(isset($avis) && !empty($avis)){
                foreach($avis as $result){
                    echo "<div class='headAvis'>";
                    echo "    <div class='titreAvis'>" . $result['titre'] . "</div>";
                    echo "    <div class='noteAvis'>" . $result['note'] . "/20</div>";
                    echo "<div class='clear'></div>";
                    echo "</div>";
                    echo "<div class='commentaireAvis'>" . $result['commentaire'] . "</div>";
                    echo "<div class='infoAvis'>";
                    echo "  <div class='autheurAvis'>Ecrit par: " . $result['id_membre'] . "</div>";
                    echo "  <div class='dateAvis'>" . $result['date_avis'] . "</div>";
                    echo "</div>";
                    echo "<div class='clear'></div>";
                }
            } else{
                echo '<div class="commentaireAvis">Aucun avis n\'est disponible pour cette salle.</div>';
            }
        ?>
    </section>
    <div class="clear"></div>
</div>

<section class="blocGris">
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
</section>

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