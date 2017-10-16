<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    public $timestamps = false;

    public function owned_tasks() {
        return $this->hasMany('App\Task', 'creator_user_id');
    }

    public function active_tasks() {
        return $this->belongsToMany('App\Task', 'assigned_users');
    }
    //
}
