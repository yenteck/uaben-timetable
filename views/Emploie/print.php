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
<page backcolor="" backtop="0" backleft="10mm" backright="10mm" backbottom='3mm' >
    <page_footer >
        <div class="" style="text-align:center">
            <hr>
            coded with  <img src="images/60993.png" alt="" style="width: 20px;height: 20px;"> by IT CLUB TEAM
        </div>
    </page_footer>



    <table>
        <tr >
            <td style="width:75%" >
                <img src="images/isi.jpg" style="width: 130px"><br>
                <b>UNIVERSITÉ AUBE-NOUVELLE</b>
            </td>
            <td style="width:25%;text-align: left;">
                <h3><?=$codeclasse ?></h3>
                <h4><?=$libclasse ?></h4>
            </td>
        </tr>
    </table><br>

    <div style="text-align: center;">
        <h3> <u><?= strtoupper($libemploie) ?></u>  <!--<u>EMPLOIE DE TEMPS </u> ( 02 AVRIL -  08 AVRIL )--></h3>
    </div><br>
    <table class="timetable" >

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
</page>
