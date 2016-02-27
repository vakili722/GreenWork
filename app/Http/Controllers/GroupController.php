<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Library\GW;
use App\Http\Requests;
use App\Http\Library\Filter;
use App\Http\Controllers\Controller;

class GroupController extends Controller {

    private function load(Request $request, & $data, $params) {
        $columnsInfo = [
            'name' => [
                'alias' => 'نام',
                'class' => \App\User::class
            ],
            'email' => [
                'alias' => 'ایمیل',
                'class' => \App\User::class
            ],
            'group_id' => [
                'alias' => 'گروه کاربری',
                'class' => \App\Models\Group::class,
                'wherethrough' => [
                    'key' => 'alias',
                    'value' => 'id'
                ]
            ]
        ];

        $data['group']['info'] = Filter::Rendering(\App\Models\Group::class, $columnsInfo, $params['search'], $params['perPage']);
//        \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);
        $data['group']['load']['home'] = \App\Models\Home::all();
        $data['params'] = $params;
        $this->init_data($request, $data);
    }

    public function getIndex(Request $request) {
        $data = [];

//        echo '<div style="direction: ltr">';
//        \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);
//        echo '</div>';

        $this->load($request, $data, ['perPage' => 5, 'search' => $request->search]);
        return view('pages.group', $data);
    }

    public function postIndex() {
        //
    }

}
