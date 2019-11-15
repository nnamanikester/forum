<?php

namespace App\Http\Controllers;

use App\Category;
use App\Thread;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;

class AdminThreadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $threads = Thread::all();

        $sn = 1;

        $categories = Category::pluck('name', 'id')->all();

        return view('admin.threads.index', compact('threads', 'sn', 'categories'));


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

        $slug = str_replace(' ', '-', strtolower($request->topic));

        $thread = Thread::where('slug', $slug)->get();

        $add = 1;

        if(count($thread) > 0) {

            while (count($thread) > 0) {

                $slug = str_replace(' ', '-', strtolower($request->topic));

                $slug .= '-' . $add;

                $add++;

                $thread = Thread::where('slug', $slug)->get();

                if (count($thread) > 0) {

                    continue;

                } else {


                    $data = [

                        'topic' => $request->topic,
                        'description' => $request->description,
                        'category_id' => $request->category_id,
                        'user_id' => $request->user_id,
                        'status' => $request->status,
                        'created_by' => $request->created_by,
                        'updated_by' => $request->updated_by,
                        'slug' => $slug,

                    ];


                    Thread::create($data);


                    break;

                }

            }

        } else {


            $data = [

                'topic' => $request->topic,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'user_id' => $request->user_id,
                'status' => $request->status,
                'created_by' => $request->created_by,
                'updated_by' => $request->updated_by,
                'slug' => $slug,

            ];

            Thread::create($data);

        }

        return redirect()->back()->with('success', 'Thread Created Successfully!');



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

        $thread = Thread::findOrFail($id);

        $categories = Category::pluck('name', 'id')->all();

        return view('admin.threads.edit', compact('categories', 'thread'));

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

        Thread::findOrFail($id)->update($request->all());


        return redirect()->route('threads.index')->with('success', 'Thread Updated Successfully!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Thread::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Thread Deleted Successfully!');

    }


    public function status($slug) {

        $find = Thread::where('slug', $slug)->take(1)->get();

        $thread = Thread::findOrFail($find['0']['id']);

        if($thread->status == 1) {

            $thread->update([
                'status' => 0
            ]);

        } else {

            $thread->update([
                'status' => 1
            ]);

        }

        return redirect()->back()->with('success', 'Status Changed Successfully!');

    }

    public function approved() {

        $threads = Thread::where('status', '1')->get();

        $sn = 1;

        return view('admin.threads.approved', compact('threads', 'sn'));

    }

    public function pending() {

        $threads = Thread::where('status', '0')->get();

        $sn = 1;

        return view('admin.threads.pending', compact('threads', 'sn'));

    }


}
