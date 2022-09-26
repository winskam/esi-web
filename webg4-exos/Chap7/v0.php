<?php
require_once "Model.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Valves</title>
    <link rel="stylesheet" type="text/css" href="theme.css">
</head>

<body>
    <header>
        <h1>WEB II - Valves</h1>
    </header>
    <main>
        <h1>Tous les messages</h1>
        <?php
        echo "<table class='messages'>";
        echo "<tr><th>Date</th><th>Auteur</th><th>Titre</th></tr>";
        foreach (getAllMessages() as $row) {
            echo "<tr>"
                . "<td>" . $row["msg_date"] . "</td>"
                . "<td>" . $row["name"] . "</td>"
                . "<td>" . $row["title"] . "</a></td>"
                . "</tr>";
        }
        echo "</table>";
        ?>
    </main>
    <footer>WEBG4 - WEBII - MCD</footer>
</body>

</html>