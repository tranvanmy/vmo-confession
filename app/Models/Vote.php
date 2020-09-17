<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $table ='votes';
    public function post(){
        $this->belongsTo('App\Models\Post','id_post','id');
    }
}
