<?php

$fahrzeug1 = new Fahrzeug();
$fahrzeug2 = new Fahrzeug(100);

$fahrzeug1->beschleunigen();
$fahrzeug1->starteMotor();
$fahrzeug1->beschleunigen();
$fahrzeug1->beschleunigen();
$fahrzeug1->beschleunigen();
$fahrzeug1->setMaxGeschwindigkeit(10);
$fahrzeug1->bremsen();
$fahrzeug1->bremsen(25);
$fahrzeug1->bremsen(30);

$fahrzeug2->beschleunigen();
$fahrzeug2->starteMotor();
$fahrzeug2->bremsen(5);

class Fahrzeug
{
    protected $motorAn;
    private $geschwindigkeit;
    private $maxGeschwindigkeit;

    public function __construct($maxV = 140)
    {
        $this->geschwindigkeit = 0;
        $this->motorAn = false;
        $this->setMaxGeschwindigkeit($maxV);
    }

    public function starteMotor()
    {
        $this->motorAn = true;
        echo "Der Motor ist gestartet<br>";
    }

    public function getMotorAn()
    {
        return $this->motorAn;
    }

    public function setMotorAn($motorAn)
    {
        $this->motorAn = $motorAn;
    }

    public function getGeschwindigkeit(): int
    {
        return $this->geschwindigkeit;
    }

    public function setGeschwindigkeit(int $geschwindigkeit)
    {
        $this->geschwindigkeit = $geschwindigkeit;
    }

    public function getMaxGeschwindigkeit(): int
    {
        return $this->maxGeschwindigkeit;
    }

    public function setMaxGeschwindigkeit(int $maxGeschwindigkeit)
    {
        if ($maxGeschwindigkeit < 0 || $maxGeschwindigkeit < $this->geschwindigkeit)
        {
            echo "<strong>Das geht nicht du Spast</strong><br>";
        }
        else
        {
            $this->maxGeschwindigkeit = $maxGeschwindigkeit;
        }
    }

    public function beschleunigen()
    {
        if ($this->motorAn == true)
        {
            $this->geschwindigkeit += 20;
            echo "Das Fahrzeug fährt nun $this->geschwindigkeit km/h<br>";
        }
        else
        {
            echo "Beschleunigen nicht möglich. Der Motor ist noch nicht gestartet!<br>";
        }
    }

    public function bremsen($differenz = 10)
    {
        $this->geschwindigkeit -= $differenz;
        if ($this->geschwindigkeit < 0)
        {
            $this->geschwindigkeit = 0;
            $this->motorAn = false;
        }
        echo "Das Fahrzeug wird gebremst und fährt nun $this->geschwindigkeit km/h<br>";
    }

}

class Segelboot extends Fahrzeug
{
    public $maxTiefgang = 30;

    public function __construct($vmax=40,int $maxTiefgang = 30)
    {
        parent::__construct($vmax);
        $this->maxTiefgang=$maxTiefgang;
        $this->motorAn = true;
    }

    public function getMaxTiefgang(): int
    {
        return $this->maxTiefgang;
    }

    public function setMaxTiefgang(int $maxTiefgang)
    {
        $this->maxTiefgang = $maxTiefgang;
    }

    public function starteMotor()
    {
        echo "Bei Segelbooten nicht möglich!<br>";
    }
}

$segelboot = new Segelboot(40,22);
$segelboot->starteMotor();
$segelboot->beschleunigen();
echo $segelboot->getMaxGeschwindigkeit()."<br>";
echo $segelboot->maxTiefgang."<br>";