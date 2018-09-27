<!DOCTYPE html>
<html>
<head>
    <title>Hallo PHP!</title>
</head>
<body>
    <h1>Hallo Welt!<h1>
    <?php
        echo "Es ist nun ";
        echo date("H:i:s");
        echo " Uhr!";
        echo "</br>";

        $farbe="rot";
        echo "Mein Auto ist $farbe und schnell</br>";
        echo 'Mein Auto ist $farbe und schnell</br>';
        echo "Ich habe ein $farbes Auto. </br>";
        echo "Ich habe ein " . $farbe . "es Auto. </br>";
        echo "Ich habe ein {$farbe}es Auto. </br>";
        echo "Ich habe ein <b><em style='color:red'>{$farbe}es</em></b> Auto. </br>";
    ?>
    <div>Das wars!</div>
</body>
</html>