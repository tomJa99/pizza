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
        <h1>Extra-Zutaten</h1>
        <p>Hier finden sie alle Extras</p>

    </div>
</div>

<div class="container">

    <p class="lead">
        <?php
        require 'functions/dbconnect.php';

        $query = "SELECT count(*) FROM extrazutaten";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_row($result);
        echo "Anzahl der Zutaten: ".$row[0]."<br>";

        echo "Zutaten (alphabetisch): ";
        $query = "SELECT name FROM extrazutaten ORDER BY name";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($result))
        {
            echo $row['name'] . " ";
        }

        echo "<br>Zutaten (kostenlos): ";
        $query = "SELECT name FROM extrazutaten WHERE preis = 0 ORDER BY name";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($result))
        {
            echo $row['name'] . " ";
        }


        echo "<br><table class = table><th>Name</th><th>Preis(absteigend)</th>";
        $query = "SELECT name,preis FROM extrazutaten ORDER BY preis DESC";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($result))
        {
            echo "<tr><td>".$row['name'] . "</td><td>".number_format($row['preis'], 2, ",", ".")."</td></tr>";
        }
        echo "</table>";

        echo "<br><table class = table><th>Name</th><th>Preis(aufsteigend)</th>";
        $query = "SELECT name,preis FROM extrazutaten ORDER BY preis ASC";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($result))
        {
            echo "<tr><td>".$row['name'] . "</td><td>".number_format($row['preis'], 2, ",", ".")."</td></tr>";
        }
        echo "</table>";
        ?>
    </p>

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
