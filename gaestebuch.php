<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Salvatores Pizza-Express</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap-3.3.7-dist/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav">
                <li><a href="index.html">Startseite</a></li>
                <li><a href="#">Gästebuch</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="preisausschreiben.html">Preisausschreiben</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Service<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Tagesangebot</a></li>
                        <li><a href="#">Vegi-Tagesangebot</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="preisausschreiben.html">Preisausschreiben</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Impressum</a></li>
                    </ul>
                </li>
            </ul>

            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Kundenlogin</button>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <!-- Bildquelle: Wikipedia -->
        <img src="grafik/header_small.png" alt="Salvatores Pizza-Express" class="img-responsive">
        <h1>Gästebuch</h1>
        <p>Bewerten Sie unsere Speisen</p>

    </div>
</div>

<div class="container">

    <?php
    if (isset($_REQUEST['gesendet']))
    {
        require "functions/dbconnect.php";

        $kundenname = htmlspecialchars($_REQUEST['kundenname'], ENT_QUOTES);
        $email = htmlspecialchars($_REQUEST['email'], ENT_QUOTES);
        $note = floor($_REQUEST['note']);
        $bemerkung = htmlspecialchars($_REQUEST['bemerkung'], ENT_QUOTES);   //ENT_QUOTES entfernt einfache Anführungszeichen
        $bemerkung = mysqli_real_escape_string($link, $bemerkung);  //Verhindert MySQL-Injection

        $query = "INSERT INTO gaestebuch SET 
          kundenname='$kundenname',
          email='$email',
          note='$note',
          bemerkung='$bemerkung',
          datum=now()";

        //echo "<hr>SQL_DEBUG: $query<hr>";
        $result = mysqli_query($link, $query);
        if ($result)
        {
            echo "Daten erfolgreich gespeichert!";
        }
        else
        {
            echo "Fehler: " . mysqli_error($link);
        }

    }
    else
    {
        ?>


        <p>
            Wie haben Ihnen unsere Pizza Spezialitäten geschmeckt?

        <form method="post" action="gaestebuch.php">
            <input type="hidden" name="gesendet" value="1">

            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="kundenname" value="" class="form-control">
            </div>

            <div class="form-group">
                <label>E-Mail (Angabe freiwillig):</label>
                <input type="text" name="email" value="" class="form-control">
            </div>

            <div>Ihre Bewertung (Schulnote):<br>
                <input type="radio" name="note" value="1" style="margin-left:20px">1 (sehr gut)</br>
                <input type="radio" name="note" value="2" style="margin-left:20px">2 (gut)</br>
                <input type="radio" name="note" value="3" style="margin-left:20px">3 (befriedigend)</br>
                <input type="radio" name="note" value="4" style="margin-left:20px">4 (ausreichend)</br>
                <input type="radio" name="note" value="5" style="margin-left:20px">5 (mangelhaft)</br>
            </div>

            <div class="form-group">
                <label>Bemerkung:</label>
                <textarea class="form-control" name="bemerkung"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Senden</button>

        </form>
        <?php
    }
    ?>
    </p>

    <hr>


</div> <!-- /container -->

<div class="container">
    <a class="btn btn-success" href="bewertung.php">Zu den Bewertungen</a>
    <footer>
        <p>&copy; 2016 Salvatores Pizza Express, Musterstadt (diese Website ist ein Übungsprojekt für
            Programmier-Workshops, Kurse und Vorlesungen von Simon A. Frank)</p>
        <?php
            require "requestInfo.php";
        ?>
    </footer>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="jquery/jquery-1.12.4.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="bootstrap-3.3.7-dist/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
