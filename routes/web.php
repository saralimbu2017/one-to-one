<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Address;
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
//route for home page
Route::get('/', function () {
    return view('welcome');
});

//Route for insert operation
Route::get('/insert',function(){
    $user = User::findOrFail(1);
    $address = new Address(['name'=>'123 New address']);
    $user->address()->save($address);
});

//Route for update operation
Route::get('/update',function(){
    $address = Address::whereUserId(1)->first();
    $address->name = 'Updated Mel';
    $address->save();
});

//Route for read operation
Route::get('/read',function(){
    $user = User::findOrFail(1);
    echo $user->address->name;
});

//Route for delete operation
Route::get('/delete',function(){
    $user = User::findOrFail(1);
    $user->address()->delete();
});