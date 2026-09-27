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

      // Voorbeeldteksten: vervang deze door je eigen gegevens.
      $photos = [
          1 => [
              'title' => 'Avondlicht',
              'location' => 'Amsterdam',
              'description' => 'Het laatste zonlicht valt op het water.',
          ],
          2 => [
              'title' => 'Stilte',
              'location' => 'Zandvoort',
              'description' => 'Een rustig moment aan zee.',
          ],
          3 => [
              'title' => 'Onderweg',
              'location' => 'Rotterdam',
              'description' => 'Lijnen en schaduwen in de stad.',
          ],
      ];

      $photo = $photos[$number] ?? [
          'title' => "Foto {$number}",
          'location' => 'Nog invullen',
          'description' => 'Beschrijving volgt.',
      ];

      $extension = $number <= 49 ? 'jpg' : 'webp';

      return view('foto', [
          'number' => $number,
          'image' => "images/foto{$number}.{$extension}",
          'title' => $photo['title'],
          'location' => $photo['location'],
          'description' => $photo['description'],
      ]);
  })->whereNumber('id');