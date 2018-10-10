<?php


use App\Notifications\InvoicePaid;
use App\User;

Route::get('/', function () {
    $when = now()->addSeconds(10);
     // User::find(1)->notify((new InvoicePaid)->delay($when));

    // Facade
    //    $users = User::find(1);
    //    Notification::send($users, new InvoicePaid);


    $user = user::find(1);
    Notification::route('mail', 'taylor@example.com')
        ->route('nexmo', '5555555555')
        ->notify(new InvoicePaid($user));
    return view('welcome', compact('user'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
