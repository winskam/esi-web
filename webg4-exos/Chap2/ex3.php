<?php
$x = 5;
function dosomething()
{
    static $nbAppel = 0;
    return ++$nbAppel;
}
dosomething();
echo dosomething() . "<br>\n";
echo dosomething() . "<br>\n";
