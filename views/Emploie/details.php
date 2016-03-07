<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $page_title ;?></title>
    <link rel="stylesheet" href="../../css/bootstrap-flatly.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css">
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
                    <li class="active"><a href="/Emploie">Emploie de temps</a></li>
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
                <h3 class="text-uppercase"><u><?= $lib_classe['libelleemploie'].' / '.$lib_classe['codeclasse']; ?></u> </h3>
            </div>

            <div>
                <a href="/Emploie" CLASS="btn btn-danger">RETOUR</a>
                <a class="btn btn-success pull-right" style="margin-bottom: 10px" id="btn-add-cours">Ajouter Un cours</a>
            </div>

            <hr>

            <div id="add-cours-div" class="isHidden">
                <form action="/Cours/add" method="post">


                    <div class="form-group col-lg-3">
                        <label for="">JOUR </label>
                        <select name="jour" class="form-control" >
                        <?php
                            for($i=0;$i<7;$i++){
                                echo "<option value='$i'>".dateTostring($i)."</option>";
                            }
                        ?>
                        </select>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="">DATE DEBUT </label>
                        <input type="text" class="form-control datetimepicker" name="datedebut">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="">DATE FIN </label>
                        <input type="text" class="form-control datetimepicker" name="datefin">
                    </div>

                        <!-- id de l'emploie caché -->
                         <input type="hidden"  name="idemploie" value="<?= $idemploie;?>">


                    <div class="form-group col-lg-3">
                        <label for="">SALLE  </label>
                        <select name="idsalle" class="form-control">
                        <?php
                        foreach ($listeSalles as $salle) {
                            echo "<option value='".$salle['idsalle']."'>".$salle['codesalle']."</option>";
                        }
                        ?>
                        </select>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="">MATIERE  </label>
                        <select name="idmatiere" class="form-control">
                            <?php
                            foreach ($listeMatieres as $matiere) {
                                echo "<option value='".$matiere['idmatiere']."'>".$matiere['codematiere']."</option>";
                            }
                            ?>
                        </select>
                    </div>


                    <div class="form-group col-lg-3">
                        <label for="">PROFFESSEUR  </label>
                        <select name="idprofesseur" class="form-control">
                            <?php
                            foreach ($listeProfesseurs as $professeur) {
                                echo "<option value='".$professeur['idprofesseur']."'>".$professeur['nomcourt']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <input type="submit" class="btn btn-primary pull-right" value="ENREGISTRER">
                </form>
            </div>

        </div>

        <div class="col-sm-offset-1 col-sm-10">


            <fieldset >
                <legend style="border-top: 5px solid #060606;">Programme</legend>


                <?php

                // pour chaque jour on affiche son emploie
                foreach($tabEmploie as $jour=>$te){
                    ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><?=dateTostring($jour); ?></div>
                    <div class="panel-body">

                        <table class="table table-danger">

                            <?php
                            // affichage ici du details de l'emploie du jour
                            foreach($te as $heure=>$det){
                                echo "<tr>";
                                echo "<td>".$heure."</td>";
                                echo "<td>".$det['matiere']."</td>";
                                echo "<td>".$det['salle']."</td>";
                                echo "<td>".$det['professeur']."</td>";
                                echo "<td> <a href='/Cours/delete/".$det['idcours']."'>supprimer</a></td>";
                                echo "</tr>";
                            }
                            ?>

                        </table>
                    </div>
                </div>
                <?php
                }
                ?>
            </fieldset>
        </div>

    </div>




<!-- end the section-->

</div>


<script src="../../js/jquery-2.1.4.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/moment.min.js"></script>
<script src="../../js/bootstrap-datetimepicker.min.js"></script>
<script>
    $(function () {


        // date picker
        $('.datetimepicker').datetimepicker({
            locale: 'en',
            format:'HH:mm'
        });


        var x=true;
        $('#btn-add-cours').on('click',function(e){
            console.log(x);
            e.preventDefault();
           $('#add-cours-div').slideToggle();

            // pour changer la couleur du button
            if(x){
                $('#btn-add-cours').removeClass('btn-primary');
                $('#btn-add-cours').addClass('btn-danger');
                $('#btn-add-cours').html('Annuler');
                x=false;
            }else{
                $('#btn-add-cours').removeClass('btn-danger');
                $('#btn-add-cours').addClass('btn-primary');
                $('#btn-add-cours').html('Ajouter un cours');
                x=true;
            }

        })
    })
</script>

</body>
</html>
