<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Library\GW;

class HomeController extends Controller {

    public function getIndex(Request $request) {
        $gw = new GW($request);
        $data = [];

        $home = $gw->home_name;
        if (method_exists($this, $method = 'get_' . strtolower(trim($home)))) {
            $data['content'] = $this->$method($request, $gw);
        }

        $this->init_data($request, $data);
        return view('home.' . $home, $data);
    }

    public function postIndex(Request $request) {
        $gw = new GW($request);
        $data = [];

        // Process Data

        $this->init_data($request, $data);
        return view('home.' . $home, $data);
    }

}
