<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
      return view('about');
  });
  
  Route::get('/foto/{id}', function (string $id) {
      $number = (int) $id;

      abort_if($number < 1 || $number > 56, 404);

      $extension = $number <= 49 ? 'jpeg' : 'webp';

      return view('foto', [
          'number' => $number,
          'image' => "images/foto{$number}.{$extension}",
          'title' => "Foto {$number}",
      ]);
  })->whereNumber('id');