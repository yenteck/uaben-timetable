
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $page_title ;?></title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/bootstrap-select.min.css">
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
                    <li class="active"  ><a href="/Classes">Classes</a></li>
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

            <div class="text-center">
                <h3>AJOUTER UNE CLASSE </h3>

            </div>



            <form action="/Classes/add/" method="post">
                <div class="form-group">
                        <label for="">CHOISIR VOTRE FILIERE</label>
                        <select name="idfiliere"  class="selectpicker form-control bs-select-hidden" data-live-search="true">
                            <?php
                            foreach($listeFilieres as $filiere){
                                ?>
                                <option value="<?= $filiere['idfiliere'] ?>"><?= $filiere['codefiliere'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                </div>
                <div class="form-group">
                    <label for="">CODE CLASSE</label>
                    <input type="text" name="codeclasse"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="">LIBELLE CLASSE</label>
                    <input type="text" name="libelleclasse"  class="form-control">
                </div>
                <input type="submit" value="ENREGISTRER " class="btn btn-primary">
            </form>
        </div>
    </div>

    <!-- end the section-->

</div>
<script src="../../js/jquery-2.1.4.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/bootstrap-select.js"></script>
<script>
    $('.collapse').collapse();
</script>
</body>
</html>
