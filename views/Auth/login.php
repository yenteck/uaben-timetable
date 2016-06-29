<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $page_title ;?></title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
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

                </div>
                <div class="col-xs-12 visible-xs">

                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <!-- the menu -->

    <!-- end the menu -->
    <!-- the section-->


    <div class="row" id="p-section">
        <div class="col-sm-offset-4 col-sm-4">

            <form action="/Auth/login" method="post">


                <fieldset>
                    <div class="text-center">
                        <img src="images/isi.jpg" alt="">
                    </div>
                    <div class="form-group">
                        <label for="">PSEUDO</label>
                        <input type="text" name="pseudo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">MOT DE PASSE</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <input type="submit" value="se connecter" class="btn btn-info">
                </fieldset>

            </form>
            <?php //var_dump(__DIR__) ; ?>
        </div>
    </div>

    <!-- end the section-->
    <footer class="row" >
        <div class="col-lg-10 col-lg-offset-1 text-center" id="p-footer">
            coded with <b style="font-size: 18px;">♥</b> by IT CLUB TEAM
        </div>
    </footer>
</div>

</body>
</html>


