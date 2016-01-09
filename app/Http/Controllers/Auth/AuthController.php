<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Registration & Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
     */

use AuthenticatesAndRegistersUsers,
    ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|max:255|unique:users',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|confirmed|min:6',
                    'contract' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'group_id' => 1,   // Change it to client agent
        ]);
    }

    protected function authenticated($request, User $user) {
        $group = $user->group;
        $home = $group->home;
        $roles = $group->roles;

        // User Data
        $request->session()->put('user_name', $user->name);
        $request->session()->put('group_id', $group->id);
        $request->session()->put('group_alias', $group->alias);
        $request->session()->put('menu_home_id', $group->menu_home_id);
        $request->session()->put('menu_order', $group->menu_order);
        $request->session()->put('home_name', $home->name);

        // Menu Data
        $request->session()->put('static_menu', $group->mstatics);

        // Role
        $request->session()->put('roles', $roles);

        // Permission
        $permisions = collect();
        foreach ($roles as $role) {
            $perms = $role->permissions;
            foreach ($perms as $perm) {
                $permisions->push($perm);
            }
        }
        $permisions = $permisions->unique('id');
        $request->session()->put('permissions', $permisions);

        // Tasks
        $tasks = collect();
        foreach ($roles as $role) {
            $jobs = $role->tasks;
            foreach ($jobs as $job) {
                $tasks->push($job);
            }
        }
        $tasks = $tasks->unique('id');
        $request->session()->put('tasks', $tasks);
    }

}
