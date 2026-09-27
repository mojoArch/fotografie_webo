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

      
      $photos = [
          1 => [
              'title' => 'Artist Presskit',
              'location' => 'Zaandam',
              'description' => 'Voor mijn projectweek fotografeerde ik Nazli. Tijdens de shoot heb ik haar in een hip hop sfeer vastgelegd.
               Hieronder vind je een selectie van mijn favoriete beelden.',
          ],
          2 => [
              'title' => 'Stilte',
              'location' => 'Zandvoort',
              'description' => 'Een rustig moment aan zee.',
          ],
          3 => [
             'title' => 'Straat-Portretten',
            'location' => 'Amsterdam',
            'description' => 'Dit foto is op meerdere exposities tentoongesteld. 
            Onder andere bij het Mediacollege Amsterdam, waar ik momenteel studeer, 
            in Theater De Krakeling en als hoogtepunt tijdens de Dutch Design Week 2026 in Eindhoven.
             Het hoogtepunt in mijn fotografiecarrière tot nu toe.',
          ],
          4 => [
            'title' => 'Straat-Portretten',
            'location' => 'Amsterdam',
            'description' => 'het verhaal van begin tot het heden.',
          ],
          5 => [
            'title' => 'Straat-Portretten',
            'location' => 'Amsterdam',
            'description' => 'het verhaal van begin tot het heden.',
          ],
            6 => [
            'title' => 'Straat-Portretten',
            'location' => 'Amsterdam',
            'description' => 'Het hoogtepunt daarvan is het portret van de man met de muts. 
            Door de mooie kleuren en zijn glimlach werd dit voor mij de eerste echte sterke straatportret.',
          ],
            7 => [
            'title' => 'Merel',
            'location' => 'Amsterdam',
            'description' => 'het verhaal van begin tot het heden.',
          ],
           8 => [
            'title' => 'Merel',
            'location' => 'Amsterdam',
            'description' => 'het verhaal van begin tot het heden.',
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