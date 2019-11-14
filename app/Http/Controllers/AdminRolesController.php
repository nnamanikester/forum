<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class AdminRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $roles = Role::all();

        $sn = 1;

        return view('admin.roles.index', compact('roles', 'sn'));


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


        Role::create($request->all());

        return redirect()->back()->with('success', 'Role Created Successfully!');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $role = Role::findOrFail($id);


        return view('admin.roles.edit', compact('role'));



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


        Role::findOrFail($id)->update($request->all());

        return redirect()->route('roles.index')->with('success', 'Updated Successfully!');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        Role::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Deleted Successfully!');

    }


    public function users($id) {

        $role = Role::findOrFail($id);

        $users = $role->users->all();

        $sn = 1;

        foreach($users as $user) {

            $level = $user->level;

        }

        return view('admin.roles.users', compact('users', 'role', 'sn', 'level'));

    }

}