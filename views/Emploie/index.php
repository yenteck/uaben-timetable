<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $page_title ;?></title>
    <?php  include "inc/css.php"?>
    <link rel="stylesheet" href="../../css/bootstrap-select.min.css">
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
                    <li class="active"><a href="/Emploie">Emploi de temps</a></li>
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
                <h3>EMPLOIS DE TEMPS </h3>
            </div>

            <div class="form-group">
                <form action="/Emploie" method="post">
                    <label for="">CHOISIR CLASSE</label>
                    <select name="idclasse" id="idclasse" class="selectpicker bs-select-hidden" data-live-search="true" >
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

            <a href="/Emploie/add" class="btn btn-info btn-add-emploi" style="margin-bottom: 10px">Ajouter Un Emploie</a>
            <hr>
            <div class="list-group">
                <?php
                foreach ($listeEmploie as $emploie) {
                    if($emploie['expired']>0){
                        echo "<li  class='list-group-item'><a href='/Emploie/details/".$emploie['idemploie']."'>".$emploie['libelleemploie']."</a> </li>";
                    }else
                        echo "<li  class='list-group-item'><a href='/Emploie/details/".$emploie['idemploie']."'>".$emploie['libelleemploie']."</a> <a class='label label-primary pull-right' href='/Emploie/edit/".$emploie['idemploie']."'>MODIFIER</a> <a class='label label-danger pull-right' href='/Emploie/delete/".$emploie['idemploie']."'>Supprimer</a> </li>";

                }
                ?>
            </div>

        </div>

    </div>

</div>




    <!-- end the section-->
</div>


<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="../../js/moment.min.js"></script>
<script src="../../js/bootstrap-select.js"></script>
<script src="../../js/bootstrap-datetimepicker.min.js"></script>
<script>
    //appliquer l'ider de la classe
    idclasse.value=<?=$idclasse?>
    //TODO regler la date minimale pour start

    $(".btn-add-emploi").on("click", function (e) {
        e.preventDefault();

        loadGoodDate($("#add-emploie-select").val())

        $("#modal-add").modal();

        //traitement de la date
        $("#add-emploie-select").on("change", function () {
            var idclasse=$(this).val();

            loadGoodDate(idclasse)

        })
    })

    function loadGoodDate(idc){
        $.ajax({
            url:"Emploie/ajax/"+idc,
            data:"get=lastDate",
            type:"post"
        }).done(function (lastdate) {

            $("#td-datetime1").html("<input type='text' name='datedebut' class='form-control datetimepicker bs-select-hidden dt1'>");

            // si lon change de date input
            $("#td-datetime1 .dt1").on("focusout", function () {
                var datefin2=$(this).val();
                $("#td-datetime2").html("<input type='text' name='datefin' class='form-control datetimepicker bs-select-hidden dt2'>");
                $('.dt2').datetimepicker({
                    locale: 'fr',
                    format:'YYYY-MM-DD',
                    minDate:datefin2+1
                });
            })

           // $("#td-datetime1").append(dt1);
            if(!lastdate){
                lastdate=new Date()
            }else lastdate=parseDate(lastdate)
            $('.datetimepicker').datetimepicker({
                locale: 'fr',
                format:'YYYY-MM-DD',
                minDate:lastdate
            });
        })
    }

    function parseDate(dat){

        var st="";
        var reg=/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/;

        var newdat=dat.replace(reg,"$1 $2 $3")

        return newdat;
    }

</script>













<!-- my modal -->
<!-- my modal -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog" role="document">
        <form action="Emploie/add" method="post" id="add-emploie">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title"><b>AJOUTER EMPLOI DE TEMPS</b></h4>
                </div>
                <div class="modal-body">

                    <table style="width: 100%;" class="padding ">
                        <tr>
                            <th>SEMAINE DU </th>
                            <td id="td-datetime1"><input type="text" class="form-control datetimepicker" name="datedebut" required></td>
                            <th> AU</th>
                            <td id="td-datetime2"><input type="text" class="form-control datetimepicker" name="datefin" required></td>
                        </tr>
                        <tr>
                            <th>CLASSE</th>
                            <td>
                                <select name="idclasse" class="selectpicker bs-select-hidden" data-live-search="true" id="add-emploie-select">
                                    <?php

                                    foreach($listeClasses as $classes){

                                        ?>
                                        <option value="<?= $classes['idclasse'] ?>"><?= $classes['codeclasse'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr class="table-espace"></tr>
                    </table>
                    <div class="alert-info alert" style="display: none;" id="alert-modal">
                        rdtgf
                    </div>
                </div>


                <div class="modal-footer">
                    <table style="width:100%;">
                        <tr>
                            <td  colspan=""><input type="submit" value="AJOUTER" class="btn btn-block btn-primary"></td>
                        </tr>
                    </table>
                </div>
        </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>

</body>
</html>
