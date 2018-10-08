<?php

if (isset($_SESSION['startzeit']))
{
    $startzeit=$_SESSION['startzeit'];
}
else
{
    $startzeit=time();
    $_SESSION['startzeit']=$startzeit;
}
if (isset($_SESSION['zaehler']))
{
    $zaehler=$_SESSION['zaehler'];
}
else
{
    $zaehler=0;
}

$zaehler++; //$_SESSION['zaehler']++;
$dauer=time()-$startzeit;

echo "<p>Sie sind seit $dauer Sekunden auf unsere Website und haben    
            $zaehler Seiten aufgerufen</p>";

if (isset($_SESSION['navi']))
{
    $navi = $_SESSION['navi'];
}

if(@$navi[count($navi) - 1] != $_SERVER['SCRIPT_NAME'])
{
    $navi[]=$_SERVER['SCRIPT_NAME'];
}
echo "<p>Die letzte besuchte Seite: ";
foreach ($navi as $value)
{
    echo "<a href='".$value."'>".$value."</a> ";
}
echo "</p>";

$_SESSION['navi'] = $navi;
$_SESSION['zaehler']=$zaehler;
