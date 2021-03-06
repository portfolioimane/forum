<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model{
   public function path()
  {
    return '/forum/public/threads/' . $this->id;
  }
  public function replies(){
  	return $this->hasMany(Reply::class);
  }
  public function creator(){
  	return $this->belongsTo(User::class, 'user_id');
  }
}
