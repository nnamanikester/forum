<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;

class AdminLevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $levels = Level::all();

        $sn = 1;

        return view('admin.levels.index', compact('levels', 'sn'));


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

        Level::create($request->all());

        return redirect()->back()->with('success', 'Level Created Successfully!');

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

        $level = Level::findOrFail($id);

        return view('admin.levels.edit', compact('level'));

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

        Level::findOrFail($id)->update($request->all());

        return redirect()->route('levels.index')->with('success', 'Level Updated Succesfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Level::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Level Deleted Successfully!');

    }


    public function users($id) {

        $level = Level::findOrFail($id);

        $users = $level->users;

        $sn = 1;

        return view('admin.levels.users', compact('users', 'sn', 'level'));

    }


}
