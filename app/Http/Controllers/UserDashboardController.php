<?php

namespace App\Http\Controllers;

use App\Category;
use App\Follower;
use App\Following;
use App\Tag;
use App\Thread;
use App\ThreadReply;
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

        $replies = ThreadReply::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);

        $followers = Follower::where('follower_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);

        $followings = Following::where('following_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(15);


        return view('user_dashboard.dashboard', compact('user', 'threads', 'categories', 'followers', 'followings', 'replies'));

    }

    public function userProfile($username) {

        if($username === Auth::user()->username) {

            return redirect()->back();

        }

        $user = User::where('username', $username)->first();

        $threads = Thread::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(15);

        $replies = ThreadReply::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(15);

        $followers = Follower::where('follower_id', $user->id)->paginate(15);

        $followings = Following::where('following_id', $user->id)->orderBy('id', 'desc')->paginate(15);

        $followed = Following::where('following_id', Auth::user()->id)->first();

        return view('user_dashboard.user_profile', compact('user', 'threads', 'followers', 'followings', 'replies', 'followed'));

    }

    public function userLists() {

        $admins = User::where('role_id', 1)->orderBy('level_id', 'desc')->get();

        $moderators = User::where('role_id', 2)->orderBy('level_id', 'desc')->get();

        $subscribers = User::where('role_id', 3)->orderBy('level_id', 'desc')->paginate(50);

        return view('user_dashboard.all_users', compact('admins', 'moderators', 'subscribers'));

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


    public function profileUpdate(Request $request, $id) {

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


        return redirect()->back()->with('success', 'Profile Updated Successfully!');

    }

    public function unfollow($id) {

        $following = Following::findOrFail($id);

        $following->follower->delete();

        $following->delete();

        return redirect()->back();

    }


    public function follow($id) {

        Follower::create([
            'follower_id'=>$id,
            'user_id'=>Auth::user()->id
        ]);

        Following::create([
           'following_id'=>Auth::user()->id,
           'user_id'=>$id
        ]);

        return redirect()->back();

    }

    public function threadReply(Request $request) {

        $data = [

            'created_by'=>$request->user_id,
            'updated_by'=>$request->user_id,
            'user_id'=>$request->user_id,
            'body'=>$request->body,
            'thread_id'=>$request->thread_id

        ];

        ThreadReply::create($data);

        return redirect()->back()->with('success', 'Reply Posted Successfully!');

    }


}
