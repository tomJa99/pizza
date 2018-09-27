<?php

declare(strict_types=1);
require "functions/calculators.php";

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
        <h1>Tagesangebot</h1>
        <p>Jeden Tag eine leckere Pizza</p>

    </div>
</div>

<div class="container">

    <?php

    //$pizza[0]['name']="Regina";
    //$pizza[0]['preis']="Regina";

    if ($_GET['veggie'] ?? "nein" == "true")
    {
        $happy = 1;
        $pizza[0] = "Magherita";
        $preis[] = 7.0 * 1.1;

        $pizza[1] = "Magherita";
        $preis[] = 5.50 * 1.1;

        $pizza[2] = "Magherita";
        $preis[] = 6.0 * 1.1;

        $pizza[3] = "Magherita";
        $preis[] = 8.50 * 1.1;

        $pizza[4] = "Magherita";
        $preis[] = 6.50 * 1.1;

        $pizza[5] = "Magherita";
        $preis[] = 6.50 * 1.1;

        $pizza[6] = "Magherita";
        $preis[] = 7.0 * 1.1;
    }
    else
    {
        $happy = 1;
        $pizza[0] = "Regina";
        $preis[] = 7.0;

        $pizza[1] = "Salami";
        $preis[] = 5.50;

        $pizza[2] = "Speziale";
        $preis[] = 6.0;

        $pizza[3] = "Diabolo";
        $preis[] = 8.50;

        $pizza[4] = "Funghi";
        $preis[] = 6.50;

        $pizza[5] = "Dönerpizza";
        $preis[] = 6.50;

        $pizza[6] = "Americanos";
        $preis[] = 7.0;
    }
    $wochentag = array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");
    $tagnr = date("w");
    if (date("H") >= 10 && date("H") < 12)
    {
        echo "<em style='color:red'>Happy Hour -20%</em></br>";
        $happy = 0.8;
    }

    //heutigen Tag ausgeben
    echo "Das Angebot am heutigen <strong>{$wochentag[$tagnr]}</strong> ist ";
    echo "die Pizza <strong>{$pizza[$tagnr]}</strong> zum Preis von " . number_format($happy * $preis[$tagnr], 2, ",", ".") . " Euro!";
    echo "<br><br>";
    echo "<table class='table'>";

    echo "<tr><strong>";
    echo "<td><strong>Wochentag</strong></td>";
    echo "<td><strong>Pizza</strong></td>";
    echo "<td><strong>Preis brutto<br>(inkl. MwSt.)</strong></td>";
    echo "<td><strong>Preis netto Restaurant<br>(zzgl. 19% MwSt.)</strong></td>";
    echo "<td><strong>Preis netto Lieferung<br>(zzgl. 7% MwSt.)</strong></td>";
    echo "<td><strong>Aufschlag Expresslieferung<br>(Wochenende 20%, sonst 10%)</strong></td>";
    echo "</tr>";
    for ($i = 0; $i < 7; $i = $i + 1)
    {
        echo "<tr>";
        echo "<td>$wochentag[$i]</td>";
        echo "<td>$pizza[$i]</td>";
        echo "<td>" . number_format($happy * $preis[$i], 2, ",", ".") . "</td>";
        echo "<td>" . berechneNettoPreis($happy * $preis[$i]) . "</td>";
        echo "<td>" . berechneNettoPreis($happy * $preis[$i], 1.07) . "</td>";
        echo "<td>" . berechneAufpreis() . "</td>";
        echo "</tr>";
    }

    echo "</table";
    ?>

    <p></p>

    <hr>

    <footer>
        <p>&copy; 2016 Salvatores Pizza Express, Musterstadt (diese Website ist ein Übungsprojekt für
            Programmier-Workshops, Kurse und Vorlesungen von Simon A. Frank)</p>
    </footer>
</div> <!-- /container -->


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
