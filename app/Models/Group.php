<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'group';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the comments for the blog post.
     */
    public function users() {
        return $this->hasMany('App\User');
    }

    /**
     * Get the post that owns the comment.
     */
    public function home() {
        return $this->belongsTo('App\Models\Home', 'menu_home_id');
    }

    /**
     * The roles that belong to the user.
     */
    public function mstatics() {
        return $this->belongsToMany('App\Models\MStatic', 'group_has_menu_static', 'group_id', 'menu_static_id')
                        ->withPivot('order','mg_id')
                        ->orderBy('order', 'asc');
    }
    
     /**
     * The roles that belong to the user.
     */
    public function roles() {
        return $this->belongsToMany('App\Models\Role', 'group_has_role');
    }

}
