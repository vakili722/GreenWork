<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The roles that belong to the user.
     */
    public function groups() {
        return $this->belongsToMany('App\Models\Group', 'group_has_role');
    }
    
    /**
     * The roles that belong to the user.
     */
    public function permissions() {
        return $this->belongsToMany('App\Models\Permission', 'role_has_permission');
    }
    
    /**
     * The roles that belong to the user.
     */
    public function tasks() {
        return $this->belongsToMany('App\Models\Task', 'role_has_task');
    }

}
