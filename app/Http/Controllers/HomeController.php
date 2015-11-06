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

    private function get_client(Request $requset, GW $gw) {
        
    }

    private function get_jobholder(Request $requset, GW $gw) {
        
    }

    private function get_manager(Request $requset, GW $gw) {
        
    }

    private function get_system(Request $requset, GW $gw) {
        
    }

    public function postIndex(Request $request) {
        $gw = new GW($request);
        $data = [];

        $home = $gw->home_name;
        if (method_exists($this, $method = 'post_' . strtolower(trim($home)))) {
            $data['content'] = $this->$method($request, $gw);
        }

        $this->init_data($request, $data);
        return view('home.' . $home, $data);
    }

    private function post_client(Request $requset, GW $gw) {
        
    }

    private function post_jobholder(Request $requset, GW $gw) {
        
    }

    private function post_manager(Request $requset, GW $gw) {
        
    }

    private function post_system(Request $requset, GW $gw) {
        
    }

}
