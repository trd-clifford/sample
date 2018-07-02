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


/*
 *
 * For Front
 *
 */
$namespacePrefix = '\\'.config('voyager.controllers.namespace').'\\';
Route::group(['middleware' => 'admin.user'], function () use ($namespacePrefix) {
	
	Route::get('/', 'RwsBaseController@index');
	
	
	// api test
	Route::get('/github_api', '\App\Http\Controllers\GithubApiController@getUserInfo');

	//github get data
	Route::get('/GithubData', '\App\Http\Controllers\GithubApiController@store_github_data');
	
});



/*
 *
 * For Voyager admin
 *
 */
Route::group(['prefix' => 'admin'], function () {
	Voyager::routes();

	//API debug Route
	Route::get('debug/api', function() {
		return view('debug.api');
	});

	//WarningStatus
	Route::get('/get_WarningStatus', function() {
		return view('debug.get_warning_status');
	});
	Route::get('/update_WarningStatus', function() {
		return view('debug.update_warning_status');
	});
	Route::get('/delete_WarningStatus', function() {
		return view('debug.delete_warning_status');
	});

	//RemindStatus
	Route::get('/get_RemindStatus', function() {
		return view('debug.get_remind_status');
	});
	Route::get('/update_RemindStatus', function() {
		return view('debug.update_remind_status');
	});
	Route::get('/delete_RemindStatus', function() {
		return view('debug.delete_remind_status');
	});

	//WarningManage
	Route::get('/get_WarningManage', function() {
		return view('debug.get_warning_manage');
	});
	Route::get('/update_WarningManage', function() {
		return view('debug.update_warning_manage');
	});
	Route::get('/delete_WarningManage', function() {
		return view('debug.delete_warning_manage');
	});

	//RemindManage
	Route::get('/get_RemindManage', function() {
		return view('debug.get_remind_manage');
	});
	Route::get('/update_RemindManage', function() {
		return view('debug.update_remind_manage');
	});
	Route::get('/delete_RemindManage', function() {
		return view('debug.delete_remind_manage');
	});

	//TeamManage
	Route::get('/get_TeamManage', function() {
		return view('debug.get_team_manage');
	});
	Route::get('/update_TeamManage', function() {
		return view('debug.update_team_manage');
	});
	Route::get('/delete_TeamManage', function() {
		return view('debug.delete_team_manage');
	});

	//Githublog
	Route::get('/get_GithubLog', function() {
		return view('debug.get_github_log');
	});
	Route::get('/update_GithubLog', function() {
		return view('debug.update_github_log');
	});
	Route::get('/delete_GithubLog', function() {
		return view('debug.delete_github_log');
	});

});



