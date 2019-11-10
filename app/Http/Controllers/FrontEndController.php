<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{


    public function __construct()
    {

        $this->middleware('web');

    }


    public function home() {

        return view('front_end.index');

    }

    public function categories () {

        return view('front_end.categories');

    }

    public function login() {

        return view('auth.login');

    }

    public function register() {

        return view('auth.register');

    }

    public function pages($name) {

        if($name == 'about' || $name == 'guidelines' || $name == 'faq' || $name == 'terms' || $name == 'privacy') {

            return view('front_end.page_tabs', compact('name'));

        }

        return abort(404);

    }


    public function category() {

        return view('front_end.single_category');

    }

    public function topic() {

        return view('front_end.single_topic');

    }

    public function trending() {

        return view('front_end.trending');

    }


}
