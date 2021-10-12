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

Route::get('/', function () {

   return view('welcome');
});

Route::get('/test1', function () {    // كدا لو كتبت فالمتصفح localhot:8000/test1 
    return'welcome';        // هيعرضلي welcome
});

// Route Parameter

Route::get('/show-number/{id}', function ($id) {    // اكتب فالمتصفح http://localhost:8000/test2/100 
    return $id;     // هيرجعلك رقم ال id اللي هو 100
})-> name('a') ;


Route::get('/show-string/{id?}', function () {    // كدا هو عامل ال id دا optional اختياري 
    return'welcome';        // هيعرضلي welcome
})-> name('b') ;  


// ============================== Route name =============================== (namespace)  فكرته اني اعدش اكتب المسار كامل كل مره


    // Route::get('users','Front\UserController@showUserName');         هنا كدا بكتب المسار كامل كل مره لو عندي كتير بقا هاعد اكتبه كامل كدا برضو
    // ===== تساوو بعض

    // ال default namespace هو ال controller

//     Route::namespace('Front')->group(function () {
//     // all route only access controller or methods in folder name Front
//     Route::get('users','UserController@showUserName');        // هنا بقا مبكتبش المسار كامل لاني محددله فوق فال namespace اني فال Front

// });

// ===

Route::group(['namespace'=>'Front'],function () {
    // all route only access controller or methods in folder name Front
    Route::get('users','UserController@showUserName');        // هنا بقا مبكتبش المسار كامل لاني محددله فوق فال namespace اني فال Front

});

// ========================== Route prefix ==================================

// Route::get('users/show','UserController@showUserName');     // بدل م اعمل كدا بستخدم ال prefix

// Route::prefix('users')->group(function () {
//     Route::get('show','UserController@showUserName');        
//     Route::delete('delete','UserController@showUserName');
//     Route::get('edit','UserController@showUserName');
//     Route::put('update','UserController@showUserName');
// });

Route::group([ 'namespace'=>'Front' , 'prefix' => 'client' , 'middleware' => 'auth' ] , function () {

    Route::get('/',function(){
        return 'work';
    });
    Route::get('show','UserController@showUserName');        
    Route::delete('delete','UserController@showUserName');
    Route::get('edit','UserController@showUserName');
    Route::put('update','UserController@showUserName');
});

Route::get('login',function(){
    return 'you must login first';  // بدل م يعرضلي Rout[login] لا هيعرضلي الجمله دي
})-> name('login');   // دا ال Route اللي هروحله اسمه login

// ========================== middleware ==================================

// Route::get('check',function(){
//     return 'middleware';

// })->middlware('auth');

// Route::get('second', 'Admin\SecondController@showString0'); 
// ===
Route::group(['namespace'=>'Admin', 'prefix'=>'number'],function(){
    Route::get('zero', 'SecondController@showString0')->middleware('auth');
    Route::get('one', 'SecondController@showString1');
    Route::get('two', 'SecondController@showString2');
    Route::get('three', 'SecondController@showString3');
});

// =============================== Controller Resource ====================
 Route::resource('news','NewsController');


 Route::group(['namespace'=>'Front' , 'prefix' => 'index'],function(){
     Route::get('/','UserController@getindex');
 });
// Route::get('index','Front\UserController@getindex');

// ================ Landing Page ===================

Route:: get('landing', function(){
    return view('landing');
});

Route::get('about',function(){
    return view('about');
});
Route::get('example',function(){
    return view('example');
});
Auth::routes(['verify' => true]);    // to verify register with email

Route::get('/home', 'HomeController@index')->name('home');    // to verify register with email

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
