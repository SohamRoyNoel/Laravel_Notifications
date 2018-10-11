<?php


use App\Notifications\InvoicePaid;
use App\User;

Route::get('/', function () {
    $when = now()->addSeconds(10);
    // use this when you need QUEUE + EMAIL + DATABASE notification
    // User::find(1)->notify((new InvoicePaid)->delay($when));

    User::find(1)->notify(new InvoicePaid);

    // Facade for QUEUE + MAIL
    //    $users = User::find(1);
    //    Notification::send($users, new InvoicePaid);

    // ON-DEMAND
    /*
     * $user = user::find(1);
    Notification::route('mail', 'taylor@example.com')
        ->route('nexmo', '5555555555')
        ->notify(new InvoicePaid($user));
    return view('welcome', compact('user'));
    */

    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
