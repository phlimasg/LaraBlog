<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Notices extends Model
{
    protected $fillable = [
        'title', 'description', 'image_url', 'categories_id', 'user_create_id', 'user_edit_id',
    ];
    public function userCreate(){
        return $this->hasOne(User::class,'id','user_create_id');
    }
    public function userEdit(){
        return $this->hasOne(User::class,'id','user_edit_id');
    }
    public function categories(){
        return $this->hasOne(Categories::class,'id','categories_id');
    }
}
