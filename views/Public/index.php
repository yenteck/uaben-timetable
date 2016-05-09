<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $page_title ;?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/public.css">
    <link href='https://fonts.googleapis.com/css?family=Lobster|Open+Sans' rel='stylesheet' type='text/css'>
    <style media="screen">
        table{
            width: 100%;
        }


        table td{
            border:solid 1px;
            padding: 2px;

        }

        .timetable{
            font-size:16px;
            width: 100%;
            text-align: center;
        }


    </style>
</head>
<body>




<header class="page-header" id="p-head" style="margin: 0">
    <div class="container" >
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 effect7" style="margin-top: 10px;">
                <img src="images/isi.jpg" alt="" style="width: 100px" class="img-responsive">
                EMPLOI DE TEMPS DE L'UNIVERSITÉ AUBE NOUVELLE
            </div>
        </div>
    </div>
</header>
<div class="container">
    <!-- the menu -->

    <div class="row" id="p-section">
        <div class="col-sm-offset-1 col-sm-10 col-s-2 effect7">






            <div class="form-classe">
                <form action="https://uaben-timetable.herokuapp.com/public" method="post">

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





            <div>
                <h3><?= $lib['libelleemploie'] ?> <span class="label label-danger"><?= $lib['codeclasse']?></span></h3>
                <hr>
            </div>
            <table class="timetable table table-bordered" >

                <tr >
                    <th style="width: 10%;">JOUR</th>
                    <th style="width: 25%;">HEURES</th>
                    <th style="width: 30%;">MATIERE</th>
                    <th style="width: 20%;">SALLE</th>
                    <th style="width: 15%;">PROFESSEUR</th>
                </tr>

                <?php

                // pour chaque jour on affiche son emploie
                foreach($tabEmploie as $jour=>$te){
                    ?>
                    <tr>
                        <td rowspan="<?= count($te)+1 ?>"><?=dateTostring($jour); ?></td>
                        <?php
                        // affichage ici du details de l'emploie du jour
                        foreach($te as $heure=>$det){
                            echo "<tr>";

                            echo "<td>".$heure."</td>";
                            echo "<td>".$det['matiere']."</td>";
                            echo "<td>".$det['salle']."</td>";
                            echo "<td>".$det['professeur']."</td>";

                            echo "</tr>";
                        }


                        ?>

                    </tr>
                    <?php
                }
                ?>
            </table>
            <hr>
            <?php
                if($lib){
                    ?>
                    <a href="Emploie/print/<?= $lib['idemploie'] ?>"><span class="glyphicon glyphicon-download"></span>TELECHARGER</a>
            <?php
                }
            ?>
        </div>
    </div>

    <!-- end the section-->
    <footer class="row" >
        <div class="col-sm-10 col-sm-offset-1" id="p-footer">
            the footer
        </div>
    </footer>
</div>

<script src="../../js/jquery-2.1.4.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/bootstrap-select.js"></script>

</body>
</html>


