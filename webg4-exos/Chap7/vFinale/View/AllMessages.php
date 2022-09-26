<?php $title = "Valves-Tous les messages"; ?>
<?php ob_start(); ?>
    <h1>Tous les messages</h1>
    <table class='messages'>
    <tr><th>Date</th><th>Auteur</th><th>Titre</th></tr>
<?php foreach ($allMessages as $row): ?>
    <tr>
        <td><?= $row["msg_date"]?></td>
        <td><?= $row["name"]?></td>
        <td><a href="index.php?action=messageDetail&id=<?= $row["id"] ?>"><?= $row["title"]?></td>
    </tr>
<?php endforeach; ?>
    </table>
<?php $content = ob_get_clean(); ?>
<?php require "Template.php"; ?>
