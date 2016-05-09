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
                <h3>liste des filieres </h3>


                <!-- Le formaulaire pour choisir la filiere -->
                <div class="form-group">
                    <form action="/Classes" method="post">
                        <label for="">CHOISIR VOTRE FILIERE</label>

                        <select name="idfiliere" id="" ca>
                        <?php
                            foreach($listeFilieres as $filiere){
                                ?>
                                <option value="<?= $filiere['idfiliere'] ?>"><?= $filiere['codefiliere'] ?></option>
                            <?php
                            }
                        ?>
                        </select>
                        <input type="submit" value="Afficher" class="btn btn-info   ">
                    </form>
                </div>

            </div>

            <a href="/Classes/add" class="btn btn-info btn-add-classe" style="margin-bottom: 10px">Ajouter une classe</a>
            <div>
                <table class="table table-bordered table-info table-default">
                    <tr>
                        <th>N°</th>
                        <th>CODE CLASSE</th>
                        <th>FILIERE</th>
                        <th colspan="2">ACTION</th>
                    </tr>
                    <?php
                    $i=1;
                    foreach ($listeClasses as $classe) {
                        ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $classe['codeclasse']; ?></td>
                            <td><?= $classe['codefiliere']; ?></td>

                            <td><a href="/Classes/delete/<?= $classe['idclasse']; ?>">supprimer</a></td>
                            <td><a href="/Classes/edit/<?= $classe['idclasse']; ?>" edit="<?= $classe['idclasse']; ?>">modifier</a></td>

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
    <footer class="row" id="p-footer">
        <div class="col-lg-10 col-lg-offset-1 text-center" >
            coded with <b style="font-size: 18px;">♥</b> by IT CLUB TEAM
        </div>
    </footer>
</div>
<script src="../../js/jquery-2.1.4.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/bootstrap-select.js"></script>
<script>
    $(".btn-add-classe").on("click", function (e) {
        e.preventDefault();

        $("#modal-add").modal();
    })

    $("a[edit]").on("click", function (e) {
        e.preventDefault();
        var idclasse=$(this).attr("edit");
        $("#add-classe").attr("action","Classes/edit/"+idclasse);
        $.ajax({
            url:"/Classes/edit/"+idclasse,
            type:"post",
            data:"get=json",
            success: function (data) {
                data=JSON.parse(data);

                $("input[name='codeclasse']").val(data.code)
                $("select[name='idfiliere']").attr("value",data.idfiliere)
                $("#modal-add").modal();

            },
            error: function () {
                alert("error")
            }
        });


       //
    })



</script>






<div class="modal fade" id="modal-add">
    <div class="modal-dialog" role="document">
        <form action="Classes/add" method="post" id="add-classe">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title"><b>AJOUTER CLASSE</b></h4>
                </div>
                <div class="modal-body">

                    <table style="width: 100%;" class="padding ">
                        <tr>
                            <th>CODE CLASSE </th>
                            <td><input type="text" class="form-control datetimepicker" name="codeclasse" required></td>
                        </tr>
                        <tr>
                            <th>FILIERE</th>
                            <td>
                                <select name="idfiliere" class="selectpicker bs-select-hidden" data-live-search="true">
                                    <?php

                                    foreach($listeFilieres as $filiere){

                                        ?>
                                        <option value="<?= $filiere['idfiliere'] ?>"><?= $filiere['codefiliere'] ?></option>
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
</body>
</html>
