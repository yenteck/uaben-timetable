<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $page_title ;?></title>

    <?php  include "inc/css.php"?>
</head>
<body>




        <header class="page-header" id="p-head">
            <div class="container" >
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                        <div class="col-sm-4 col-xs-8 text-left">
                            <b>TIME TABLE</b>
                        </div>
                        <div class="col-sm-4 hidden-xs">
                            the time table management
                        </div>
                        <div class="col-sm-4 col-xs-4">
                            connected <b> <?= $_SESSION['pseudo'];?></b>
                            <a href="/Auth/disconnect" class="btn btn-primary">DISCONNECT</a>
                        </div>
                        <div class="col-xs-12 visible-xs">

                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <!-- the menu -->
            <div class="row" id="p-menu">
                <div class="col-sm-offset-1 col-sm-10">
                    <div class="navbar navbar-default">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/">Accueil</a></li>
                            <li><a href="/Filieres">Filieres</a></li>
                            <li><a href="/Classes">Classes</a></li>
                            <li><a href="/Salles">Salles</a></li>
                            <li><a href="/Matieres">Matieres</a></li>
                            <li><a href="/Emploie">Emploie de temps</a></li>
                            <li><a href="/Professeurs">Profeseurs</a></li>
                        </ul>
                        </div>
                </div>
            </div>
            <!-- end the menu -->
            <!-- the section-->


            <div class="row" id="p-section">
                <div class="col-sm-offset-1 col-sm-10">

                    <div class="jumbotron">
                        <h3>Bienvenue sur Time Table</h3>
                        Ici vous pouvez manager votre emploie de temps en toute liberté.
                        Veuillez choisir votre option dans le menu

                        <a href="/Emploie" class="btn btn-lg btn-primary ">AJOUTER UN EMPLOIE</a>
                    </div>

                </div>
            </div>

            <!-- end the section-->
            <footer class="row" id="p-footer">
                <div class="col-lg-10 col-lg-offset-1 text-center" >
                    coded with <b style="font-size: 18px;">♥</b> by IT CLUB TEAM
                </div>
            </footer>
        </div>

</body>
</html>
