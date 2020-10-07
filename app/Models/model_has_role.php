<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_has_role extends Model
{
    use HasFactory;
    protected $table = 'model_has_roles';
    protected $fillable = ['role_id','model_type','model_id'];

    const updated_at = null;
    const created_at = null;
    // public function commentable(){
    //     return $this->morphTo();
    // }
}
