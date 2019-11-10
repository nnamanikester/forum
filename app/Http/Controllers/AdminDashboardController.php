<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{

    public function __construct()
    {

        //$this->middleware('Admin');

    }

    public function dashboard() {

        return view('admin.index');

    }

    public function threads() {

        return view('admin.threads.index');

    }

    public function categories() {

        return view('admin.categories.index');

    }


}
