<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = ['id','content','title'];
    public function likes(){
        return $this->morphMany('App\Like','liketable');
    }
    public function comment(){
        return $this->hasMany('App\Models\Comment','id_post','id');
    }
    public function vote(){
        return $this->hasMany('App\Models\Vote','id_post','id');
    }
}
