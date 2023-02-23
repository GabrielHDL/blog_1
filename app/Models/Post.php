<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    const BORRADOR =1;
    const PUBLICADO =2;

    public function user(){
        return $this-> belongsTo(user:: class);
    }
}
