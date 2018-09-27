<?php
$link = mysqli_connect("localhost", "root", "", "pizza")
or die("DB Verbindung geht nicht: " . mysqli_error($link));
mysqli_set_charset($link, "utf8");