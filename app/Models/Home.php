<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menu_home';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the comments for the blog post.
     */
    public function groups() {
        return $this->hasMany('App\Models\Group','menu_home_id');
    }

}
