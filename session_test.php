<?php
session_start();

if (isset($_SESSION['zaehler']))#
{
    $z = $_SESSION['zaehler'];
}
else
{
    $z = 0;
}
$z++;

echo "Das ist Dein $z. Aufruf dieser Seite!";
echo "<p><a href='session_test.php'>neu laden</a></p>";
$_SESSION['zaehler'] = $z;