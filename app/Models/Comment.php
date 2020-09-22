<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['id','body','id_parent'];
    protected $table = 'comments';
    public function likes(){
        
        return $this->morphMany('App\Models\Like','liketable');
    }
    public function post(){
        return $this->belongsTo('App\Models\Post','id_post','id');
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment','id_parent','id');
    }
}
