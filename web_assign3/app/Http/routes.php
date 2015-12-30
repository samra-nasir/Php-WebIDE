<?php
use Illuminate\Http\Request;
use App\Phpcode;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
	if(isset($_COOKIE['laravel_session'])){
		setcookie("laravel_session", "", time() - 3600);
	}
    Route::auth();
    Route::get('/login', function(){
		Auth::logout();
    	return view('auth/login');

    });

	Route::post('/home', function (Request $request) {
		    $validator = Validator::make($request->all(), [
		        'code' => 'required',
		    ]);

		    if ($validator->fails()) {
		        return redirect('/home')
		            ->withInput()
		            ->withErrors($validator);
		    }

		    $code = new Phpcode;
		    $code->code = $request->code;
		    $code->email = Auth::user()->email;
		    $code->save();

		    return view('home',['test'=> $request->code]);
	});
	Route::get('/home', 'HomeController@index');

   
    Route::get('/admin', function(){
    	$codes = Phpcode::orderBy('created_at', 'desc')->get();
        return view('codes',['codes' => $codes]);
    });

    
});
