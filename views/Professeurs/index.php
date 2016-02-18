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
                    <li ><a href="/">Accueil</a></li>
                    <li ><a href="/Filieres" >Filieres</a></li>
                    <li><a href="/Classes">Classes</a></li>
                    <li ><a href="/Salles">Salles</a></li>
                    <li><a href="/Matieres">Matieres</a></li>
                    <li><a href="/Emploie">Emploie de temps</a></li>
                    <li class="active"><a href="/Professeurs">Profeseurs</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end the menu -->
    <!-- the section-->


    <div class="row" id="p-section">
        <div class="col-sm-offset-1 col-sm-10">

            <div class="text-center">
                <h3>liste des Professeurs</h3>
            </div>

            <a href="/Professeurs/add" class="btn btn-info" style="margin-bottom: 10px">Ajouter un professeur</a>
            <div>
                <table class="table table-bordered table-info table-default">
                    <tr>
                        <th>N°</th>
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>NOM COURT</th>
                        <th>CONTACT</th>

                        <th colspan="2">ACTION</th>
                    </tr>
                    <?php
                    $i=1;
                    foreach ($allProfesseurs as $professeur) {
                        ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $professeur['nomprofesseur']; ?></td>
                            <td><?= $professeur['prenomprofesseur']; ?></td>
                            <td><?= $professeur['nomcourt']; ?></td>
                            <td><?= $professeur['contact']; ?></td>
                            <td><a href="/Professeurs/delete/<?= $professeur['idprofesseur']; ?>">supprimer</a></td>
                            <td><a href="/Professeurs/edit/<?= $professeur['idprofesseur']; ?>">modifier</a></td>

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

</body>
</html>
