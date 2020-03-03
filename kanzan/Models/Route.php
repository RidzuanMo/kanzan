<?php

namespace Kanzan\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model{
   protected $table = 'routes';
   protected $guarded = ['id', 'created_at', 'updated_at'];
   
}