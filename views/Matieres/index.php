<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $page_title ;?></title>
    <?php  include "inc/css.php"?>
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
                    <li><a href="/Classes">Classes</a></li>
                    <li ><a href="/Salles">Salles</a></li>
                    <li class="active"><a href="/Matieres">Matieres</a></li>
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
                <h3>liste des Matieres</h3>
            </div>

            <div class="form-group">
                <form action="/Matieres" method="post">
                    <label for="">CHOISIR VOTRE FILIERE</label>
                    <select name="idclasse" id="idclasse" class="selectpicker bs-select-hidden" data-live-search="true">
                        <?php
                        foreach($listeClasses as $classe){
                            ?>
                            <option value="<?= $classe['idclasse'] ?>"><?= $classe['codeclasse'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <input type="submit" value="Afficher" class="btn btn-info   ">
                </form>
            </div>

            <a href="/Matieres/add" class="btn btn-info" style="margin-bottom: 10px">Ajouter une Matiere</a>
            <div>
                <table class="table table-bordered table-info table-default">
                    <tr>
                        <th>N°</th>
                        <th>CODE MATIERE</th>
                        <th>NOM COMPLET</th>
                        <th>CLASSE</th>

                        <th colspan="2">ACTION</th>
                    </tr>
                    <?php
                    $i=1;
                    foreach ($allMatieres as $matiere) {
                        ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $matiere['codematiere']; ?></td>
                            <td><?= $matiere['libellematiere']; ?></td>
                            <td><?= $matiere['codeclasse']; ?></td>
                            <td><a href="/Matieres/delete/<?= $matiere['idmatiere']; ?>">supprimer</a></td>
                            <td><a href="/Matieres/edit/<?= $matiere['idmatiere']; ?>">modifier</a></td>

                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </table>
            </div>


        </div>
    </div>

    <!-- end the section-->
    <footer class="row" >
        <div class="col-lg-10 col-lg-offset-1" id="p-footer">
            the footer
        </div>
    </footer>
</div>

<script src="../../js/jquery-2.1.4.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/bootstrap-select.js"></script>
<script>
    idclasse.value=<?=$idclasse?>
</script>
</body>
</html>
