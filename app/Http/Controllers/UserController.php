<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Library\GW;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    private function load(Request $request, & $data, $params) {
        $data['user']['info'] = \App\User::paginate($params['pagination']);
        $data['user']['load'] = \App\Models\Group::all();
        $this->init_data($request, $data);
    }

    public function getIndex(Request $request, $filter = null) {
        $data = [];

//        echo '<div style="direction: ltr">';
//        \Symfony\Component\VarDumper\VarDumper::dump($data['user']['info']);
//        echo '</div>';

        $this->load($request, $data, ['pagination' => 5, 'filter' => $filter]);
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
        if ($request->input('action') == 'create') {
            $this->validate($request, [
                'name' => 'required',
                'group' => 'required|numeric',
                'email' => 'required|email',
                'password' => 'required|confirmed|min:6'
            ]);

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
            $result = \App\User::where('email', $request->email)
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
