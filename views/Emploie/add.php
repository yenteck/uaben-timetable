
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $page_title ;?></title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <?php
    include "inc/css.php";
    ?>
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
                    <li ><a href="/">Accueil</a></li>
                    <li ><a href="/Filieres" >Filieres</a></li>
                    <li ><a href="/Classes">Classes</a></li>
                    <li><a href="/Salles">Salles</a></li>
                    <li class="active"><a href="/Emploie">Emploie de temps</a></li>
                    <li><a href="/Matieres">Matieres</a></li>
                    <li><a href="/Professeurs">Profeseurs</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end the menu -->
    <!-- the section-->


    <div class="row" id="p-section">
        <div class="col-sm-offset-1 col-sm-10">

            <div class="text-center">
                <h3>AJOUTER UN EMPLOIE </h3>

            </div>



            <form action="/Emploie/add" method="post">
                <div class="form-group">
                    <label for="">CHOISIR VOTRE CLASSE</label>
                    <select name="idclasse" class="form-control">
                        <?php
                        foreach($listeClasse as $classes){
                            ?>
                            <option value="<?= $classes['idclasse'] ?>"><?= $classes['codeclasse'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">NOM DE L'EMPLOIE  </label>
                    <input type="text" name="libelle"  class="form-control" placeholder="Ex: emploie du 01 au 7 avril 2015">
                </div>
                <input type="submit" value="ENREGISTRER " class="btn btn-primary">
            </form>
        </div>
    </div>

    <!-- end the section-->
</div>

</body>
</html>
