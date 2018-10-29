<?php

class Pizza
{
    private $name;
    private $preis;
    private $vegetarisch;
    private $alternativ;

    public function __construct(String $name, float $preis, bool $vegetarisch = true, string $alternativ = "Magherita")
    {
        $this->setName($name);
        $this->setPreis($preis);
        $this->setVegetarisch($vegetarisch);
        $this->setAlternativ($alternativ);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getPreis(): float
    {
        return $this->preis;
    }

    public function setPreis(float $preis)
    {
        $this->preis = $preis;
    }

    public function getVegetarisch(): bool
    {
        return $this->vegetarisch;
    }

    public function setVegetarisch(bool $vegetarisch)
    {
        $this->vegetarisch = $vegetarisch;
    }

    public function getAlternativ(): string
    {
        return $this->alternativ;
    }

    public function setAlternativ(string $alternativ)
    {
        if ($this->vegetarisch == true)
        {
            $this->alternativ = "";
        }
        else
        {
            $this->alternativ = $alternativ;
        }

    }
    public function getNettoPreis(float $happy = 1, float $mwst = 1.19)
    {
        $ergebnis = $this->preis * $happy / $mwst;
        //$ergebnis = number_format($ergebnis, 2, ",", ".");
        return $ergebnis;
    }

    public function getMwst() : string
    {
        return number_format(($this->preis - $this->getNettoPreis()),2,",",".");
    }
}