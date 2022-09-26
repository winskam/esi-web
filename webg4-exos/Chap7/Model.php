<?php
function getAllMessages()
{
    $db = new PDO(
        "mysql:host=localhost;dbname=valvesdb; charset=utf8", "messi", "!remontada", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $sql = "SELECT Message.msg_date, Author.name, Message.title"
        . " FROM Message JOIN Author"
        . " WHERE Message.author = Author.id"
        . " ORDER BY msg_date DESC";
    $result = $db->query($sql);
}
