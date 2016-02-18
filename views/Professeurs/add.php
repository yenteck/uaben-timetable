<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $page_title ;?></title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">

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
                    <li class="active"><a href="/Salles">Salles</a></li>
                    <li><a href="/Cours">Cours</a></li>
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
                <h3>AJOUTER UN PROFESSEUR </h3>

            </div>

            <form action="/Professeurs/add/" method="post">
                <div class="form-group">
                    <label for="">NOM </label>
                    <input type="text" name="nomprofesseur"  class="form-control">
                </div>

                <div class="form-group">
                    <label for="">PRENOM </label>
                    <input type="text" name="prenomprofesseur"  class="form-control">
                </div>

                <div class="form-group">
                    <label for="">EMAIL </label>
                    <input type="text" name="emailprofesseur"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="">CONTACT </label>
                    <input type="text" name="contact"  class="form-control">
                </div>

                <div class="form-group">
                    <label for="">NOM COURT  </label>
                    <input type="text" name="nomcourt" placeholder="ex: M.OUOBA"  class="form-control">
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
