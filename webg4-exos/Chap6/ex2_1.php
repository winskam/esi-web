<?php

try {
    $pdo = new PDO(
        "mysql:host=localhost;
        dbname=valvesdb;charset=utf8",
        "messi",
        "!remontada",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    echo "La connexion a echoué !";
}

try {
    $sql = "SELECT message.id id, title, msg_date, author.name nom
        FROM message 
        JOIN author on author.id = message.author 
        ORDER BY msg_date DESC";
    $result = $pdo->query($sql);
} catch (PDOException $e) {
    echo "Erreur de manipulation !";
}

$pdo = NULL;

?>

<html>

<head>
    <link rel="stylesheet" href="ex2.css">
</head>

<body>
    <table border="3">
        <tr>
            <th>Date</th>
            <th>Auteur</th>
            <th>Titre</th>
        </tr>
        <?php
        try {
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['msg_date'] . "</td>";
                echo "<td>" . $row['nom'] . "</td>";
                echo "<td>" . "<a href='ex2_2.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></td>";
                echo "</tr>";
            }
        } catch (PDOException $e) {
            echo "Erreur de manipulation !";
        }
        ?>
    </table>
</body>

</html>
