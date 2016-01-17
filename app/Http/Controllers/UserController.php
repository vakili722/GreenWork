<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Library\GW;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use App\Http\Library\Filter;

class UserController extends Controller {

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

        $data['user']['info'] = Filter::Rendering(\App\User::class, $columnsInfo, $params['search'], $params['perPage']);
//        \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);
        $data['user']['load'] = \App\Models\Group::all();
        $data['params'] = $params;
        $this->init_data($request, $data);
    }

    public function getIndex(Request $request) {
        $data = [];

//        echo '<div style="direction: ltr">';
//        \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);
//        echo '</div>';

        $this->load($request, $data, ['perPage' => 5, 'search' => $request->search]);
        return view('pages.user', $data);
    }

    public function postIndex(Request $request) {
        if ($request->ajax()) {
            $this->ajaxHandler($request);
        } else {
            $this->formHandler($request);
        }
    }

    private function ajaxHandler(Request $request) {
        if ($request->input('action') == 'delete') {
            // return result of action delete to client...
            echo \App\User::where('email', $request->email)->delete();
        }
    }

    private function formHandler(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'group' => 'required|numeric',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'
        ]);

        if ($request->input('action') == 'create') {
            $user = new \App\User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->group_id = $request->group;
            $user->password = bcrypt($request->password);
            $result = $user->save();

            if ($result == 1) {
                $request->session()->flash('success', ["کاربر $user->name با موفقیت به جمع کاربران پیوست."]);
            } else {
                $request->session()->flash('warning', ["افزودن کاربر $user->name با مشکل مواجه شد، لطفا با پشتیبانی تماس بگیرید."]);
            }

            echo $this->getIndex($request);
        } elseif ($request->input('action') == 'update') {
            $result = \App\User::where('email', $request->old_email)
                    ->update([
                'name' => $request->name,
                'email' => $request->email,
                'group_id' => $request->group,
                'password' => bcrypt($request->password)
            ]);

            if ($result == 1) {
                $request->session()->flash('information', ["بروز رسانی با موفقیت انجام شد."]);
            } else {
                $request->session()->flash('warning', ["بروز رسانی با شکست رو به رو شد."]);
            }

            echo $this->getIndex($request);
        }
    }

}
