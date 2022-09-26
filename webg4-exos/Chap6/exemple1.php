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

?>

<form action="exemple1.php">
    <select name="author_id">
        <option value="1">MCD</option>
        <option value="2">NRI</option>
    </select>
    <button> Submit </button>
</form>

<?php
try {
$id = $_REQUEST["author_id"];
$sql = "SELECT * FROM message WHERE author=:authorid";

$result = $pdo->prepare($sql);
$result->execute(['authorid' => $id]);

foreach ($result as $row) {
    echo $row['title'] . "<br>";
}
} catch (PDOException $e) {
    echo "Erreur de manipulation !";
}

$pdo = NULL;
