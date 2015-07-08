<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Lokisalle | Location de salle de réunions</title>
    <link rel="stylesheet" type="text/css" href="<?php echo \controller\superController\superController::URLPUBLIC ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo \controller\superController\superController::URLPUBLIC ?>css/flexslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo \controller\superController\superController::URLPUBLIC ?>css/lightbox.css">
</head>
<body>

    <header>
        <div class="conteneur">
            <div class="header_gauche">
                <a href="<?php echo \controller\superController\superController::URL ?>produit/index" title="lokisalle" id="logo_header"><span>lokisalle</span></a>
            </div>
            <div class="header_droit">
                <div id="user_menu">
                    <?php echo $this->menuUser(); ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </header>
    <div class="trait_separateur_bleu"></div>
    <nav class="menuUserConnected">
        <div class="conteneur">
            <?php echo $this->navAdmin(); ?>
        </div>
    </nav>
    <section class="conteneur">
        <div class="contenu">
            <?php
                if(isset($msg) & !empty($msg)){
                    echo '<div class="msg">';
                    echo $this->msg;
                    echo '</div>';
                }

                if(isset($content) && !empty($content)){
                    echo $content;
                }
            ?>
        </div>
    </section>

    <footer>
        <div class="conteneur">
            <div class="footerLeft">
                <div class="logoFooter"></div>
                <p>Développé par Guillaume LE CLERC</p>
                <a href="http://www.gldev.fr">www.gldev.fr</a>
            </div>
            <div class="footerRight">
                <div class="blocHautFooter">
                    <p>
                        <a href="<?php echo \controller\superController\superController::URL ?>apropos/mentions">Mentions légales</a>  -
                        <a href="">Plan du site</a>  -
                        <a href="<?php echo \controller\superController\superController::URL ?>apropos/cgv">Condition générale de vente</a>  -
                        <a href="<?php echo \controller\superController\superController::URL ?>newsletter/inscription">S'inscrire à la newsletter</a>
                    </p>
                </div>
                <div class="blocBasFooter">
                    <p>Copyright © 2015 www.gldev.fr</a>, Tous droits réservés</p>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="<?php echo \controller\superController\superController::URLPUBLIC ?>js/jquery.min.js"></script>

    <!-- FlexSlider -->
    <script defer src="<?php echo \controller\superController\superController::URLPUBLIC ?>js/jquery.flexslider.js"></script>

    <script type="text/javascript">
        $(function(){
            $('#slide').flexslider({
                animation: "slide",
                start: function(slider){
                    $('body').removeClass('loading');
                }
            });
        });
    </script>

    <!-- Optional FlexSlider Additions -->
    <script src="<?php echo \controller\superController\superController::URLPUBLIC ?>js/jquery.easing.js"></script>
    <script src="<?php echo \controller\superController\superController::URLPUBLIC ?>js/jquery.mousewheel.js"></script>
    <script defer src="<?php echo \controller\superController\superController::URLPUBLIC ?>js/demo.js"></script>
    <!-- Intégration d'une lightbox -->
    <script src="<?php echo \controller\superController\superController::URLPUBLIC ?>js/jquery-1.11.0.min.js"></script>
    <script src="<?php echo \controller\superController\superController::URLPUBLIC ?>js/lightbox.js"></script>

    <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-2196019-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>

</body>
</html>