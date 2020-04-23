<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    protected $table = 'image';


    protected $fillable = ['title','image'];
}
