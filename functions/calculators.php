<?php
function berechneAufpreis()
{
    global $preis;
    static $i = 0;
    $ergebnis = $preis[$i] * 0.1;

    if ($i == 0 || ($i == 6))
    {
        $ergbenis = $preis[$i] * 0.2;
    }
    $i++;
    return $ergebnis;
}

function berechneNettoPreis(float $bruttoPreisInEuro, float $happy = 1, float $mwst = 1.19): String
{
    $ergebnis = $bruttoPreisInEuro * $happy / $mwst;
    $ergebnis = number_format($ergebnis, 2, ",", ".");
    return $ergebnis;
}
