<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMediaController extends Controller
{

    public function index() {

        return view('admin.media.index');

    }


}
