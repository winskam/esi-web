<?php $title = "Valves-Détail message."; ?>
<?php ob_start(); ?>
    <h1>Détail message</h1>
    <table class='messages'>
    <tr><th>Date</th><th>Titre</th><th>Contenu</th></tr>
<?php foreach ($messageDetail as $row): ?>
    <tr>
        <td><?= $row["msg_date"]?></td>
        <td><?= $row["title"]?></td>
        <td><?= $row["content"]?></td>
    </tr>
<?php endforeach; ?>
    </table>
<?php $content = ob_get_clean(); ?>
<?php require "Template.php"; ?>
