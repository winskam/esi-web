<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Chat;

class ApiController extends Controller
{
    function channels($id = null)
    {
        if ($id == null) {
            $result = Channel::all();
        } else {
            $result = Channel::get($id);
        }
        return response()->json($result); // ou,→ json_encode($result)
    }

    function messages($id) {
        return $result = Chat::allMessagesChannel($id);
    }

    function insert($channel, $request) {
        Chat::insertMessages($request["login"], $request, $channel);
    }
}
