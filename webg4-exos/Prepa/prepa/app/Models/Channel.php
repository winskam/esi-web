<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Channel
{

   public $id;
   public $name;
   public $topic;

   public function __construct($id, $name, $topic)
   {
      $this->id = $id;
      $this->name = $name;
      $this->topic = $topic;
   }

   public static function all()
   {
      $allChannels = array();
      $result = DB::select("select * from channels");
      foreach ($result as $channel) {
         array_push($allChannels, new Channel($channel->id, $channel->name, $channel->topic));
      }
      return $allChannels;
   }

   public static function get($id)
   {
      $channel = self::all();
      return $channel[$id];
   }
}
