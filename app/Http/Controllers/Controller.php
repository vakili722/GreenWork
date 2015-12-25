<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// Custom Added
use Illuminate\Http\Request;
use App\Http\Library\Menu;
use App\Http\Library\GW;

abstract class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    protected function init_data(Request $request, & $data) {
        $data['session'] = $request->session();
        $data['path'] = $request->path();
        $data['menu'] = Menu::builder($request->session()->get('static_menu'), $request->path());
    }

}
