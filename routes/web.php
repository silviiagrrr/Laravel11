<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['nama' => 'Silviagrrr', 'title' => 'About']);
});

Route::get('/posts', function () {
   $posts = Post::with(['author' , 'category'])->latest()->get();
    return view('posts', ['title' => 'Blog', 'posts' =>  $posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::get('/posts/{post:slug}', function (Post $post) {
  
    //    $post = Post::find($id); 
       
return view('post', ['title' => 'Single Post', 'post' => $post]);
        
});

Route::get('/authors/{user:username}', function (User $user) {     
return view('posts', ['title' => count($user->posts) . ' Articles by ' . $user->name, 'posts' => $user->posts]);
        
});

Route::get('/categories/{category:slug}', function (Category $category) {     
return view('posts', ['title' =>  ' Articles in : ' . $category->name, 'posts' =>
 $category->posts]);
        
});

  



