
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
                    <li><a href="/Classes">Classes</a></li>
                    <li><a href="/Salles">Salles</a></li>
                    <li class="active"><a href="/Matieres">Matieres</a></li>
                    <li><a href="/Emploie">Emploie de temps</a></li>
                    <li><a href="/Professeurs">Profeseurs</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end the menu
    -->
    <!-- the section-->


    <div class="row" id="p-section">
        <div class="col-sm-offset-1 col-sm-10">

            <div class="text-center">
                <h3>MODIFIER UNE MATIERE</h3>

            </div>



            <form action="/Matieres/edit/<?= $idc;?>" method="post">
                <div class="form-group">
                    <label for="">CHOISIR VOTRE CLASSE</label>
                    <select name="idclasse" class="form-control">
                        <?php
                        foreach($listeClasses as $classe){
                            ?>
                            <option value="<?= $classe['idclasse'] ?>"><?= $classe['codeclasse'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">CODE MATIERE</label>
                    <input type="text" name="codematiere"  class="form-control" value="<?= $details['codematiere']; ?>">
                </div>
                <div class="form-group">
                    <label for="">NOM COMPLET DE LA MATIERE</label>
                    <input type="text" name="libellematiere"  class="form-control" value="<?= $details['libellematiere']; ?>">
                </div>
                <input type="submit" value="ENREGISTRER " class="btn btn-primary">
            </form>
        </div>
    </div>

    <!-- end the section-->
    <footer class="row" >
        <div class="col-lg-10 col-lg-offset-1" id="p-footer">
            the footer
        </div>
    </footer>
</div>

</body>
</html>
