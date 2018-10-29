<?php
declare(strict_types=1);
require 'PhpClasses/Pizza.php';
session_start();
if (@$_GET['vegetarisch'] == "ja")
{
    setcookie("veggie", "1", time() + 60 * 60 * 24 * 30);
}
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

<?php
    require 'functions/cookiezustimmung.php';
?>

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
                <li><a href="gaestebuch.php">Gästebuch</a></li>
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

        <?php
        if (!isset($_GET['vegetarisch']) && @$_COOKIE['veggie'] == 1)
        {
            echo "<p style='color:green'>WIR HABEN AUCH VEGGIE-ANGEBOTE</p>";
        }
        ?>

    </div>
</div>

<div class="container">

    <?php
    $happy = 1;
    $p[] = new Pizza ("Salami", 5.5, false, "Funghi");
    $p[] = new Pizza ("Salami", 5.5, false, "Funghi");
    $p[] = new Pizza ("Salami", 5.5, false, "Funghi");
    $p[] = new Pizza ("Salami", 5.5, false, "Funghi");
    $p[] = new Pizza ("Salami", 5.5, false, "Funghi");
    $p[] = new Pizza ("Funghi", 6.0);
    $p[] = new Pizza ("Magherita", 6.5);

    $wochentag = array("Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag");
    $tagnr = date("w");
    if (date("H") >= 10 && date("H") < 12)
    {
        echo "<em style='color:red'>Happy Hour -20%</em></br>";
        $happy = 0.8;
    }

    //heutigen Tag ausgeben
    echo "Das Angebot am heutigen <strong>{$wochentag[$tagnr]}</strong> ist ";
    echo "die Pizza <strong>{$p[$tagnr]->getName()}</strong> zum Preis von " . number_format($happy * $p[$tagnr]->getPreis(), 2, ",", ".") . " Euro!";
    echo "<br><br>";
    echo "<table class='table'>";

    echo "<tr><strong>";
    echo "<td><strong>Wochentag</strong></td>";
    echo "<td><strong>Pizza</strong></td>";
    echo "<td><strong>Preis brutto<br>(inkl. MwSt.)</strong></td>";
    echo "<td><strong>Preis netto Restaurant<br>(zzgl. 19% MwSt.)</strong></td>";
    echo "<td><strong>Mwst. Abzug</strong></td>";
    echo "</tr>";
    $i = 0;
    foreach ($p as $item)
    {
        if ($_GET['vegetarisch'] ?? "ja" == "true")
        {
            if ($item->getVegetarisch() == false)
            {
                $i++;
                continue;
            }
        }
        echo "<tr>";
        echo "<td>$wochentag[$i]</td>";
        echo "<td>".$item->getName()."</td>";
        echo "<td>" . number_format($happy * $item->getPreis(), 2, ",", ".") . "</td>";
        echo "<td>" . $item->getNettoPreis($happy) . "</td>";
        echo "<td>" . $item->getMwst() . "</td>";
        echo "</tr>";
        $i++;
    }

    echo "</table";
    ?>

    <p></p>

    <hr>

    <footer>
        <p>&copy; 2016 Salvatores Pizza Express, Musterstadt (diese Website ist ein Übungsprojekt für
            Programmier-Workshops, Kurse und Vorlesungen von Simon A. Frank)</p>
        <?php
        require "requestInfo.php";
        ?>
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
