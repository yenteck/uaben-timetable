<!doctype html>
<html>
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
                    <li ><a href="/Matieres">Matieres</a></li>
                    <li class="active"><a href="/Cours">Cours</a></li>
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
                <h3>EMPLOIES DE TEMPS </h3>
            </div>

            <div class="form-group">
                <form action="/Cours" method="post">
                    <label for="">CHOISIR CLASSE</label>
                    <select name="idclasse" id="">
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

            <a href="/Cours/add" class="btn btn-info" style="margin-bottom: 10px">Ajouter Cours</a>
            <div>
                emploie de temps


            </div>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                <?php

                // pour chaque afficher tous les jours
                foreach($listeEmploie as $dayname=>$emploie){
                    ?>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                   <?= $dayname; ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">



                                <table class="table table-bordered">
                                    <tr>
                                        <th>HEURE</th>
                                        <th>MATIERE</th>
                                        <th>SALLE</th>
                                        <th>PROFESSEUR</th>
                                        <th colspan="2">ACTION</th>
                                    </tr>


                                <?php
                                    // pour chaque jour maintenant
                                    foreach ($emploie as $heure=>$jour) {
                                        echo  "<tr>";
                                        echo "<td>".$heure."</td>";
                                        echo "<td>".$jour['matiere']." </td>";
                                        echo "<td>".$jour['salle']." </td>";
                                        echo "<td>".$jour['professeur']."</td>";
                                        echo "<td><a href='/Cours/edit/".$jour['idcours']."'>Modifier</a></td>";
                                        echo "<td><a href='/Cours/delete/".$jour['idcours']."'>Supprimer</a></td>";

                                        echo  "</tr>";
                                    }

                                }

                                ?>
                                </table>
                            </div>
                        </div>
                    </div>
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
<script>
    $('.collapse').collapse();
</script>

</body>
</html>
