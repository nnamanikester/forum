<?php

namespace App\Http\Controllers;

use App\Category;
use App\Follower;
use App\Following;
use App\Tag;
use App\Thread;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserDashboardController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }


    public function dashboard() {

        $user = User::findOrFail(Auth::user()->id);

        $threads = Thread::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);

        $categories = Category::orderBy('id', 'desc')->paginate(10);

        $followers = Follower::where('follower_id', Auth::user()->id)->paginate(15);

        $followings = Following::where('following_id', Auth::user()->id)->paginate(15);

        return view('user_dashboard.dashboard', compact('user', 'threads', 'categories', 'followers', 'followings'));

    }

    public function messages() {

        return view('user_dashboard.messages');

    }

    public function compose() {

        return view('user_dashboard.compose_message');

    }

    public function create_topic() {

        $categories = Category::pluck('name', 'id')->all();

        return view('user_dashboard.create_topic', compact('categories'));

    }


    public function topicstore(Request $request) {

        $slug = Str::slug($request->topic);

        $data = [
            'topic'=>$request->topic,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'slug'=>$slug,
            'user_id'=>$request->user_id,
            'created_by'=>$request->user_id,
            'updated_by'=>$request->user_id,
            'status'=>$request->status,
            'featured'=>$request->featured,
        ];

        $thread = Thread::create($data);

        $tags = preg_split('/,/', $request->tags);

        foreach ($tags as $tag) {

            $check = Tag::where('name', $tag)->first();

            if(empty($check)) {

                $taggable = Tag::create([
                    'name'=>$tag,
                    'created_by'=>$request->user_id,
                    'updated_by'=>$request->user_id,
                ]);

                $thread->tags()->attach($taggable);

            } else {

                $check->update([
                    'updated_by'=>$request->user_id,
                ]);

            }



        }

        return redirect('/')->with('success', 'Topic Created Successfully!');

    }


}
