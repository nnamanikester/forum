<?php

namespace App\Http\Controllers;

use App\Category;
use App\Thread;
use App\ThreadDislike;
use App\ThreadFavourite;
use App\ThreadFlag;
use App\ThreadLike;
use App\ThreadReply;
use App\ThreadReplyDislike;
use App\ThreadReplyFavourite;
use App\ThreadReplyLike;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{


    public function __construct()
    {

        $this->middleware('web');

    }


    public function home() {

        $count = 1;

        $threads = Thread::orderBy('id', 'desc')->paginate(15);

        $featured_threads = Thread::where('featured', 1)->take(3)->get();


        return view('front_end.index', compact('count', 'threads', 'featured_threads'));

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


    public function category($id) {

        $category = Category::findOrFail($id);

        $categories = Category::all();

        $threads = Thread::where('category_id', $category->id)->orderBy('id', 'desc')->paginate(15);

        return view('front_end.single_category', compact('category', 'threads', 'categories'));

    }

    public function topic($slug) {

        $thread = Thread::where('slug', $slug)->first();

        $replies = $thread->replies;

        $liked = ThreadLike::where('thread_id', $thread->id)->first();

        $disliked = ThreadDislike::where('thread_id', $thread->id)->first();

        $favourited = ThreadFavourite::where('thread_id', $thread->id)->first();

        $flag = ThreadFlag::where('thread_id', $thread->id)->first();

        $relateds = Thread::where('category_id', $thread->category_id)->orderBy('id', 'desc')->paginate(5);

        return view('front_end.single_topic', compact('thread', 'replies', 'relateds', 'liked', 'disliked', 'favourited', 'flag'));

    }

    public function trending() {

        $threads = Thread::all();

        return view('front_end.trending', compact('threads'));

    }


}
