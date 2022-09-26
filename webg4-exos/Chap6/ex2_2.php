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
    $id = $_REQUEST["id"];
    $sql = "SELECT * FROM message WHERE id=:authorid";
    $result = $pdo->prepare($sql);
    $result->execute(['authorid' => $id]);
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
            <th>ID</th>
            <th>Date</th>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Auteur</th>
        </tr>
        <?php
        try {
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['msg_date'] . "</td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['content'] . "</td>";
                echo "<td>" . $row['author'] . "</td>";
                echo "</tr>";
            }
        } catch (PDOException $e) {
            echo "Erreur de manipulation !";
        }
        ?>
    </table>
</body>

</html>
