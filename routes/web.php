<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
//    return view('home', ['name' => 'home']);
    
    /**/
    $strToken = "";
    $strToken = uniqid(mt_rand(), TRUE);
    
    $strNaam = ! empty( session('sesName') )? session('sesName') : "";
    $strEmail = ! empty( session('sesEmail') )? session('sesEmail') : "";
    $strSubject = ! empty( session('sesSubject') )? session('sesSubject') : "";
    $strMessage = ! empty( session('sesMessage') )? session('sesMessage') : "";
    /**/
    
    
//    return view('home2', ['name' => 'home', 'token' => $strToken]);
    return view('home2', ['name' => 'home', 'sesName' => $strNaam, 'sesEmail' => $strEmail, 'sesSubject' => $strSubject
            , 'sesMessage' => $strMessage, 'token' => $strToken]);
})->name('homepage');

Route::get('/biografie', function () {
    return view('biografie', ['name' => 'biografie']);
});

Route::get('/galerij', function () {
    return view('galerij', ['name' => 'galerij']);
});

Route::get('/contact', function () {
    
    $strToken = "";
    $strToken = uniqid(mt_rand(), TRUE);
    
    $strNaam = ! empty( session('sesName') )? session('sesName') : "";
    $strEmail = ! empty( session('sesEmail') )? session('sesEmail') : "";
    $strSubject = ! empty( session('sesSubject') )? session('sesSubject') : "";
    $strMessage = ! empty( session('sesMessage') )? session('sesMessage') : "";
//var_dump( session('sesName') );
//die();
    return view('contact', ['name' => 'contact', 'sesName' => $strNaam, 'sesEmail' => $strEmail, 'sesSubject' => $strSubject
            , 'sesMessage' => $strMessage, 'token' => $strToken]);
})->name('contact');

//Route::post('mailme/{token}', function ($token) {
//    // Retrieve a piece of data from the session...
////    var_dump( $token );
////    die("mailuh!");
//    return "Token: ". $token;
////    return view('contact', ['name' => 'contact']);
//});

Route::post( 'mailme/{token}', 'MailController@sendEmailContact' );