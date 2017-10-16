<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    public $timestamps = false;

    public function owned_tasks() {
        return $this->hasMany('App\Task');
    }
    //
}
