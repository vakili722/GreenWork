<?php

namespace App\Http\Library;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class GW {

    public $roles;
    public $tasks;
    public $group_id;
    public $user_name;
    public $home_name;
    public $permisions;
    public $group_alias;
    public $menu_home_id;
    public $sub_system_id;

    public function __construct(Request $request) {
        $session = $request->session();
        $this->roles = $session->get('roles');
        $this->tasks = $session->get('tasks');
        $this->group_id = $session->get('group_id');
        $this->user_name = $session->get('user_name');
        $this->home_name = $session->get('home_name');
        $this->permisions = $session->get('permissions');
        $this->group_alias = $session->get('group_alias');
        $this->menu_home_id = $session->get('menu_home_id');
        $this->sub_system_id = $session->get('sub_system_id');
    }
    
    

}
