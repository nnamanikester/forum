<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//FRONT END WITHOUT LOGIN ROUTES STARTS
Route::get('/', 'FrontEndController@home')->name('fe.home');
Route::get('/categories', 'FrontEndController@categories')->name('fe.categories');
Route::get('/page/{name}', 'FrontEndController@pages')->name('fe.page');
Route::get('/category/{id}', 'FrontEndController@category')->name('fe.category');
Route::get('/topic/{slug}', 'FrontEndController@topic')->name('fe.topic');
Route::post('/topic/{slug}/reply', 'UserDashboardController@threadReply')->name('fe.topic_reply');
Route::get('/trending', 'FrontEndController@trending')->name('fe.trending');
Route::get('/login', 'FrontEndController@login')->name('fe.login');
Route::get('/register', 'FrontEndController@register')->name('fe.register');


//FRONT END WITHOUT LOGIN ROUTES ENDS


//ADMIN ROUTE STARTS

Route::group(['middleware'=> 'admin'], function() {


    Route::resource('/admin/categories', 'AdminCategoriesController');
    Route::resource('/admin/threads', 'AdminThreadsController');
    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/roles', 'AdminRolesController');
    Route::resource('/admin/levels', 'AdminLevelsController');


    Route::get('/admin', 'AdminDashboardController@index')->name('admin.index');
    Route::get('/admin/roles/{id}/users', 'AdminRolesController@users')->name('roles.users');
    Route::get('/admin/levels/{id}/users', 'AdminLevelsController@users')->name('levels.users');
    Route::get('/admin/users/{id}/status', 'AdminUsersController@status')->name('users.status');
    Route::get('/admin/active-users', 'AdminUsersController@active')->name('users.active');
    Route::get('/admin/pending-users', 'AdminUsersController@pending')->name('users.pending');
    Route::get('/admin/blocked-users', 'AdminUsersController@blocked')->name('users.blocked');
    Route::get('/admin/threads/{slug}/status', 'AdminThreadsController@status')->name('threads.status');
    Route::get('/admin/approved-threads', 'AdminThreadsController@approved')->name('threads.approved');
    Route::get('/admin/pending-threads', 'AdminThreadsController@pending')->name('threads.pending');
    Route::get('/admin/categories/{id}/threads', 'AdminCategoriesController@threads')->name('categories.threads');
    Route::get('/admin/media', 'AdminMediaController@index')->name('admin.media');


});

//ADMIN ROUTE ENDS


//USER DASHBOARD ROUTES STARTS

Route::get('/dashboard', 'UserDashboardController@dashboard')->name('user.dashboard');
Route::get('/{username}/profile', 'UserDashboardController@userProfile')->name('user.profile');
Route::get('/users', 'UserDashboardController@userLists')->name('user.lists');
Route::get('/dashboard/messages', 'UserDashboardController@messages')->name('user.messages');
Route::get('/dashboard/compose', 'UserDashboardController@compose')->name('user.compose');
Route::get('/dashboard/create-topic', 'UserDashboardController@create_topic')->name('user.create_topic');


Route::post('dashboard/create-topic/store', 'UserDashboardController@topicstore');
Route::patch('dashboard/profile/{id}/update', 'UserDashboardController@profileUpdate');
Route::delete('dashboard/{id}/unfollow', 'UserDashboardController@unfollow');
Route::post('dashboard/{id}/follow', 'UserDashboardController@follow');

//USER DASHBOARD ROUTES ENDS


/*
 * THE LARAVEL FILEMANAGER BEGINGS HERE
 */

Route::group(['prefix' => 'admin/media', 'middleware' => ['web', 'auth', 'admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


// LARAVEL FILE MANAGER ENDS HERE


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');