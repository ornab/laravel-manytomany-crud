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

use App\User;
use App\Role;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', function(){
    
    $user = User::findOrFail(1);
    
    
    $role = new Role(['name' => 'Subscriber' ]);
    
    $user->roles()->save($role);
    
    
});


Route::get('/read', function(){
    
    $user = User::findOrFail(1);
    
    foreach($user->roles as $role){
        
       echo $role->name . '<br>';
        
    }
    
    
});

Route::get('/update', function(){
    
    
    $user = User::findOrFail(1);
    
    if($user->has('roles')){
        
        foreach($user->roles as $role){
            
            if($role->name == 'Subscriber'){
                
                $role->name = 'subscriber';
                
                $role->save();
            }
            
        }
        
    }
    
    
});


Route::get('/delete', function(){
    
    $user = User::findOrFail(1);
    
    foreach($user->roles as $role){
        
        
       $role->whereId(2)->delete(); 
   
    }
    
    
    
});









