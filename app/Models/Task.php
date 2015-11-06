<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'task';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The roles that belong to the user.
     */
    public function roles() {
        return $this->belongsToMany('App\Models\Role', 'role_has_task');
    }

}
