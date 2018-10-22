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
        <h1>Online Shop</h1>
        <p>Bestellen Sie Ihre Lieblingspizza online</p>

    </div>
</div>

<div class="container">
    <strong><p>Unsere Pizzaspezialitäten</p></strong>
    <form action="bestellung_pruefen.php" method="post">
        <?php

        $query = "SELECT id,name,beschreibung,preis,vegetarisch FROM pizza";
        echo "<p><a class='btn btn-success' href='?filter=vegetarisch'>Nur vegetarische</a>";
        if (isset($_REQUEST['filter']) && $_REQUEST['filter'] == "vegetarisch")
        {
            $query .= " WHERE vegetarisch=1";
        }
        if (isset($_REQUEST['sort']) && $_REQUEST['sort'] == "name")
        {
            $query .= " ORDER BY name ASC";
        }

        if (isset($_REQUEST['sort']) && $_REQUEST['sort'] == "preis")
        {
            $query .= " ORDER BY preis ASC";
        }
        require 'functions/dbconnect.php';

        echo "<br><table class = table><th>Auswahl</th><th><a href='?sort=name'>Name</a></th><th>Zutaten</th><th><a href='?sort=preis'>Preis</a></th><th>vegetarisch</th>";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($result))
        {
            $beschreibung = "";
            $vegetarisch = "nein";
            if ($row['vegetarisch'] == 1)
            {
                $vegetarisch = "ja";
            }
            $word = str_word_count($row['beschreibung'], 1, ',äüö');
            for ($i = 0; $i < 5; $i++)
            {
                $beschreibung = $beschreibung . " " . $word[$i];
            }

            //echo "<tr><td>" . strtoupper($row['name']) . "</td><td>" . substr($row['beschreibung'] , 0,50)."...</td><td>".number_format($row['preis'], 2, ",", ".") . "</td></tr>";
            echo "<tr><td><select name='option".$row['id']."'>";
            for ($i = 0; $i <= 10; $i++)
            {
                echo "<option value='".$i."'>".$i."</option>";
            }
            echo "</select></td>";
            echo "<td><a href='details.php?pizza=" . strtoupper($row['name']) . "'>" . strtoupper($row['name']) . "</a></td><td>" . $beschreibung . "...</td><td>" . number_format($row['preis'], 2, ",", ".") . "</td><td> " . $vegetarisch . "</td></tr>";
        }
        echo "</table>";
        ?>
        <label>Liefer- und Rechnungsadresse</label><br>
        <!-- Vorname -->
        <div class="form-group">
            <input class="form-control" type="text" name="vorname" value="" placeholder="Vorname"/>
        </div>

        <!-- Nachname -->
        <div class="form-group">
            <input class="form-control" type="text" name="nachname" value="" placeholder="Nachname"/>
        </div>

        <!-- Straße -->
        <div class="form-group">
            <input class="form-control" type="text" name="str" value="" placeholder="Straße"/>
        </div>

        <!-- PLZ -->
        <div class="form-group">
            <input class="form-control" type="text" name="plz" value="" placeholder="PLZ"/>
        </div>

        <!-- Ort -->
        <div class="form-group">
            <input class="form-control" type="text" name="ort" value="" placeholder="Ort"/>
        </div>

        <!-- E-Mail -->
        <div class="form-group">
            <input class="form-control" type="text" name="mail" value="" placeholder="E-Mail"/>
        </div>
        <button type="submit">weiter</button>
    </form>

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
