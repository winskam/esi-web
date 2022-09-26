<?php

require_once "ex9.php";

class Cercle
{
    private $rayon;
    private $point;
    

    public function __construct(Point $point, int $rayon = 1)
    {
        $this->point = $point;
        $this->rayon = $rayon;
    }

    public function getPoint()
    {
        return $this->point;
    }
    public function getRayon()
    {
        return $this->rayon;
    }

    public function __toString()
    {
        return "(point = $this->point, rayon = $this->rayon)";
    }

    public function superficie() {
        return pi() * pow($this->rayon, 2);
    }

}

echo "<br>";
echo new Cercle(new Point());
$c1 = new Cercle(new Point(), 3);
echo "<br>";
echo $c1;
echo "<br>";
echo $c1->superficie();

