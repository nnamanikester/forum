<?php

namespace App\Http\Controllers;

use App\Level;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();

        $levels = Level::pluck('name', 'id')->all();

        $roles = Role::pluck('name', 'id')->all();

        foreach($users as $user) {

            $level = $user->level;

        }

        $sn = 1;

        return view('admin.users.index', compact('users', 'sn', 'level', 'levels', 'roles'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $users = User::all();

        foreach($users as $user) {

            if($user->username == $request->username) {

                return redirect()->back()->with('error', "Username Already Exist! Please Try Another");

            }

            if($user->email == $request->email) {

                return redirect()->back()->with('error', "Email Already Exist! Please Try Another");

            }

        }

        $data = $request->all();

        $data['password'] = bcrypt($request->password);

        if($path = $request->file('photo_id')) {

            $name = time() . Auth::user()->username . $path->getClientOriginalName();

            $path->move('images/users', $name);

            $photo = new Photo;

            $photo->create([

                'path'=>$name,
                'created_by'=>Auth::user()->id,
                'updated_by'=>Auth::user()->id

            ]);

            $data['photo_id'] = $photo->id;

        }

        User::create($data);

        return redirect()->back()->with('success', 'User Created Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::findOrFail($id);

        $roles = Role::pluck('name', 'id')->all();

        $levels = Level::pluck('name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles', 'levels'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);

        if(empty($request->password)) {

            $password = $user->password;

        } else {

            $password = bcrypt($request->password);

        }

        $data = $request->all();

        $data['password'] = $password;

        if($path = $request->file('photo_id')) {

            $name = time() . Auth::user()->username . $path->getClientOriginalName();

            $path->move('images/users', $name);

            if($user->photo) {

                if(file_exists(public_path() . $user->photo->path)) {

                    unlink(public_path() . $user->photo->path);

                    $user->photo->delete();

                }

            }

            $photo = Photo::create([

                'path'=>$name,
                'created_by'=>Auth::user()->id,
                'updated_by'=>Auth::user()->id

            ]);

            $data['photo_id'] = $photo->id;

        }


        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User Created Successfully!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);

        if($user->photo) {

            if(file_exists(public_path() . $user->photo->path)) {

                $user->photo->delete();

                unlink(public_path() . $user->photo->path);

            }

        }


        $user->delete();

        return redirect()->back()->with('success', 'User Deleted Successfully!');


    }


    public function status($id) {

        $user = User::findOrFail($id);

        if($user->status == 1) {

            $user->update(['status' => 2]);

        } else {

            $user->update(['status' => 1]);

        }

        return redirect()->back()->with('success', 'Status Updated Successfully!');

    }

    public function active() {

        $users = User::where('status', '1')->get();

        $sn = 1;

        return view('admin.users.active', compact('users', 'sn'));


    }

    public function pending() {

        $users = User::where('status', '0')->get();

        $sn = 1;

        return view('admin.users.pending', compact('users', 'sn'));


    }

    public function blocked() {

        $users = User::where('status', '2')->get();

        $sn = 1;

        return view('admin.users.blocked', compact('users', 'sn'));


    }



}
