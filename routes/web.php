<?php


use App\Notifications\InvoicePaid;
use App\User;

// If you run index.php it generates a notification
Route::get('/', function () {
    $when = now()->addSeconds(10);
    // use this when you need QUEUE + EMAIL + DATABASE notification
    // User::find(1)->notify((new InvoicePaid)->delay($when));

    User::find(2)->notify(new InvoicePaid); // this thing decides who creates the notification as user with respect to ID

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

// Running home will give you read & unread notification
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/markasread', function (){
    auth()->user()->unreadNotifications->markAsRead(); // check documentation database notification : puts data @ read_at on NOTIFICATION table on DB
    return redirect()->back();
});