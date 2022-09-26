<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Chat
{

    public static function allMessagesChannel($id)
    {
        return DB::table('messages')
            ->select('messages.id', 'added_on', 'content', 'author_id', 'chan_id', 'login', 'displayName')
            ->join('chatusers', 'chatusers.id', '=', 'author_id')
            ->where('chan_id', $id)
            ->orderBy("added_on")
            ->get();
    }

    public static function insertMessages($login, $message, $channel)
    {
        $user = DB::table('chatusers')
            ->select('id')
            ->where('login', $login)
            ->get();

        DB::insert("INSERT INTO messages (content, author_id, chan_id) VALUES (?, ?, ?)", [$message, $user->id, $channel]);
    }

}
