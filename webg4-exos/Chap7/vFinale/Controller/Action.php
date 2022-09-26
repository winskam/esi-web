<?php
require 'Model/Message.php';

function allMessages() {
    // Pas de paramètre supplémentaire ici
    $message = new Message();
    $allMessages = $message->getAllMessages();
    require "View/AllMessages.php";
}

function messageDetail() {
    // Pas de paramètre supplémentaire ici
    $message = new Message();
    $messageDetail = $message->getMessageDetail();
    require "View/MessageDetail.php";
}