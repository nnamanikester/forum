<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{

    public function __construct()
    {

        //$this->middleware('auth');

    }


    public function dashboard() {

        return view('user_dashboard.dashboard');

    }

    public function messages() {

        return view('user_dashboard.messages');

    }

    public function compose() {

        return view('user_dashboard.compose_message');

    }

    public function create_topic() {

        return view('user_dashboard.create_topic');

    }


}
