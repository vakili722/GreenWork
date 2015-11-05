<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller {

    public function getIndex() {
        return view('home-system');
    }

    public function getPage($page) {
        return view('pages/' . $page);
    }

}
