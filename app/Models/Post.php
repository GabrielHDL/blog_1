<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'timestamps'];

    const BORRADOR =1;
    const PUBLICADO =2;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(){
        return $this-> belongsTo(User:: class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

        //Relacion uno a uno polimorfica

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
