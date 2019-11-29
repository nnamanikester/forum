<?php

namespace App\Http\Controllers;

use App\Category;
use App\Follower;
use App\Following;
use App\Tag;
use App\Thread;
use App\ThreadDislike;
use App\ThreadFavourite;
use App\ThreadFlag;
use App\ThreadLike;
use App\ThreadReply;
use App\ThreadReplyDislike;
use App\ThreadReplyFavourite;
use App\ThreadReplyFlag;
use App\ThreadReplyLike;
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

        
        if((count($user->threads) >= 15) && (count($user->replies) >= 25)) {

            if($user->level_id !== 3) {
                $user->update(['level_id'=>3]);
                session('success', 'Congratulations! \<br\> You have been promoted to Master level');
            }

        } elseif((count($user->threads) >= 5) && (count($user->replies) >= 10)) {

            if($user->level_id !== 2) {
                $user->update(['level_id'=>2]);
                session('success', 'Congratulations! \<br\> You have been promoted to Regular level');
            }

        } else {

            if($user->level_id !== 1) {
                $user->update(['level_id'=>1]);
            }

        }
        
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


        if((count($user->threads) >= 15) && (count($user->replies) >= 25)) {

            if($user->level_id !== 3) {
                $user->update(['level_id'=>3]);
            }

        } elseif((count($user->threads) >= 5) && (count($user->replies) >= 15)) {

            if($user->level_id !== 2) {
                $user->update(['level_id'=>2]);
            }

        } else {

            if($user->level_id !== 1) {
                $user->update(['level_id'=>1]);
            }

        }


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

    public function threadLikeUnlike(Request $request, $id) {

        $threadLikes = ThreadLike::where('thread_id', $id)->get();

        if(count($threadLikes) > 0) {

            foreach($threadLikes as $threadLike) {

                if($threadLike->user_id == $request->user_id) {

                    $threadLike->delete();

                } else {

                    ThreadLike::create(['thread_id'=>$id, 'user_id'=>$request->user_id]);

                }

            }

        } else {

            ThreadLike::create(['thread_id'=>$id, 'user_id'=>$request->user_id]);

        }

        return redirect()->back();

    }


    public function threadDislikeUndislike(Request $request, $id) {


        $threadDislikes = ThreadDislike::where('thread_id', $id)->get();

        if(count($threadDislikes) > 0) {

            foreach($threadDislikes as $threadDislike) {

                if($threadDislike->user_id == $request->user_id) {

                    $threadDislike->delete();

                } else {

                    ThreadDislike::create(['thread_id'=>$id, 'user_id'=>$request->user_id]);

                }

            }

        } else {

            ThreadDislike::create(['thread_id'=>$id, 'user_id'=>$request->user_id]);

        }

        return redirect()->back();

    }

    public function threadFavouriteUnfavourite(Request $request, $id) {

        $favourites = ThreadFavourite::where('thread_id', $id)->get();

        if(count($favourites) > 0) {

            foreach($favourites as $favourite) {

                if($favourite->user_id == $request->user_id) {

                    $favourite->delete();

                } else {

                    ThreadFavourite::create(['thread_id'=>$id, 'user_id'=>$request->user_id]);

                }

            }

        } else {

            ThreadFavourite::create(['thread_id'=>$id, 'user_id'=>$request->user_id]);

        }

        return redirect()->back();

    }

    public function threadReplyFavouriteUnfavourite(Request $request, $id) {

        $refavourites = ThreadReplyFavourite::where('thread_reply_id', $id)->get();

        if(count($refavourites) > 0) {

            foreach($refavourites as $refavourite) {

                if($refavourite->user_id == $request->user_id) {

                    $refavourite->delete();

                } else {

                    ThreadReplyFavourite::create(['thread_reply_id'=>$id, 'user_id'=>$request->user_id]);

                }

            }

        } else {

            ThreadReplyFavourite::create(['thread_reply_id'=>$id, 'user_id'=>$request->user_id]);

        }

        return redirect()->back();

    }

    public function threadReplyDislikeUndislike(Request $request, $id) {

        $redislikes = ThreadReplyDislike::where('thread_reply_id', $id)->get();

        if(count($redislikes) > 0) {

            foreach($redislikes as $redislike) {

                if($redislike->user_id == $request->user_id) {

                    $redislike->delete();

                } else {

                    ThreadReplyDislike::create(['thread_reply_id'=>$id, 'user_id'=>$request->user_id]);

                }

            }

        } else {

            ThreadReplyDislike::create(['thread_reply_id'=>$id, 'user_id'=>$request->user_id]);

        }

        return redirect()->back();

    }

    public function threadReplyLikeUnlike(Request $request, $id) {

        $relikes = ThreadReplyLike::where('thread_reply_id', $id)->get();

        if(count($relikes) > 0) {

            foreach($relikes as $relike) {

                if($relike->user_id == $request->user_id) {

                    $relike->delete();

                } else {

                    ThreadReplyLike::create(['thread_reply_id'=>$id, 'user_id'=>$request->user_id]);

                }

            }

        } else {

            ThreadReplyLike::create(['thread_reply_id'=>$id, 'user_id'=>$request->user_id]);

        }

        return redirect()->back();

    }

    public function threadFlag(Request $request, $id) {

        $flags = ThreadFlag::where('thread_id', $id)->get();

        if(count($flags) > 0) {

            foreach($flags as $flag) {

                if($flag->user_id == $request->user_id) {

                    $flag->delete();

                } else {

                    ThreadFlag::create(['thread_id'=>$id, 'user_id'=>$request->user_id]);

                }

            }

        } else {

            ThreadFlag::create(['thread_id'=>$id, 'user_id'=>$request->user_id]);

        }

        return redirect()->back();

    }

    public function threadReplyFlag(Request $request, $id) {

        $reflags = ThreadReplyFlag::where('thread_reply_id', $id)->get();

        if(count($reflags) > 0) {

            foreach($reflags as $reflag) {

                if($reflag->user_id == $request->user_id) {

                    $reflag->delete();

                } else {

                    ThreadReplyFlag::create(['thread_reply_id'=>$id, 'user_id'=>$request->user_id]);

                }

            }

        } else {

            ThreadReplyFlag::create(['thread_reply_id'=>$id, 'user_id'=>$request->user_id]);

        }

        return redirect()->back();

    }


}
