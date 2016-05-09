<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $page_title ;?></title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css">
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
                <a href="/Emploie/print/<?=$idemploie?>" class="btn btn-info"><span class="glyphicon glyphicon-print"> </span> IMPRIMER</a>
                <?php
                if($lib_classe['expired']==0){
                    ?>
                    <a class="btn btn-success pull-right" style="margin-bottom: 10px" id="btn-add-cours">Ajouter Un cours</a>
                    <?php
                }
                ?>

            </div>

            <hr>

            <div id="add-cours-div" class="isHidden">
                <form action="/Cours/add" method="post" id="add-cours">


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
                        <input type="text" class="form-control datetimepicker" name="datedebut" required>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="">DATE FIN </label>
                        <input type="text" class="form-control datetimepicker" name="datefin" required>
                    </div>

                        <!-- id de l'emploie caché -->
                         <input type="hidden"  name="idemploie" value="<?= $idemploie;?>">


                    <div class="form-group col-lg-3">
                        <label for="">SALLE  </label>
                        <select name="idsalle" class="selectpicker bs-select-hidden" data-live-search="true">
                        <?php
                        foreach ($listeSalles as $salle) {
                            echo "<option value='".$salle['idsalle']."'>".$salle['codesalle'].$salle['lieu']."</option>";
                        }
                        ?>
                        </select>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="">MATIERE  </label>
                        <select name="idmatiere" class="selectpicker bs-select-hidden" data-live-search="true">
                            <?php
                            foreach ($listeMatieres as $matiere) {
                                echo "<option value='".$matiere['idmatiere']."'>".$matiere['codematiere']."</option>";
                            }
                            ?>
                        </select>
                    </div>


                    <div class="form-group col-lg-3">
                        <label for="">PROFFESSEUR  </label>
                        <select name="idprofesseur"  class="selectpicker bs-select-hidden" data-live-search="true">
                            <?php
                            foreach ($listeProfesseurs as $professeur) {
                                echo "<option value='".$professeur['idprofesseur']."'>".$professeur['nomcourt']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="">DEVOIR (cocher si devoir) </label>
                        <input type="checkbox" name="devoir" class="form-control" value="dev">
                    </div>

                    <input type="submit" class="btn btn-primary pull-right" value="ENREGISTRER">
                </form>
            </div>

        </div>

        <div class="col-sm-offset-1 col-sm-10">


            <fieldset id="testpanel">
                <legend style="border-top: 5px solid #060606;">Programme</legend>


                <?php
                /*
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
                                echo "<td> <a href='/Cours/delete/".$det['idcours']."' supprimer=".$det['idcours'].">supprimer</a><span class='loader'></span></td>";
                                echo "</tr>";
                            }
                            ?>

                        </table>
                    </div>
                </div>
                <?php
                }
                */
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
<script src="../../js/bootstrap-select.js"></script>
<script>
    $(function () {


        // date picker
        $('.datetimepicker').datetimepicker({
            locale: 'en',
            format:'HH:mm'
        });

        displayData();

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

        // enregistrer un cours
        $("#add-cours").on("submit", function (e) {
                e.preventDefault();
                var send=$(this).serialize();

                var dbebut =$("input[name='datedebut']").val();
                var dfin =$("input[name='datefin']").val();
                var date1=new Date("December 31, 2015 "+dbebut);
                var date2=new Date("December 31, 2015 "+dfin);
                if(date2<=date1){
                    alert("verifier votre heure de debut et heure de fin ");
                    $("input[name='datedebut']").css("borderColor","red");
                    $("input[name='datefin']").css("borderColor","red");
                    throw  new Error("ilpoo")
                }else{
                    $("input[name='datedebut']").css("borderColor","#ddd");
                    $("input[name='datefin']").css("borderColor","#ddd");
                }

                $.ajax({
                    type:"post",
                    url:"/Cours/add",
                    data:send,
                    beforeSend: function () {
                        loader(true);
                    },
                    success: function (resp) {
                        alert(resp);
                        loader(false);
                        displayData();
                    },
                    error: function () {
                        alert("FAIL ");
                        loader(false);
                    }
                })
        })

        bindDelete();
        //delete




    })
    function bindDelete(){
        $("[supprimer]").on("click", function (e) {
            e.preventDefault();

            var idcours=$(this).attr("supprimer");
            var paren=$(this).parent().parent();
            if(confirm("Supprimer ?"))
                $.ajax({
                    type:"get",
                    url:"/Cours/delete/"+idcours,
                    beforeSend: function () {
                        loader(true);
                    },
                    success:function(data){
                        alert(data);
                        loader(false);
                        paren.hide();
                    },
                    error: function() {
                        alert("error");
                        loader(false);
                    }
                })
        })
    }

    function loader(x){
        if(x==false) $("#loader").hide("slow");
        else $("#loader").show("slow");
    }



    function  displayData(){

        $.ajax({
            type:"post",
            data:"ajax_query=true",
            beforeSend: function () {
                loader(true);
            },
            url:"/Emploie/details/"+<?=$idemploie?>,
            success: function (data) {
                var data_json=JSON.parse(data);
                if(data_json){
                    //affichage
                    $("#testpanel").html('<legend style="border-top: 5px solid #060606;">Programme</legend>');
                    $.each(data_json , function (key,value) {

                        var panel= $('<div class="panel panel-default"></div>');
                        var panel_head=$('<div class="panel-heading">'+dateTostring(key)+'</div>');
                        var panel_b=$('<div class="panel-body"></div>');

                        var p_b_table=$('<table class="table"></table>');

                        $.each(value, function (heure,det) {
                            var tr=$('<tr></tr>');
                            tr.append("<td>"+heure+"</td>");
                            tr.append("<td>"+det.matiere+"</td>");
                            tr.append("<td>"+det.salle+"</td>");
                            tr.append("<td>"+det.professeur+"</td>");
                            if(det.expired==0)
                            tr.append("<td><a href='/Cours/delete/"+det.idcours+"' supprimer='"+det.idcours+"'>Supprimer</a></td>");

                            p_b_table.append(tr);
                        })

                        panel_b.append(p_b_table);

                        panel.append(panel_head);
                        panel.append(panel_b);

                        $("#testpanel").append(panel);
                    })
                    bindDelete();
                }
                loader(false);
            },
            error: function () {
                loader(false);
                alert("error");
            }

        })
    }

    function dateTostring(i){

        var tab=['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];

        return tab[i];
    }
</script>


<div id="loader">
    <div class="loader-content">
        <img src="../../images/ajax_loader.gif" alt=""><br>
        <b>chargement ...</b>
    </div>
</div>
</body>
</html>
