<?php

namespace App\Http\Controllers;

use App\Level;
use App\Role;
use App\User;
use Illuminate\Http\Request;

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

        $data = [

            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'country' => $request->country,
            'website' => $request->website,
            'bio' => $request->bio,
            'status' => $request->status,
            'role_id' => $request->role_id,
            'level_id' => $request->level_id,

        ];

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

        $data = [

            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $password,
            'country' => $request->country,
            'website' => $request->website,
            'bio' => $request->bio,
            'status' => $request->status,
            'level_id' => $request->level_id,
            'role_id' => $request->role_id,

        ];

        $user->update($data);

        return redirect()->route('roles.users', $user->role->id)->with('success', 'User Updated Successfully!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        User::findOrFail($id)->delete();


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



}
