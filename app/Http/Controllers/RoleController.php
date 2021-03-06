<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Library\GW;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller {

    public function getIndex(Request $request) {
        $gw = new GW($request);
        $data = [];


        $this->init_data($request, $data);
        return view('pages.role', $data);
    }

    public function postIndex() {
        //
    }

}
