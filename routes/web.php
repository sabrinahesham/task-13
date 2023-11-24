<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
}); 

Route::get('/home', function () {
    return view('pages.home');
}); 


Route::get('contact', function(){
    return 'contact page';
})->name('home.contact');

 //Route::get('/products/{$id?}' ,function ($id =null){
   // return "this is $id ";
//});

Route::get('/products/{$id}' ,function ($id){
    $products=[
        1 =>['title' => 'product number 1' ,
        'description' => 'product number 1 desc',
          'is_new ' => true ,
          'has_reviews '=>'review1'],

        2 =>['title' => 'product number 2' ,
        'description' => 'product number 2 desc' ,
        'is_new ' => false ],

        3 =>['title' => 'product number 3' ,
        'description' => 'product number 3 desc',
        'is_new ' => true ]
    ];

    abort_if(!isset(products[$id]),404);
    $product = $products[$id];
    return view('products.show',compact('product'));
});
