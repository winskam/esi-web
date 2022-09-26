<?php

class Point
{
    private $x;
    private $y;

    public function __construct($ax = 0, $ay = 0) //avec valeurs par defaut
    {
        $this->x = $ax;
        $this->y = $ay;
    }
    
    public function __toString()
    {
        return "($this->x,$this->y)";
    }

    public function getX()
    {
        return $this->x;
    }
    public function getY()
    {
        return $this->y;
    }

    public function distance(Point $p2) {
        return sqrt(pow($p2->getX() - $this->getX(), 2) + pow($p2->getY() - $this->getY(),2));
    }

    public function milieu(Point $p2) {
        return new Point(($p2->getX() + $this->getX())/2,($p2->getY() + $this->getY())/2);
    }

}

echo new Point();
echo "<br>";
echo new Point(2, 5);
echo "<br>";
$p1 = new Point(6, 9);
echo $p1->distance(new Point(12, 17));
echo "<br>";
echo $p1->milieu(new Point(12, 17));
