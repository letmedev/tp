<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Lokisalle | Location de salle de réunions</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/tp/www/public/css/style.css">
    <link rel="stylesheet" href="http://localhost/tp/www/public/css/flexslider.css" type="text/css" media="screen" />
</head>
<body>

    <header>
        <div class="conteneur">
            <div class="header_gauche">
                <a href="http://localhost/tp/www/public/routeur.php/produit/index" title="lokisalle" id="logo_header"><span>lokisalle</span></a>
            </div>
            <div class="header_droit">
                <div id="user_menu">
                    <a href="" title="connexion" class="user_menu">Connexion</a>
                    <a href="http://localhost/tp/www/public/routeur.php/membre/inscription" title="inscription" class="user_menu">Inscription</a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </header>
    <div class="trait_separateur_bleu"></div>

    <section class="conteneur">
        <div class="contenu">
            <?php
                if(isset($content)){
                    echo $content;
                }
            ?>
        </div>
    </section>

    <footer>

    </footer>
    <!-- jQuery -->
    <script src="http://localhost/tp/www/public/js/jquery.min.js"></script>

    <!-- FlexSlider -->
    <script defer src="http://localhost/tp/www/public/js/jquery.flexslider.js"></script>

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
    <script src="http://localhost/tp/www/public/js/jquery.easing.js"></script>
    <script src="http://localhost/tp/www/public/js/jquery.mousewheel.js"></script>
    <script defer src="http://localhost/tp/www/public/js/demo.js"></script>
</body>
</html>