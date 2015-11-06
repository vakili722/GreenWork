<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StaticController;
use App\Http\Library\GW;

class PageController extends Controller {

    public function getIndexStatic(Request $request, $name) {
        $gw = new GW($request);
        $data = [];

        if (method_exists(StaticController::class, $method = 'get_' . strtolower(trim($name)))) {
            $data['content'] = StaticController::$method($request, $gw);
        }

        $this->init_data($request, $data);
        return view('pages.' . $name, $data);
    }

    public function getIndexDynamic(Request $request, $name) {
        $gw = new GW($request);
        $data = [];

        if (method_exists(DynamicController::class, $method = 'get_' . strtolower(trim($name)))) {
            $data['content'] = DynamicController::$method($request, $gw);
        }

        $this->init_data($request, $data);
        return view('', $data);
    }

    public function postIndexStatic(Request $request, $name) {
        $gw = new GW($request);
        $data = [];

        if (method_exists(StaticController::class, $method = 'post_' . strtolower(trim($name)))) {
            $data['content'] = StaticController::$method($request, $gw);
        }

        $this->init_data($request, $data);
        return view('pages.' . $name, $data);
    }

    public function postIndexDynamic(Request $request, $name) {
        $gw = new GW($request);
        $data = [];

        if (method_exists(DynamicController::class, $method = 'post_' . strtolower(trim($name)))) {
            $data['content'] = DynamicController::$method($request, $gw);
        }

        $this->init_data($request, $data);
        return view('', $data);
    }

}
