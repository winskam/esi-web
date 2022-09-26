<?php

function nomMois($numMois)
    {
        static $nom = [
            "", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
            "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
        ];
        return $nomMois = $nom[$numMois];
    }



    function showCalendar($mois, $année)
    {
        echo "<table id = 'table'>";

        afficherTitre($mois, $année);
        afficherEntete();
        $nbjour = nombreJours($mois, $année);
        $décalage = numéroJour(0, $mois, $année);
        afficherMois($décalage, $nbjour);
        echo "</table>";
    }

    function afficherTitre($mois, $année)
    {
        $nomMois = nomMois($mois);

        echo "<tr><th  colspan= '7'>$nomMois, $année</th></tr>";
    }

    function afficherEntete()
    {
        echo "<tr>
        <td> Lu </td>
        <td> Ma </td>
        <td> Me </td>
        <td> Je </td>
        <td> Ve </td>
        <td> Sa </td>
        <td> Di </td>
        </tr>";
    }

    function estBissextile($année)
    {
        return ((($année % 4) == 0) && (($année % 100 != 0) || ($année % 400 == 0)));
    }

    function afficherMois($décalage, $nombreJours)
    {
        echo "<tr>";
        for ($i = 0; $i < $décalage; $i++) {
            echo "<td></td>";
        }
        for ($jour = 1; $jour <= $nombreJours; $jour++) {
            echo "<td>$jour</td>";
            if (($jour + $décalage) % 7 == 0) {
                echo "</tr><tr>";
            }
        }
        echo "<tr>";
    }

    function nombreJours($mois, $année)
    {
        $nbjour = 31;
        if ($mois == 4 || $mois == 6 || $mois == 9 || $mois == 11) {
            $nbjour = 30;
        } else if ($mois == 2) {
            if (estBissextile($année)) {
                $nbjour = 29;
            } else {
                $nbjour = 28;
            }
        }
        return $nbjour;
    }

    function numéroJour($jour, $mois, $année)
    {
        //Calcul basé sur la congruence de Zeller
        // https://en.wikipedia.org/wiki/Zeller's_congruence

        $annéeCorrigée = $année;
        $m = $mois;
        $q = $jour;

        if ($mois == 1 || $mois == 2) {
            $annéeCorrigée = $année - 1;
            $m = $mois + 12;
        }

        $j = $annéeCorrigée / 100;
        $k = $annéeCorrigée % 100;

        return ($q + (($m + 1) * 13) / 5 + $k + $k / 4 + $j / 4 + 5 * $j + 5) % 7;
    }

    showCalendar(10,2021);


