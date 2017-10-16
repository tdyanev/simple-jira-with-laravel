<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    public function owner() {
        return $this->belongsTo('App\User', 'creator_user_id');
    }

    public function parent_task() {
        return $this->belongsTo('App\Task', 'parent_task_id');
    }
    //
}
