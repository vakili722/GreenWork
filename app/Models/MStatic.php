<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MStatic extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menu_static';

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
        return $this->belongsToMany('App\Models\Group', 'group_has_menu_static', 'menu_static_id', 'group_id')
                        ->withPivot('order')
                        ->orderBy('order', 'asc');
    }

}
